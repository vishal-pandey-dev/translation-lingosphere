<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ContactUS;
use Carbon\Carbon;
use App\Services\EmailService;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class TranslationController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function certified_translation()
    {
        try {
            Session::put('Type', '1');
            return view('frontend.certifified_translation');
        } catch (\Exception $e) {
            Log::error('Error in certified translation: ' . $e->getMessage());
            Flash::error('Unable to load certified translation page');
            return redirect()->route('index');
        }
    }

    public function standard_translation()
    {
        try {
            Session::put('Type', '2');
            return view('frontend.standard_translation');
        } catch (\Exception $e) {
            Log::error('Error in standard translation: ' . $e->getMessage());
            Flash::error('Unable to load standard translation page');
            return redirect()->route('index');
        }
    }

    public function request_translation()
    {
        try {
            $services = Product::all();
            return view('frontend.request_translation', compact('services'));
        } catch (\Exception $e) {
            Log::error('Error loading translation request: ' . $e->getMessage());
            Flash::error('Unable to load translation request page');
            return redirect()->route('index');
        }
    }

    public function addToCart(Request $request)
    {
        try {
            $fileName_path = $this->handleFileUpload($request);

            $cartItem = [
                'id' => $request->input('service_id_hidden'),
                'variant' => 0,
                'quantity' => $request->input('service_no_of_pages_hidden'),
                'price' => $request->input('service_price_hidden'),
                'tax' => 0,
                'shipping' => 0,
                'translation_file' => "public/" . $fileName_path,
                'from_lang' => $request->input('from_lang_hidden'),
                'to_lang' => $request->input('to_lang_hidden'),
                'service_title' => $request->input('service_title_hidden'),
                'service_description' => $request->input('service_description_hidden'),
                'service_no_of_pages' => $request->input('service_no_of_pages_hidden'),
                'service_no_of_words' => $request->input('service_no_of_words_hidden'),
                'delivery_datetime' => $request->input('formattedDeliveryDate_hidden'),
                'message' => $request->input('message'),
            ];

            $cart = $request->session()->get('cart', []);
            $cart[] = $cartItem;
            $request->session()->put('cart', $cart);

            return response()->json([
                'success' => true,
                'message' => 'Item added to cart successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Cart addition error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to add item to cart'
            ], 500);
        }
    }

    public function careers()
    {
        try {
            return view('frontend.careers');
        } catch (\Exception $e) {
            Log::error('Careers page error: ' . $e->getMessage());
            Flash::error('Unable to load careers page');
            return redirect()->route('index');
        }
    }

    public function request_careers(Request $request)
    {
        try {
            $this->validateCareersRequest($request);
            $this->verifyCaptcha($request);

            $data = $this->processCareersData($request);
            $attachment = $this->handleFileUpload($request);

            DB::transaction(function () use ($data, $attachment) {
                ContactUS::create(array_merge($data, ['attachment' => $attachment]));
                $this->sendCareersEmails($data);
            });

            Flash::success('Your application has been submitted successfully!');
            return back()->with('careerscontactsuccess');
        } catch (ValidationException $e) {
            Flash::error('Please check your input and try again');
            return back()->withErrors($e)->withInput();
        } catch (\Exception $e) {
            Log::error('Career application error: ' . $e->getMessage());
            Flash::error('Unable to process your application');
            return back()->withInput();
        }
    }

    private function handleFileUpload(Request $request)
    {
        try {
            if (!$request->hasFile('document')) {
                return 'not file selected';
            }

            $file = $request->file('document');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) .
                strtotime(Carbon::now()) . '.' .
                $file->getClientOriginalExtension();

            $file->move(public_path('uploads/documents'), $fileName);
            return "uploads/documents/$fileName";
        } catch (\Exception $e) {
            Log::error('File upload error: ' . $e->getMessage());
            throw new \Exception('File upload failed');
        }
    }

    private function validateCareersRequest(Request $request)
    {
        try {
            return $request->validate([
                'fullname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'message' => 'required',
                'native_lang' => 'required',
                'pairs_lang' => 'required',
                'rate_per' => 'required',
            ]);
        } catch (\Exception $e) {
            Log::error('Validation error: ' . $e->getMessage());
            throw new ValidationException($e);
        }
    }

    private function processCareersData(Request $request)
    {
        try {
            $data = $request->only([
                'from_page',
                'fullname',
                'email',
                'phone',
                'message',
                'native_lang',
                'pairs_lang',
                'rate_per'
            ]);

            if (isset($_POST['lang_pairs_rate']) && is_array($_POST['lang_pairs_rate'])) {
                $data['lang_pairs_rate'] = implode(',', $_POST['lang_pairs_rate']);
            }

            $data['rate_per'] = currency_symbol() . $request->rate_per;
            return $data;
        } catch (\Exception $e) {
            Log::error('Data processing error: ' . $e->getMessage());
            throw new \Exception('Unable to process application data');
        }
    }

    private function sendCareersEmails($data)
    {
        try {
            $this->emailService->send(
                'careers',
                $data,
                env('ADMIN_EMAIL', 'support@lingosphere.co'),
                'New Career Application'
            );

            $this->emailService->send(
                'careers_acknowledge',
                $data,
                $data['email'],
                'Thank you for your application'
            );
        } catch (\Exception $e) {
            Log::error('Email sending error: ' . $e->getMessage());
            throw new \Exception('Unable to send confirmation emails');
        }
    }
}
