<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\Category;

use Illuminate\Http\Request;

class TourListController extends Controller
{
    public function index()
    {
        $tours = Tour::with('tour_images')->get();
        return view('tour_list.index', compact('tours'));
    }

    public function sport_category()
    {
        $category = Category::where('name', 'Sport')->first();
        $tours = $category->tours()->with('tour_images')->get();
        return view('tour_list.sport_category', compact('tours'));
     }

    public function adventure_category()
    {
        $category = Category::where('name', 'Adventure')->first();
        $tours = $category->tours()->with('tour_images')->get();
        return view('tour_list.adventure_category', compact('tours'));
     }

    public function cultural_category()
    {
        $category = Category::where('name', 'Cultural')->first();
        $tours = $category->tours()->with('tour_images')->get();
        return view('tour_list.cultural_category', compact('tours'));
     }

    public function food_and_drink_category()
    {
        $category = Category::where('name', 'Food and Drink')->first();
        $tours = $category->tours()->with('tour_images')->get();
        return view('tour_list.food_and_drink_category', compact('tours'));
     }

     public function history_category()
     {
         $category = Category::where('name', 'history')->first();
         $tours = $category->tours()->with('tour_images')->get();
         return view('tour_list.history_category', compact('tours'));
      }

    public function show($tourId)
    {
        $tour = Tour::findOrFail($tourId);
        $tour->increment('view');
        $latetours = Tour::take(3)->get();

        // dd($tour);
        return view('tour_list.show', compact('tour','latetours'));
    }
    public function getByCategory($category)
    {
        $tours = Category::where('name', $category)
            ->firstOrFail()
            ->tours()
            ->get();

        return response()->    json($tours);
    }
   
}
    

