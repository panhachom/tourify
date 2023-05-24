<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Vendor;
use App\Models\Tour;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class VendorBookingController extends Controller
{
    public function index ($vendor_id){
        $bookings = Booking::all(); 
        return view('vendor.booking.index',compact('bookings','vendor_id'));
    }
    public function approved_booking ($vendor_id){
        $approvedBookings = Booking::where('approved', true)->get();
        return view('vendor.booking.approved_booking', compact('approvedBookings','vendor_id'));
    }
    public function unapproved_booking ($vendor_id){
        $unapprovedBookings = Booking::where('approved', false)->get();
        return view('vendor.booking.unapproved_booking', compact('unapprovedBookings','vendor_id'));
    }
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->load('tours');
        return view('vendor.booking.show', compact('booking'));
    }

    public function edit($vendor_id, $bookingId)
    {
        $tours = Tour::where('vendor_id', $vendor_id)->get();
        $booking = Booking::findOrFail($bookingId);

        return view('vendor.booking.edit', compact('booking','tours','vendor_id'));
        
    }



    public function update(Request $request, $vendor_id, $bookingId)
    {
        $validatedData = $request->validate([
            'tour_id' => 'required',
            'quantity' => 'required'
        ]);
    
        $booking = Booking::findOrFail($bookingId); // Fetch the booking from the database
    
        $tour = Tour::findOrFail($validatedData['tour_id']);
        $approved = $request->input('approved') ? true : false;

    
        $booking->quantity = $validatedData['quantity'];
        $booking->total = $validatedData['quantity'] * $tour->price;
        $booking->booking_number = Booking::generateBookingNumber($vendor_id);
        $booking->approved = $approved;
        
        $booking->intit_booking_tour_qty($approved);
        $booking->save();
    
        $booking->tours()->sync([$tour->id]);

        return redirect()->route('vendor.booking.index',['vendor' => $vendor_id]);
    }

    public function destroy($vendor_id, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        
        // Delete any relationships with tours
        $booking->tours()->detach();
        
        // Delete the booking
        $booking->delete();
        
        return redirect()->route('vendor.booking.index', ['vendor' => $vendor_id]);
    }

    


}
