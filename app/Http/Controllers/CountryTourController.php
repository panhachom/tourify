<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\Country;
use App\Models\CountryTour;
use Illuminate\Http\Request;

class CountryTourController extends Controller
{
    public function index(Request $request, $vendorid, $tourid)
    {
        $tour = Tour::where('vendor_id', $vendorid)->where('id', $tourid)->firstOrFail();
        $params = ['vendor' => $vendorid, 'tour' => $tourid];
        $countries = [];

        if ($request->has('search')) {
            $search = $request->input('search');
             $countries = Country::where('country', 'like', '%' . $search . '%')->get();
            
        }

        return view('vendor.tours.country.index', compact('countries', 'tour', 'params'));
    }

    public function add(Tour $tour, Country $country)

    {
        if ($tour->countries->contains($country)) {
            return back()->with('warning', 'Country already exists for this tour.');
        }

        $tour->countries()->attach($country);
        return back()->with('success', 'Country added successfully.');
    }
    
}
