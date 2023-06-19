<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class CustomerPromotionController extends Controller
{
    public function show($promotion_id)
    {
        $promotion= Promotion::findOrFail($promotion_id);
        $currentDate = date('Y-m-d');
        if ($promotion->status = false) {
            return redirect()->route('home.index')->with('error', 'The promotion has expired.');
        }
        return view('customer_promotion.show', compact('promotion'));
    }
}
