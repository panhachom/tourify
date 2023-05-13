<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Models\Vendor;

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
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'capacity'=> 'required',
                'image' => 'required|image|max:2048'
            ]);
    
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $filename);
    
            $tour = Tour::create($request->all());
    
            $tourImage = new TourImage();
            $tourImage->tour_id = $tour->id;
            $tourImage->name = $filename;
            $tourImage->save();
    
            return redirect()->route('vendor.tours.index', ['vendor' => 1])
                ->with('success', 'Tour updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create tour. Error message: ' . $e->getMessage());
        }
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

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->getClientOriginalName();
                $path = $image->storeAs('images', $name, 'public');
                $tour->images()->create(['name' => $name]);
            }
        }
    
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
    $tour = Tour::findOrFail($tourId);
    
    $tour->delete();

    return redirect()->route('vendor.tours.index', ['vendor' => $vendor->id]);
}
}
