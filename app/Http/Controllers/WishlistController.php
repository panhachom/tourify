<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Maize\Markable\Markable;
use Maize\Markable\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $tours = Tour::whereHasFavorite(
            auth()->user()
        )->get(); 
        // dd($tours);
        return view('wishlist.index',compact('tours'));
    }

    public function favoriteAdd($id)
    {

        if (!Auth::check()) {
            return redirect()->route('login.show');
        }
        $tour = Tour::find($id);
        $user = auth()->user();
        Favorite::add($tour, $user);
        session()->flash('success', 'Tour is Added to Favorite Successfully !');
        return redirect()->route('wishlist');
    }

    public function favoriteRemove($id)
    {
        $tour = Tour::find($id);
        $user = auth()->user();
        Favorite::remove($tour, $user);
        session()->flash('success', 'Tour is Remove to Favorite Successfully !');

        return redirect()->route('wishlist');
    }
}


