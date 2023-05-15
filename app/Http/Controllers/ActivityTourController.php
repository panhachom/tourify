<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\Activity;
use App\Models\ActivityTour;
use Illuminate\Http\Request;

class ActivityTourController extends Controller
{
    public function index(Request $request, $vendorid, $tourid)
    {
        $tour = Tour::where('vendor_id', $vendorid)->where('id', $tourid)->firstOrFail();
        $params = ['vendor' => $vendorid, 'tour' => $tourid];
        $activities = [];

        if ($request->has('search')) {
            $search = $request->input('search');
            if($search != ''){
                $activities = Activity::where('name', 'like', '%' . $search . '%')->get();

            }
        } 

        return view('vendor.tours.activity.index', compact('activities', 'tour', 'params'));
    }

        
    public function add(Tour $tour, Activity $activity)

    {
        if ($tour->activities->contains($activity)) {
            return back()->with('warning', 'Activity already exists for this tour.');
        }

        $tour->activities()->attach($activity);


        return back()->with('success', 'Activity added successfully.');
    }

}
