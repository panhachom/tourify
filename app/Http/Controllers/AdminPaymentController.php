<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;

class AdminPaymentController extends Controller
{
    public function show($payment_id)
    {
        $payment = Payment::findOrFail($payment_id);
        $booking = Booking::where('payment_id', $payment_id)->first();

        return view('admin.payment.show', compact('payment','booking'));

        
    }
}
