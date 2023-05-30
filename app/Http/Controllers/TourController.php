<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Country;
use App\Models\Activity;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;


class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vendor_id)
    {
        $tours = Tour::all();

        return view('vendor.tours.index', compact('tours','vendor_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($vendor_id)
    {
        $countries = Country::all();
        $categories = Category::all();
        return view('vendor.tours.create', compact('countries', 'categories', 'vendor_id'))
            ->with('success', 'Tour created successfully!');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $vendor_id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'qty' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $tour = new Tour;

        $tour->name = $validatedData['name'];
        $tour->description = $request->description;
        $tour->price = $validatedData['price'];
        $tour->capacity = $validatedData['capacity'];
        $tour->qty = $validatedData['qty'];
        $tour->vendor_id = $vendor_id;

        $tour->save();

        $categories = $validatedData['categories'];
        $tour->categories()->attach($categories);

        $categories = Category::all();
        Session::flash('success', 'Booking created successfully!');
        return view('vendor.tours.edit', compact('tour','categories','vendor_id','tour','categories'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit($vendor_id, $tourId)
    {
        $tour = Tour::findOrFail($tourId);
        $categories = Category::all();

        return view('vendor.tours.edit', compact('tour','categories','vendor_id'));

        
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
    
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'qty' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);
    
        $tour->name = $validatedData['name'];
        $tour->description = $request->description;
        $tour->price = $validatedData['price'];
        $tour->capacity = $validatedData['capacity'];
        $tour->qty = $validatedData['qty'];
        $tour->vendor_id = $vendor->id;
        $tour->save();
    
        $categories = $validatedData['categories'];
        $tour->categories()->sync($categories);
        Session::flash('success', 'Booking update successfully!');
        return redirect()->route('vendor.tours.index', ['vendor' => $vendor->id]);
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendor_id, $tourId)
    {
        $tour = Tour::where('vendor_id', $vendor_id)->findOrFail($tourId);
        $tour->countries()->detach();
        $tour->delete();
        Session::flash('success', 'Booking deleted successfully!');
        return redirect()->route('vendor.tours.index', ['vendor' => $vendor_id]);
    }


    public function addCountry($id)
    
    {
        $tour = Tour::findOrFail($id);
        $countries = Country::all();
        return view('tours.add-country', compact('tour', 'countries'));
    }

    public function destroyActivity(Request $request, $vendor, $tour, $activity)
    {
        $tour = Tour::findOrFail($tour);
        $activity = Activity::findOrFail($activity);
        
        $tour->activities()->detach($activity);
        
        return redirect()->back()->with('success', 'Activity removed successfully.');
    }

    public function destroyCountry(Request $request, $vendor, $tour, $country)
    {
        $tour = Tour::findOrFail($tour);
        $country = Country::findOrFail($country);
        
        $tour->countries()->detach($country);
        
        return redirect()->back()->with('success', 'Country removed successfully.');
    }
}
