<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detailpageController extends Controller
{
    public function index(){
        return view('detailpage.detailpage');
    }
}
