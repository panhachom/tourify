<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourListController extends Controller
{
    public function index()
    {
         $tours = Tour::all();
        return view('tour_list.index',compact('tours'));
    }
    public function show( $tourId)
    {
       
        $tour = Tour::findOrFail($tourId);
        return view('tour_list.show', compact( 'tour'));
    }
    public function contentUpdate(Request $request){
         $tours = Tour::all();
        // $content = $request->input('content');
        // return view('tour_list.show', ['content' => $content]);
    
        return response()->json($tours);
    }
    public function sport_category(){
        $category = Category::where('name','sport')->first();
        $tours = $category->tours()->with('tour_images')->get();
        return view('tour_list.sport_category',compact('tours'));
    }
    public function cultural_category(){
        $category = Category::where('name','cultural')->first();
        $tours = $category->tours()->with('tour_images')->get();
        return view('tour_list.cultural_category',compact('tours'));
    }
    public function adventure_category(){
        $category = Category::where('name','adventure')->first();
        $tours = $category->tours()->with('tour_images')->get();
        return view('tour_list.adventure_category',compact('tours'));
    }
    public function foodanddrink_category(){
        $category = Category::where('name','Food and Drink')->first();
        $tours = $category->tours()->with('tour_images')->get();
        return view('tour_list.foodanddrink',compact('tours'));
    }
    public function history_category(){
        $category = Category::where('name','history')->first();
        $tours = $category->tours()->with('tour_images')->get();
        return view('tour_list.history_category',compact('tours'));
    }
}

