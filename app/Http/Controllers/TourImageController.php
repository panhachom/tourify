<?php

namespace App\Http\Controllers;

use App\Models\TourImage;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vendorid, $tourid)
    {
        $tour = Tour::where('vendor_id', $vendorid)->where('id', $tourid)->firstOrFail();
        $images = $tour->tour_images()->get();

        $params = ['vendor' => $vendorid, 'tour' => $tourid];

        return view('vendor.tours.images.index', compact('tour', 'images', 'params'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($vendorid ,$tourid)
    {
        $tour = Tour::where('vendor_id', 1)->where('id', $tourid)->firstOrFail();
        return view('vendor.tours.images.create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $vendorid, $tourid)
    {
        // Validate the request data
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.required' => 'Please select an image to upload.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The uploaded file must be a JPEG, PNG, JPG, or GIF image.',
            'image.max' => 'The uploaded file may not be larger than 2MB.',
        ]);
        // Get the uploaded file
        $image = $request->file('image');

        // Set a unique name for the image
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Move the uploaded file to the public folder
        $image->move(public_path('images/tours'), $imageName);

        // Save the image details to the database
        $tourImage = new TourImage;
        $tourImage->tour_id = $tourid;
        $tourImage->name = $imageName;
        $tourImage->save();

        return redirect()->route('vendor.tours.images.index', [$vendorid, $tourid])->with('success', 'Tour image has been added successfully');
    }









    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TourImage  $tourImage
     * @return \Illuminate\Http\Response
     */
    public function show(TourImage $tourImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TourImage  $tourImage
     * @return \Illuminate\Http\Response
     */
    public function edit(TourImage $tourImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TourImage  $tourImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourImage $tourImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TourImage  $tourImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendorid, $tourid, TourImage $image)
    {
        $image->delete();
        return redirect()->route('vendor.tours.images.index', [$vendorid, $tourid])->with('success', 'Tour image has been deleted successfully');
    }
}





