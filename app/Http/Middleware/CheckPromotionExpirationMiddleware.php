<?php

namespace App\Http\Middleware;
use Carbon\Carbon;
use App\Models\Promotion;
use App\Models\Tour;
use Closure;
use Illuminate\Http\Request;

class CheckPromotionExpirationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentDate = Carbon::now();

        $expiredPromotions = Promotion::where('end_date', '<', $currentDate)
            ->where('status', true)
            ->get();

        foreach ($expiredPromotions as $promotion) {
            $promotion->status = false;
            $promotion->save();

            // Update tour prices to their original values
            // $promotion->tours()->update(['price' => $promotion->tours->first()->original_price]);

        }

        return $next($request);    }
}
