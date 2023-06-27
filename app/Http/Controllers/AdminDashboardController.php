<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\User;
use App\Models\Activity;
use App\Models\Vendor;
use App\Models\Booking;
use App\Models\Promotion;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::all();
        $vendor = Vendor::all();
        $activities = Activity::all();
        $bookings = Booking::all();
        $estimate_earn = Vendor::all()->count();
        $pendding_booking= Promotion::where('status', '1')->count();
        $this_month = Carbon::now()->format('m');
        $data['total_post'] = Tour::count();
        $total_user = User::where('role', 'customer')->count();
        $data['total_admin'] = User::where('role', 'admin')->count();
        $data['total_vendor'] = User::where('role', 'vendor')->count();
        $data['total_customer'] = User::where('role', 'customer')->count();
        $data['post_by_months'] = Tour::whereMonth('updated_at', $this_month)->count();
        
        $recentPost = Tour::orderBy('created_at', 'desc')->take(5)->get();
        $last_vendor = Vendor::orderBy('created_at', 'desc')->take(5)->get();
        $recentBookings = Booking::orderBy('created_at', 'desc')->take(5)->get();
        $last_customer = User::orderBy('created_at', 'desc')->where('role', 'customer')->take(5)->get();

        

        return view('admin/dashbaord.index', compact('tours', 'vendor', 'activities', 'bookings', 'estimate_earn' ,'total_user', 'pendding_booking' ,'recentPost'
                    ,'last_vendor', 'recentBookings', 'last_customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/dashbaord.test');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
