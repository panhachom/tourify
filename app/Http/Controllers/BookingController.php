<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use App\Models\Booking;

use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index( )
    {
        return view('home.index');
    }

    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'tour_id' => 'required',
            'quantity' => 'required'
        ]);
    
        $tour = Tour::findOrFail($validatedData['tour_id']);
        $vendorId = $tour->vendor_id;
    
        $booking = new Booking();
        $booking->user_id = auth()->user()->id;
        $booking->quantity = $validatedData['quantity'];
        $booking->total = $validatedData['quantity'] * $tour->price;
        $booking->booking_number = Booking::generateBookingNumber($vendorId);

    
        $booking->save();
    
        // Associate the booking with the tour using the many-to-many relationship
        $booking->tours()->attach($tour->id);
    
        return redirect()->route('home.index');
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
}
