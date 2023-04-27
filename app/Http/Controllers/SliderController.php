<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = slider::all();

        return view('admin/slider.view_slider', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slider.create_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider;
        $slider ->title = $request->title;
        $slider ->description = $request->description;
        $slider ->start_date = $request->start_date;
        $slider ->end_date = $request->end_date;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('slider', $imagename);
        $slider->image = $imagename;

        $slider -> status = $request->status == true ? '1' : '0';
        $slider ->save();

        return redirect('/view_slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $slider, $id)
    {
        $slider = Slider::find($id);
        return view('admin/slider.update_slider', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->title =$request->title;
        $slider->description=$request->description;


        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('slider', $imagename);
            $slider->image = $imagename;
           
        }

        $slider['start_date'] =$request->start_date;
        $slider['end_date'] =$request->end_date;
        $slider['status'] = $request->status == true ? '1' : '0';
        $slider->save();
        return redirect('/view_slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect('/admin/view_slider');
    }
}
