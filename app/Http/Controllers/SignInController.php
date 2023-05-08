<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function index()
    {
        return view('Sign_in.email');
    }
     public function phoneNumber()
    {
        return view('Sign_in.phoneNumber');
    }
     public function input()
    {
        return view('Sign_in.input');
    }
    public function verification()
    {
        return view('Sign_in.verification');
    }
}
