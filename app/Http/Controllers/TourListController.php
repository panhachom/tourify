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

    public function show($tourId)
    {
        $tour = Tour::findOrFail($tourId);
        return view('tour_list.show', compact('tour'));
    }

    public function getByCategory($category)
    {
        $tours = Category::where('name', $category)
            ->firstOrFail()
            ->tours()
            ->get();
    
        return response()->json($tours);   
    }
}