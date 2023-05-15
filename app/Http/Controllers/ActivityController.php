<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        return view('vendor.activity.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $activity = new Activity;
        $activity->name = $validatedData['name'];
        $activity->description = $validatedData['description'];
        $activity->save();

        return redirect()->route('vendor.activity.index', ['vendor' => 1])->with('success', 'Activity created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($vendor_ID,$activity_ID)
    {
        $activity = Activity::findOrFail($activity_ID);
        $vendor = Vendor::findOrFail($vendor_ID);

        return view('vendor.activity.edit', compact('vendor','activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vendorId, $id)
    {
        $activity = Activity::findOrFail($id);
        $vendor = Vendor::findOrFail($vendorId);
    
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
    
        $activity->name = $validatedData['name'];
        $activity->description = $validatedData['description'];
        $activity->save();
    
        return redirect()->route('vendor.activity.index', ['vendor' => $vendor->id])->with('success', 'Activity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendor_ID,$id)
    {
        $activity = Activity::findOrFail($id);
        $vendor = Vendor::findOrFail($vendor_ID);
        $activity -> delete();

        return redirect()->route('vendor.activity.index',['vendor' => $vendor->id]);
    }
}
