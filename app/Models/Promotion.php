<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 

class Promotion extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'promotion_tour')
            ->withPivot('price')
            ->withTimestamps();
    }
    
    protected $table = 'promotions';
    protected $fillable =[
        'title',
        'image',
        'description',
        'percent',
        'start_date',
        'end_date',
        'status'
    ];

    public function notifications()
    {
        return $this->morphMany('App\Models\Notification', 'notifiable');
    }



    public static function updateExpiredPromotionsStatus()
        {
            $expiredPromotions = self::where('end_date', '<=', now()->format('Y-m-d H:i:s'))->where('status', true)->get();

            foreach ($expiredPromotions as $promotion) {
                $promotion->status = false;
                $promotion->save();
            }
        }

        public function  remove_promotion_tour(){
            $promotionTours = $this->tours()->get();
            foreach ($promotionTours as $promotionTour) {
                $tour = Tour::find($promotionTour->pivot->tour_id);
                if ($tour) {
                    $tour->discount_price = null;
                    $tour->is_discount = false;
                    $tour->save();
                }
            }

        }

        public function toggleActivate()
        {
            if ($this->status) {
                $this->status = false;

                $promotionTours = $this->tours()->get();
                foreach ($promotionTours as $promotionTour) {
                    $tour = Tour::find($promotionTour->pivot->tour_id);
                    if ($tour) {
                        $tour->discount_price = null;
                        $tour->is_discount = false;
                        $tour->save();
                    }
                }

            } else {
                // Deactivate all other promotions
                Promotion::where('vendor_id', $this->vendor_id)->where('id', '<>', $this->id)->update(['status' => false]);
                $promotionTours = $this->tours()->get();
        
                foreach ($promotionTours as $promotionTour) {
                    $tour = Tour::find($promotionTour->pivot->tour_id);
                    if ($tour) {
                        $tour->discount_price = $tour->price - ($this->percent * $tour->price / 100);
                        $tour->is_discount = true;
                        $tour->save();
                    }
                }
        
                $this->status = true;
            }
        
            $this->save();
        }
        

}

