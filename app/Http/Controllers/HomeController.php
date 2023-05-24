<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Promotion;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admins');
        }
        $promotions = Promotion::all();

        return view('home.index', compact('promotions'));
    }

    public function signup()
    {
        return view('SignUp.signUp');
    }
}
