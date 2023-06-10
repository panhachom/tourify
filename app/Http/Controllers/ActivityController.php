<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vendor_id)
    {
        $activities = Activity::all();
        return view('vendor.activity.index',compact('activities','vendor_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($vendor_id)
    {
        return view('vendor.activity.create',compact('vendor_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$vendor_id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $activity = new Activity;
        $activity->name = $validatedData['name'];
        $activity->description = $validatedData['description'];
        $activity->save();
        Session::flash('success', 'Activity created successfully!');
        return redirect()->route('vendor.activity.index', ['vendor' => $vendor_id]);
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
    public function edit($vendor_id,$activity_id)
    {
        $activity = Activity::findOrFail($activity_id);

        return view('vendor.activity.edit', compact('activity','vendor_id'));
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
        Session::flash('success', 'Activity update successfully!');

        return redirect()->route('vendor.activity.index', ['vendor' => $vendor->id]);
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
        Session::flash('success', 'Activity delete successfully!');

}


}