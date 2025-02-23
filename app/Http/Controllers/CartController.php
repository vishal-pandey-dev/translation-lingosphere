<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Color;
use App\Models\Category;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('frontend.view_cart', compact('categories'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $data = [
            'id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $this->calculatePrice($product),
            'tax' => $this->calculateTax($product),
            'shipping' => $product->shipping_cost
        ];

        $cart = $request->session()->get('cart', collect([]));
        
        $existingItem = $cart->where('id', $request->id)->first();
        if ($existingItem) {
            $cart = $cart->map(function($item) use ($request, $data) {
                if ($item['id'] == $request->id) {
                    $item['quantity'] += $request->quantity;
                }
                return $item;
            });
        } else {
            $cart->push($data);
        }

        $request->session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'product' => $product,
            'cart_count' => $cart->count()
        ]);
    }

    public function removeFromCart(Request $request)
    {
        if ($request->session()->has('cart')) {
            $cart = collect($request->session()->get('cart'));
            $cart = $cart->except([$request->key]);
            $request->session()->put('cart', $cart->all());

            return response()->json([
                'success' => true,
                'cart_count' => $cart->count()
            ]);
        }
        return response()->json(['success' => false]);
    }

    public function updateQuantity(Request $request)
    {
        $cart = $request->session()->get('cart', collect([]));
        $cart = $cart->map(function ($item, $key) use ($request) {
            if ($key == $request->key) {
                $item['quantity'] = $request->quantity;
            }
            return $item;
        });
        
        $request->session()->put('cart', $cart);
        return response()->json([
            'success' => true,
            'cart_count' => $cart->count()
        ]);
    }

    private function calculatePrice($product)
    {
        $price = $product->unit_price;
        if ($product->discount_type == 'percent') {
            $price -= ($price * $product->discount) / 100;
        } elseif ($product->discount_type == 'amount') {
            $price -= $product->discount;
        }
        return $price;
    }

    private function calculateTax($product)
    {
        $price = $this->calculatePrice($product);
        if ($product->tax_type == 'percent') {
            return ($price * $product->tax) / 100;
        }
        return $product->tax;
    }
}
