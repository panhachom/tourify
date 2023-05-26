<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Vendor;
use App\Models\Tour;
class PromotionController extends Controller
{
    public function index(){
        $promotions = Promotion::all();
        return view('admin.promotion.index', compact('promotions'));
    }

    public function create()
    {
        $vendors = Vendor::all();
        $tours = Tour::all();
        return view('admin.promotion.create', compact('vendors','tours'));
    }



 
public function getTour(Request $request)
{
    $vendorId = $request->input('vendorId');
    
    if (!$vendorId) {
        return response()->json([]); // Return an empty response if no vendor is selected
    }
    
    $tours = Tour::where('vendor_id', $vendorId)->get();
    
    return response()->json($tours);
}


    public function store(Request $request){
        
        $request->validate([
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'description' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'percent' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'image_name.required' => 'Please select an image to upload.',
            'image_name.image' => 'The uploaded file must be an image.',
            'image_name.mimes' => 'The uploaded file must be a JPEG, PNG, JPG, or GIF image.',
            'image_name.max' => 'The uploaded file may not be larger than 2MB.',
            'title.regex' => 'The title should not contain special characters.',
            'description' => 'The description should not contain special characters.',
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

        $tours = $request->input('tours', []);

        foreach ($tours as $tourId) {
            $tour = Tour::find($tourId);
            if ($tour) {
                $tour->discount_price = $tour->price - ($promotions -> percent * $tour->price / 100);
                $tour->save();
            }
        }
    
        $promotions->tours()->attach($tours);
        

        $promotions->tours()->attach($tours);
    
        return redirect()->route('promotion.index')->with('success', 'Activity created successfully');
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
        'image_name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'title' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
        'description' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
        'percent' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'vendor_id' => 'required|exists:vendors,id',
        'status' => 'required|boolean',
    ], [
        'image_name.required' => 'Please select an image to upload.',
        'image_name.image' => 'The uploaded file must be an image.',
        'image_name.mimes' => 'The uploaded file must be a JPEG, PNG, JPG, or GIF image.',
        'image_name.max' => 'The uploaded file may not be larger than 2MB.',
        'title.regex' => 'The title should not contain special characters.',
        'description' => 'The description should not contain special characters.',
        'vendor_id.exists' => 'Invalid vendor selected.',
        'status.boolean' => 'The status field must be either true or false.',
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
    $promotion->vendor_id = $validateData['vendor_id'];
    $promotion->status = $validateData['status'];
    $promotion->image_name = $imageName;

    $promotion->save();
    return redirect()->route('promotion.index')->with('success', 'Promotion updated successfully.');
}


    public function destroy($promotion_id){
        $promotion = Promotion::findOrFail($promotion_id);
        $promotion->delete();
    
        return redirect()
            ->route('promotion.index')
            ->with('success', 'Promotion deleted successfully');
    }
    
}
