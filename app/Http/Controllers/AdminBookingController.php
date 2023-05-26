<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index (){
        $bookings = Booking::all();
        return view('admin.booking.index', compact('bookings'));
    }
    
    public function show($booking_id){
        $booking = Booking::findOrFail($booking_id);
        return view('admin.booking.show', compact('booking'));
    }

    public function destroy($booking_id){
        $booking = Booking::findOrFail($booking_id);
        $booking -> delete();

        return redirect()
            ->route('booking.index')
            ->with('success', 'Promotion deleted successfully');
    }
}
