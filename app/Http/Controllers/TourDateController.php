<?php

namespace App\Http\Controllers;

use App\Models\TourDate;
use App\Models\Tour;

use Illuminate\Http\Request;

class TourDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vendorid, $tourid)
    {
        $tour = Tour::where('vendor_id', $vendorid)->where('id', $tourid)->firstOrFail();
        $tour_dates = $tour->tour_dates()->get();

        $params = ['vendor' => $vendorid, 'tour' => $tourid];

        return view('vendor.tours.tour_date.index', compact('tour', 'tour_dates', 'params'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($vendorid ,$tourid)
    {
        $tour = Tour::where('vendor_id', 1)->where('id', $tourid)->firstOrFail();
        return view('vendor.tours.tour_date.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $vendorid, $tourid)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date|unique:tour_dates',
        ]);

        $tourdate = new Tourdate;
        $tourdate->tour_id = $tourid;
        $tourdate->start_date = $validatedData['start_date'];
        $tourdate->end_date = $validatedData['end_date'];

        $tourdate->save();

        return redirect()->route('vendor.tours.tour_date.index', ['vendor' => $vendorid, 'tour' => $tourid])->with('success', 'Tour dates added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function show(TourDate $tourDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function edit($vendorId, $tourId, $tourDateId)
    {
        $tourDate = TourDate::findOrFail($tourDateId);
        $tour = Tour::findOrFail($tourId);


        return view('vendor.tours.tour_date.edit', compact('tourDate', 'vendorId', 'tourId', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vendorId, $tourId, $tourDateId)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        $tourDate = TourDate::findOrFail($tourDateId);
        $tourDate->start_date = $validatedData['start_date'];
        $tourDate->end_date = $validatedData['end_date'];
        $tourDate->save();
    
        return redirect()->route('vendor.tours.tour_date.index', ['vendor' => 1, 'tour' => $tourId])->with('success', 'Tour date updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendorId, $tourId, $tourDateId)
    {
        $tourDate = TourDate::findOrFail($tourDateId);
        $tourDate->delete();

        return redirect()->route('vendor.tours.tour_date.index', ['vendor' => 1, 'tour' => $tourId])->with('success', 'Tour date deleted successfully.');
    }
}
