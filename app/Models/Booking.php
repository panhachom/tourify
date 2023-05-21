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
        $vendor = Vendor::find($vendorId); // Assuming you have a Vendor model

        // $prefix = Str::upper(Str::limit($vendor->name, 3, '')); // Assuming the vendor name is stored in the 'name' column

        do {
            $sequenceNumber = rand(1, 99999999);
            $sequenceNumber = str_pad($sequenceNumber, 8, '0', STR_PAD_LEFT);
            $bookingNumber = $sequenceNumber; // $prefix . $sequenceNumber; Add the prefix if desired

            $existingBooking = self::where('booking_number', $bookingNumber)->first();
        } while ($existingBooking);

        return $bookingNumber;
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
