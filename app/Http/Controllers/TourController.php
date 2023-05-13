<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Vendor;
use Illuminate\Http\Request;


class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tours = Tour::all();
        return view('vendor.tours.index', compact('tours'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    
    {
        return view('vendor.tours.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $vendor_id)
    {
    
            $tour = new Tour;
            $vendor = Vendor::findOrFail($vendor_id);

            $tour -> name = $request -> name;
            $tour -> description = $request -> description;
            $tour -> price = $request -> price;
            $tour -> capacity = $request -> capacity;
            $tour->vendor_id = $vendor->id;

            $tour -> save();
            
            return redirect() -> route('vendor.tours.index', ['vendor'=>1]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show($vendorId, $tourId)
    {
        $vendor = Vendor::findOrFail($vendorId);
        $tour = Tour::findOrFail($tourId);
        return view('vendor.tours.show', compact('vendor', 'tour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit($vendorId, $tourId)
    {
        $vendor = Vendor::findOrFail($vendorId);
        $tour = Tour::findOrFail($tourId);
        return view('vendor.tours.edit', compact('vendor','tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vendorId, $tourId)
    {
        $vendor = Vendor::findOrFail($vendorId);
        $tour = Tour::findOrFail($tourId);
        $tour->name = $request->name;
        $tour->description = $request->description;
        $tour->price = $request->price;
        $tour->capacity = $request->capacity;
        $tour->save();

    
        return redirect()->route('vendor.tours.index', ['vendor' => $vendor->id])
            ->with('success', 'Tour updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendorId, $tourId)
    {
        $vendor = Vendor::findOrFail($vendorId);
        $tour = Tour::where('vendor_id', $vendorId)->findOrFail($tourId);
        
        $tour->delete();

        return redirect()->route('vendor.tours.index', ['vendor' => $vendor->id]);
    }
}
