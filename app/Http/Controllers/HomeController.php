<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Tour;
use App\Models\Vendor;
use App\Models\TourDate;
use Illuminate\Http\Request;
use App\Models\Promotion;


class HomeController extends Controller
{
   public function index(Request $request)
    {
        if ($request->has('search')) {
            $tours = [];
            $search = $request->input('search');
            if($search != ''){
                $tours = Tour::where('name', '=', $search)->get();
                if($tours->isEmpty()) {
                    $tours = ['result'];
                    return view('tour_list.index', compact('tours'));
                }
                return view('tour_list.index', compact('tours'));
            }
            else {
                $tours = ['result'];
                return view('tour_list.index', compact('tours'));
            }
         
        } 



        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admins');
        }
        if (Auth::check() && Auth::user()->role === 'vendor') {
            $user_id = Auth::user()->id ;
            $vendor = Vendor::where('user_id', $user_id)->first();
            $vendor_id = $vendor->id;
            return redirect()->route('vendor.show', ['id' => $vendor_id]);
        }
        $promotions = Promotion::all();
        $tours = Tour::latest()->take(3)->get();
        $latetours = Tour::take(3)->get();


        return view('home.index', compact('promotions','tours','latetours'));
    }


    public function signup()
    {
        return view('SignUp.signUp');
    }
    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        // dd($start_date);

        $end_date = $request->end_date;
       
        $tours = TourDate::whereRaw('DATE(start_date) >= ?', [$start_date])
            ->whereRaw('DATE(end_date) <= ?', [$end_date])
            ->get();

        if($tours->isEmpty()) {
            $tours = ['result'];
            return view('tour_list.index', compact('tours'));
        }
        return view('tour_list.index', compact('tours'));
    
    }
}
