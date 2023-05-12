<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileSettingController extends Controller
{
    public function index()
    {
        return view('profile.profile_setting');
    }
}