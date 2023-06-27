<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Vendor;
use App\Models\Tour;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function index(){
        $promotions = Promotion::all();
        return view('admin.promotion.index', compact('promotions'));
    }

    public function create()
    {
        $vendors = Vendor::all();
        $tours = Tour::where('status', true)->whereNull('discount_price') ->get();        
        
        return view('admin.promotion.create', compact('vendors','tours'));
    }



 
public function getTour(Request $request)
{
    $vendorId = $request->input('vendorId');
    
    if (!$vendorId) {
        return response()->json([]); // Return an empty response if no vendor is selected
    }
    
    $tours = Tour::where('status', true)->whereNull('discount_price') ->where('vendor_id', $vendorId)->get();    
    return response()->json($tours);
}


    public function store(Request $request){
        
        $request->validate([
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'description' => ['required', 'string'],
            'percent' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'image_name.required' => 'Please select an image to upload.',
            'image_name.image' => 'The uploaded file must be an image.',
            'image_name.mimes' => 'The uploaded file must be a JPEG, PNG, JPG, or GIF image.',
            'image_name.max' => 'The uploaded file may not be larger than 2MB.',
            'title.regex' => 'The title should not contain special characters.',
        ]);

        $image = $request ->file('image_name');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image -> move(public_path('images/promotions'), $imageName);

        $vendorName = $request->input('vendor_name');
        $vendor = Vendor::where('name', $vendorName)->first();
        $vendorId = $vendor->id ?? null;

        $promotions = new Promotion;
        $promotions -> title = $request -> title;
        $promotions -> description = $request -> description;
        $promotions -> percent = $request -> percent;
        $promotions -> start_date = $request -> start_date;
        $promotions -> end_date = $request -> end_date;
        $promotions -> vendor_id = $request -> vendor_id;
        $promotions -> status = $request->has('status') ? 1 : 0;
        $promotions -> image_name = $imageName;
        $promotions -> save();

        $vendorId = $request->input('vendor_id');
        // $tours = Tour::where('vendor_id', $vendorId)->pluck('id')->toArray();
        $tours = $request->input('tours', []);
        $toursWithPrices = [];



        foreach ($tours as $tourId) {
            $tour = Tour::find($tourId);
            if ($tour) {
                $price_discount = $tour->price - ($promotions->percent * $tour->price / 100);
                $toursWithPrices[$tourId] = ['price' => $price_discount];
            }
        }
        

        $promotions->tours()->sync($toursWithPrices);
    
        return redirect()->route('promotion.index')->with('success', 'Promotion created successfully');
    }
    

    public function edit($promotion_id){
        $vendors = Vendor::all();
        $tours = Tour::all();
        $promotion = Promotion::findOrFail($promotion_id);

        return view('admin.promotion.edit', compact('promotion','vendors','tours'));
    }

    public function update(Request $request, $promotion_id)
    {
        $promotion = Promotion::findOrFail($promotion_id);
        $validateData = $request->validate([
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'description' => ['required', 'string'],
            'percent' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'image_name.required' => 'Please select an image to upload.',
            'image_name.image' => 'The uploaded file must be an image.',
            'image_name.mimes' => 'The uploaded file must be a JPEG, PNG, JPG, or GIF image.',
            'image_name.max' => 'The uploaded file may not be larger than 2MB.',
            'title.regex' => 'The title should not contain special characters.',
        ]);
    
        $image = $request->file('image_name');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/promotions'), $imageName);
    
        $vendorName = $request->input('vendor_name');
        $vendor = Vendor::where('name', $vendorName)->first();
        $vendorID = $vendor->id ?? null;
    
        $promotion->title = $validateData['title'];
        $promotion->description = $validateData['description'];
        $promotion->percent = $validateData['percent'];
        $promotion->start_date = $validateData['start_date'];
        $promotion->end_date = $validateData['end_date'];
        if (array_key_exists('vendor_id', $validateData)) {
            $promotion->vendor_id = $validateData['vendor_id'];
        }    
        $promotion->image_name = $imageName;
    
        $selectedTours = $request->input('tours', []);
        $existingTours = $promotion->tours->pluck('id')->toArray();

    foreach ($selectedTours as $tourId) {
        $tour = Tour::find($tourId);
        if ($tour) {
            $price_discount = $tour->price - ($promotion->percent * $tour->price / 100);
            $promotion->tours()->sync([$tour->id => ['price' => $price_discount]], false);
        }
    }

    // Get the updated list of tours after adding the new selected tours
    $tours = array_merge($existingTours, $selectedTours);

    $promotion->tours()->sync($tours);

    return redirect()->route('promotion.index')->with('success', 'Promotion updated successfully.');

    }
    
    

    public function destroy($promotion_id){
        $promotion = Promotion::findOrFail($promotion_id);
        $promotion->remove_promotion_tour();
        $promotion->delete();

    
        return redirect()
            ->route('promotion.index') 
            ->with('success', 'Promotion deleted successfully');
    }

    public function toggleActivation($id)
    {
        $promotion = Promotion::findOrFail($id);
        if (Carbon::parse($promotion->end_date)->isPast()) {
            $promotion->toggleActivate();

            return redirect()->back()->with('fail', 'Promotion is Expired');
        }
        $promotion->toggleActivate();

        return redirect()->back()->with('status', 'Promotion update successfully.');


    }
    
}
