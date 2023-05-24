<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use App\Models\Booking;
use Illuminate\Support\Facades\Session;

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
        $user = auth()->user();

        $existingBooking = $user->bookings()->whereHas('tours', function ($query) use ($tour) {
            $query->where('tour_id', $tour->id);
        })->where('approved', false)->exists();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'Your Booking is Pending');
        }
    
    
        $booking = new Booking();
        $booking->user_id = auth()->user()->id;
        $booking->quantity = $validatedData['quantity'];
        $booking->price = $tour->price;
        $booking->total = $booking->quantity * $booking->price;
        $booking->booking_number = Booking::generateBookingNumber($vendorId);

    
        $booking->save();
    
        $booking->tours()->attach($tour->id);
        Session::flash('success', 'Booking deleted successfully!');

    
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
}
