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
    public function index($vendor_id, $tour_id)
    {
        $tour = Tour::where('vendor_id', $vendor_id)->where('id', $tour_id)->firstOrFail();
        $tour_dates = $tour->tour_dates()->get();

        $params = ['vendor' => $vendor_id, 'tour' => $tour_id];

        return view('vendor.tours.tour_date.index', compact('tour', 'tour_dates', 'params','vendor_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($vendor_id ,$tour_id)
    {
        $tour = Tour::where('vendor_id', 1)->where('id', $tour_id)->firstOrFail();
        return view('vendor.tours.tour_date.create', compact('tour','vendor_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $vendor_id, $tour_id)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date|unique:tour_dates',
        ]);

        $tourdate = new Tourdate;
        $tourdate->tour_id = $tour_id;
        $tourdate->start_date = $validatedData['start_date'];
        $tourdate->end_date = $validatedData['end_date'];

        $tourdate->save();

        return redirect()->route('vendor.tours.tour_date.index', ['vendor' => $vendor_id, 'tour' => $tour_id])->with('success', 'Tour dates added successfully.');
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
    public function edit($vendor_id, $tourId, $tourDateId)
    {
        $tourDate = TourDate::findOrFail($tourDateId);
        $tour = Tour::findOrFail($tourId);


        return view('vendor.tours.tour_date.edit', compact('tourDate', 'vendor_id', 'tourId', 'tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vendor_id, $tour_id, $tourDateId)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
    
        $tourDate = TourDate::findOrFail($tourDateId);
        $tourDate->start_date = $validatedData['start_date'];
        $tourDate->end_date = $validatedData['end_date'];
        $tourDate->save();
    
        return redirect()->route('vendor.tours.tour_date.index', ['vendor' => $vendor_id, 'tour' => $tour_id])->with('success', 'Tour date updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendor_id, $tour_id, $tourDateId)
    {
        $tourDate = TourDate::findOrFail($tourDateId);
        $tourDate->delete();

        return redirect()->route('vendor.tours.tour_date.index', ['vendor' => $vendor_id, 'tour' => $tour_id])->with('success', 'Tour date deleted successfully.');
    }
}
