<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use App\Models\Booking;
use Exception;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $data['email'] = 'sethamanith3333@gmail.com';
        try{
            Mail::send('mail/BookingMail', ['data' =>$data ], function ($message) use($data){
                $message->to($data['email'])->subject('New Booking is Here');
            });
        }catch (Exception $e){
            return redirect('/tour_list');
        }
        Session::flash('success', 'Booking successfully!');

    
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
