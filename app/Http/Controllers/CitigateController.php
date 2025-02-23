<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Session, Auth, Log};
use App\Models\{Order, BusinessSetting, Currency, GatewayHistory, Payment, PaymentSession, Seller};
use App\Http\Controllers\Citigate;
use Exception;
use Laracasts\Flash\Flash;

class CitigateController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (!Session::has('payment_type') || Session::get('payment_type') != 'cart_payment') {
                return redirect()->route('home');
            }

            $order = Order::findOrFail($request->session()->get('order_id'));
            $postData = $this->preparePaymentData($order, $request);
            $this->storeBillingAddress($request);

            // Store session data
            $paymentSession = PaymentSession::create([
                'token' => $postData['MerchantRef'],
                'session_data' => Session::all(),
                'order_id' => $order->id
            ]);

            $citigate = new Citigate();
            return $citigate->initiate($postData, false);
        } catch (Exception $e) {
            Log::error('Citigate payment initiation error', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString(),
                'order_id' => $request->session()->get('order_id'),
                'payment_type' => Session::get('payment_type'),
                'post_data' => $postData ?? null,
                'session_data' => $request->session()->all()
            ]);
            throw $e;
        }
    }



    private function preparePaymentData($order, $request)
    {
        try {
            $total = $this->calculateOrderTotal($order);
            $transactionId = substr(md5($request->session()->get('order_id')), 0, 10);
            $signature = $this->generateSignature($transactionId, $total);
            $shippingInfo = $request->session()->get('shipping_info');

            $paymentData = [
                'total_amount' => $total,
                'tran_id' => $transactionId,
                'MerchantName' => env('CITIGATE_MerchantName'),
                'MerchantPassword' => env('CITIGATE_MerchantPassword'),
                'MerchantRef' => $transactionId,
                'Firstname' => $shippingInfo['name'],
                'Surname' => $shippingInfo['lname'],
                'StreetLine1' => $shippingInfo['address'],
                'StreetLine2' => $shippingInfo['addressL2'] ?? '',
                'Currency' => $this->getCurrencyCode(),
                'Amount' => $total * 100,
                'City' => $shippingInfo['city'],
                'Email' => $shippingInfo['email'],
                'PostalCode' => $shippingInfo['postal_code'],
                'Telephone' => $shippingInfo['phone'],
                'Country' => $shippingInfo['country'],
                'StateProvince' => "",
                'DateOfBirth' => $shippingInfo['dob'],
                'SuccessURL' => $request->root() . "/citigate/success",
                'FailURL' => $request->root() . "/citigate/fail",
                'CallbackURL' => env('CITIGATE_URL'),
                'Signature' => $signature
            ];

            return $paymentData;
        } catch (Exception $e) {
            Log::error('Payment data preparation error', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'order_id' => $order->id,
                'shipping_info' => $request->session()->get('shipping_info'),
                'env_vars' => [
                    'merchant_name' => env('CITIGATE_MerchantName') ? 'exists' : 'missing',
                    'merchant_password' => env('CITIGATE_MerchantPassword') ? 'exists' : 'missing',
                    'citigate_url' => env('CITIGATE_URL') ? 'exists' : 'missing'
                ]
            ]);
            throw $e;
        }
    }


    private function calculateOrderTotal($order)
    {
        return $order->orderDetails->sum(function ($detail) {
            return round(convert_price($detail->price), 2);
        });
    }

    private function generateSignature($merchantRef, $amount)
    {
        try {
            $merchantPassword = env('CITIGATE_MerchantPassword');
            $currencyCode = $this->getCurrencyCode();
            $amountInCents = $amount * 100;

            return sha1($merchantPassword . $merchantRef . $currencyCode . $amountInCents);
        } catch (Exception $e) {
            Log::error('Signature generation error', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString(),
                'data' => [
                    'merchantRef' => $merchantRef,
                    'amount' => $amount,
                    'currencyCode' => $currencyCode ?? null,
                    'merchantPassword' => $merchantPassword ? 'exists' : 'missing'
                ]
            ]);
            throw $e;
        }
    }


    private function getCurrencyCode()
    {
        try {
            $defaultCurrency = BusinessSetting::where('type', 'system_default_currency')->first();

            if (!$defaultCurrency) {
                Log::error('Default currency setting lookup failed', [
                    'error' => 'Default currency setting not found',
                    'type' => 'system_default_currency'
                ]);
                throw new Exception('Default currency configuration error');
            }


            $currency = Currency::where('code', Session::get('currency_code'))
                ->orWhere('id', $defaultCurrency->value)
                ->first();

            if (!$currency) {
                Log::error('Currency lookup failed', [
                    'error' => 'Currency not found',
                    'session_currency' => Session::get('currency_code'),
                    'default_currency_id' => $defaultCurrency->value
                ]);
                throw new Exception('Currency configuration error');
            }

            return $currency->code;
        } catch (Exception $e) {
            Log::error('Payment processing error', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString(),
            ]);

            Flash::error('Payment processing failed. Please try again.');
            return redirect()->route('checkout.shipping_info');
        }
    }


    private function storeBillingAddress(Request $request)
    {
        try {
            $shippingInfo = $request->session()->get('shipping_info');

            $billingData = [
                'user_id' => $shippingInfo['user_id'],
                'email' => $shippingInfo['email'],
                'name' => $shippingInfo['name'],
                'lname' => $shippingInfo['lname'],
                'address' => $shippingInfo['address'],
                'addressL2' => $shippingInfo['addressL2'] ?? '',
                'city' => $shippingInfo['city'],
                'postal_code' => $shippingInfo['postal_code'],
                'country' => $shippingInfo['country'],
                'stateProvince' => $shippingInfo['stateProvince'] ?? '',
                'dob' => $shippingInfo['dob'],
                'phone' => $shippingInfo['phone']
            ];

            $result = DB::table('last_billing_address')->insert($billingData);

            if (!$result) {
                throw new Exception('Failed to insert billing address');
            }

            return true;
        } catch (Exception $e) {
            Log::error('Payment processing error', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
                'merchant_ref' => $request->MerchantRef,
                'session_data' => Session::all()
            ]);

            Flash::error('Payment processing failed. Please try again.');
            return redirect()->route('checkout.shipping_info');
        }
    }

    public function success(Request $request)
    {
        try {
            $paymentSession = PaymentSession::where('token', $request->MerchantRef)->latest()->first();
            Log::info($request->all());

            $sessionData = $paymentSession->session_data;
            $currencyCode = $sessionData['currency_code'];

            GatewayHistory::storeTransaction($request, $currencyCode);
            $this->reactivateSession($paymentSession);
            $paymentSession->update(['status' => 'success']);

            Flash::success('Payment completed successfully.');
            return redirect()->route('order_confirmed');
        } catch (Exception $e) {
            Log::error('Payment processing error', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
                'merchant_ref' => $request->MerchantRef,
                'session_data' => Session::all()
            ]);

            Flash::error('Payment processing failed. Please try again.');
            return redirect()->route('checkout.shipping_info');
        }
    }

    public function fail(Request $request)
    {
        try {
            $paymentSession = PaymentSession::where('token', $request->MerchantRef)->latest()->first();
            Log::info($request->all());

            $sessionData = $paymentSession->session_data;
            $currencyCode = $sessionData['currency_code'];

            GatewayHistory::storeTransaction($request, $currencyCode);
            $this->reactivateSession($paymentSession);
            $paymentSession->update(['status' => 'failed']);

            Flash::error('Payment failed. Please try your payment again.');
            return redirect()->route('checkout.shipping_info');
        } catch (Exception $e) {
            Log::error('Payment processing error', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
                'merchant_ref' => $request->MerchantRef,
                'session_data' => Session::all()
            ]);

            Flash::error('Payment processing failed. Please try again.');
            return redirect()->route('checkout.shipping_info');
        }
    }


    private function reactivateSession($paymentSession)
    {
        if ($paymentSession) {
            $sessionData = $paymentSession->session_data;
            foreach ($sessionData as $key => $value) {
                Session::put($key, $value);
            }
            $paymentSession->delete();

            return true;
        }
        return false;
    }

    public function cancel(Request $request)
    {
        $request->session()->forget(['order_id', 'payment_data']);
        session()->flash('paymentcancelled');
        return redirect()->route('checkout.shipping_info');
    }
}
