<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function signup()
    {
        return view('SignUp.signUp');
    }
    public function bookingInfo()
    {
        return view('Booking_info.bookingInfo');
    }
}
