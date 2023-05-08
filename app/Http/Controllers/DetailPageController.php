<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPageController extends Controller
{
    public function index(){
        return view('detail_page.index');
    }
}
