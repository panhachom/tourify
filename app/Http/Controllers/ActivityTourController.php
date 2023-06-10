<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\Activity;
use App\Models\ActivityTour;
use Illuminate\Http\Request;

class ActivityTourController extends Controller
{
    public function index(Request $request, $vendor_id, $tour_id)
    {
        $tour = Tour::where('vendor_id', $vendor_id)->where('id', $tour_id)->firstOrFail();
        $params = ['vendor' => $vendor_id, 'tour' => $tour_id];
        $activities = [];

        if ($request->has('search')) {
            $search = $request->input('search');
            if($search != ''){
                $activities = Activity::where('name', 'like', '%' . $search . '%')->get();

            }
        } 

        return view('vendor.tours.activity.index', compact('activities', 'tour', 'params','vendor_id'));
    }

        
    public function add(Tour $tour, Activity $activity)

    {
        if ($tour->activities->contains($activity)) {
            return back()->with('warning', 'Activity already exists for this tour.');
        }

        $tour->activities()->attach($activity);


        return back();
    }

}
