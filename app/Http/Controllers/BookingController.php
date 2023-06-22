<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use App\Models\Vendor;
use App\Models\Booking;
use App\Models\Payment;
use Exception;
use Omnipay\Omnipay;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    private $gateway;

    public function index( )
    {
        return view('home.index');
    }

    public function __construct(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setSecret(env('PAYPAL_SECRET'));
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setTestMode(true); 
        // set it to 'false' when go live
    }

    public function pay(Request $request)
    {
        $validatedData = $request->validate([
            'tour_id' => 'required',
            'quantity' => 'required'
        ]);
    
        session()->put('booking_data', $validatedData);
    
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->input('amount'),
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();
    
            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    

    public function success(Request $request)
    {

        $validatedData = session()->get('booking_data');

        if ($validatedData && $request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
    
            $response = $transaction->send();
    
            if ($response->isSuccessful()) {
                // Process successful payment
    
                $arr_body = $response->getData();
    
    
                $tour = Tour::findOrFail($validatedData['tour_id']);
                $vendorId = $tour->vendor_id;
    
                $user = auth()->user();
                $booking = new Booking();
                $booking->quantity = $validatedData['quantity'];
                if ($tour->discount_price !== null) {
                    $booking->price = $tour->discount_price;
                } else {
                    $booking->price = $tour->price;
                }                
                $booking->total = $booking->quantity * $booking->price;
                $booking->booking_number = Booking::generateBookingNumber($vendorId);
                $booking->payment_method = 'Paypal';

                $tour->capacity =  $tour->capacity - $booking->quantity;

    
                $booking->user()->associate($user);
                $booking->tour()->associate($tour);
    
                $payment = new Payment();
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->save();

                $booking->payment_id = $payment->id;
                $booking->save();
                $tour->save();

    
                if ($booking->save() && $payment->save()) {
                    session()->flash('booking_success', true);
                    return redirect()->back();
                } else {
                    $error = $payment->getError();
                    Session::flash('error', 'Failed to save payment details: ' . $error);
                    return redirect()->back();
                }
            } else {
                // Display error message
                $error = $response->getMessage();
                return 'Transaction failed: ' . $error;
            }
        }
    }
    

    public function error (){
        return 'User cancelled the payment';
    }


    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'tour_id' => 'required',
            'quantity' => 'required'
        ]);


        $tour = Tour::findOrFail($validatedData['tour_id']);
        $vendorId = $tour->vendor_id;

        $user = auth()->user();

        $booking = new Booking();
        $booking->quantity = $validatedData['quantity'];
        $booking->price = $tour->price;
        $booking->total = $booking->quantity * $booking->price;
        $booking->booking_number = Booking::generateBookingNumber($vendorId);
        $booking->payment_method = 'Paypal';
        $booking->payment_method = 'Paypal';

        $booking->user()->associate($user);
        $booking->tour()->associate($tour);
        $booking->save();
        session()->flash('booking_success', true);


        return redirect()->back();
    }
    

    public function create($tour_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login.show');
        }

        $user = Auth::user();
        $tour = Tour::findOrFail($tour_id);
    
        return view('booking.create', compact('user','tour'));
    }
    public function bookingHistory($tour_id)
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login.show');
        // }

        // $user = Auth::user();
        $tours = Tour::all();

        // dd($tour);
    
        return view('booking.bookingHistory', compact('tours'));
    }
   
}
