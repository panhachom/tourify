<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }
    

   public static function generateBookingNumber($vendorId)
    {
        $latestBooking = self::orderBy('id', 'desc')->first();

        if ($latestBooking) {
            $lastSequenceNumber = (int)substr($latestBooking->booking_number, -7);
            $newSequenceNumber = str_pad($lastSequenceNumber + 1, 7, '0', STR_PAD_LEFT);
        } else {
            $newSequenceNumber = '0000001';
        }

        return $newSequenceNumber;
    }

    

    
    public function intit_booking_tour_qty($value)
    {
        $this->attributes['approved'] = boolval($value);

        if ($this->attributes['approved'] === true) {
            $tour = $this->tours()->first();
            if ($tour) {
                $tour->qty -= $this->quantity;
                $tour->save();
            }
        }
        if ($this->attributes['approved'] === true) {
            $tour = $this->tours()->first();
            if ($tour) {
                if($tour->qty === 0){
                    $tour->inStock = false ;
                }
                $tour->save();

              
            }
        }
    }
    
}
