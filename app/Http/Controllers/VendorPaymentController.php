<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Payment;
use App\Models\Booking;


class VendorPaymentController extends Controller
{
    public function show($vendor_id, $payment_id)
    {
        $payment = Payment::findOrFail($payment_id);
        $booking = Booking::where('payment_id', $payment_id)->first();

        return view('vendor.payment.show', compact('payment','vendor_id','booking'));

        
    }
}
