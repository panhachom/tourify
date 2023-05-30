<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vendor_id)
    {
        $categories = Category::all();
        return view('vendor.category.index',compact('categories','vendor_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($vendor_id)
    {
        return view('vendor.category.create',compact('vendor_id'));
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
        ]);

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->save();
        Session::flash('success', 'Category created successfully!');
        return redirect()->route('vendor.category.index', ['vendor' => $vendor_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($vendor_id,$category_id)
    {
        $category = Category::findOrFail($category_id);

        return view('vendor.category.edit', compact('category','vendor_id'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vendorId, $id)
    {
        $category = Category::findOrFail($id);
        $vendor = Vendor::findOrFail($vendorId);
    
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
    
        $category->name = $validatedData['name'];
        $category->save();
        Session::flash('success', 'Category update successfully!');

        return redirect()->route('vendor.category.index', ['vendor' => $vendor->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendor_ID,$id)
    {
        $category = Category::findOrFail($id);
        $vendor = Vendor::findOrFail($vendor_ID);
        $category -> delete();
        Session::flash('success', 'Category delete successfully!');

        return redirect()->route('vendor.category.index',['vendor' => $vendor->id]);
    }
}
