<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Country;
use App\Models\Activity;

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
        $countries = Country::all();
        $categories = Category::all();

        return view('vendor.tours.create', compact('countries', 'categories'));

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

        $vendor = Vendor::findOrFail($vendor_id);

        $tour->name = $validatedData['name'];
        $tour->description = $validatedData['description'];
        $tour->price = $validatedData['price'];
        $tour->capacity = $validatedData['capacity'];
        $tour->qty = $validatedData['qty'];
        $tour->vendor_id = $vendor->id;

        $tour->save();

        $categories = $validatedData['categories'];
        $tour->categories()->attach($categories);

        return redirect()->route('vendor.tours.index', ['vendor' => 1]);
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
        $categories = Category::all();

        return view('vendor.tours.edit', compact('vendor','tour','categories'));
        
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
            'description' => 'required',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'qty' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);
    
        $tour->name = $validatedData['name'];
        $tour->description = $validatedData['description'];
        $tour->price = $validatedData['price'];
        $tour->capacity = $validatedData['capacity'];
        $tour->qty = $validatedData['qty'];
        $tour->vendor_id = $vendor->id;
        $tour->save();
    
        $categories = $validatedData['categories'];
        $tour->categories()->sync($categories);
    
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
