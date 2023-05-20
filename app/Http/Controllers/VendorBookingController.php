<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Vendor;
use App\Models\Tour;

use Illuminate\Http\Request;

class VendorBookingController extends Controller
{
    public function index (){
        $bookings = Booking::all(); 
        return view('vendor.booking.index',compact('bookings'));
    }
    public function approved_booking (){
        $approvedBookings = Booking::where('approved', true)->get();
        return view('vendor.booking.approved_booking', compact('approvedBookings'));
    }
    public function unapproved_booking (){
        $unapprovedBookings = Booking::where('approved', false)->get();
        return view('vendor.booking.unapproved_booking', compact('unapprovedBookings'));
    }
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->load('tours');
        return view('vendor.booking.show', compact('booking'));
    }

    public function edit($vendorId, $bookingId)
    {
        $vendor = Vendor::findOrFail($vendorId);
        $tours = Tour::where('vendor_id', $vendorId)->get();
        $booking = Booking::findOrFail($bookingId);

        return view('vendor.booking.edit', compact('vendor','booking','tours'));
        
    }



    public function update(Request $request, $vendorId, $bookingId)
    {
        $validatedData = $request->validate([
            'tour_id' => 'required',
            'quantity' => 'required'
        ]);
    
        $booking = Booking::findOrFail($bookingId); // Fetch the booking from the database
    
        $tour = Tour::findOrFail($validatedData['tour_id']);
        $vendorId = $tour->vendor_id;
        $approved = $request->input('approved') ? true : false;

    
        $booking->quantity = $validatedData['quantity'];
        $booking->total = $validatedData['quantity'] * $tour->price;
        $booking->booking_number = Booking::generateBookingNumber($vendorId);
        $booking->approved = $approved;
        
        $booking->intit_booking_tour_qty($approved);
        $booking->save();
    
        $booking->tours()->sync([$tour->id]);
    
        return redirect()->route('vendor.booking.index',['vendor' => $vendorId]);
    }
    


}
