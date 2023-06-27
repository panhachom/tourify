<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Tour;
use App\Models\Booking;
use App\Models\Activity;


use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function dashboard(){

        return view('vendor.dashboard');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor_id = $id ;
        $vendor = Vendor::findOrFail($vendor_id);
        $tours = Tour::where('vendor_id', $vendor_id)->get();
        $activities = Activity::all();
        $bookings = Booking::whereHas('tour', function ($query) use ($vendor_id) {
            $query->where('vendor_id', $vendor_id);
        })->get();        
        $recentTours = Tour::where('vendor_id',$vendor_id)->orderBy('created_at', 'desc')->take(5)->get();
        $recentActivities = Activity::orderBy('created_at', 'desc')->take(5)->get();
        $recentBookings = Booking::whereHas('tour', function ($query) use ($vendor_id) {
            $query->where('vendor_id', $vendor_id);
        })->get();  




        return view('vendor.show', compact('vendor_id', 'vendor', 'tours', 'activities','bookings','recentTours','recentActivities','recentBookings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
