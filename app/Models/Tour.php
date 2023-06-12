<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maize\Markable\Markable;
use Maize\Markable\Models\Favorite;
class Tour extends Model
{
    use HasFactory, Markable;

    protected $fillable =[
        'name',
        'description',
        'price',
        'capacity',
        'qty',
        'inStock'
    ];


    protected static $marks = [
        Favorite::class,
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function tour_images()
    {
        return $this->hasMany(TourImage::class);
    }

    public function tour_dates()
    {
        return $this->hasMany(TourDate::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'country_tour', 'tour_id', 'country_id');
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    public function updateStatusIfQuantityPositive()
    {
        if ($this->qty > 0 ) {
            $this->inStock = true;
            $this->save();
        }
    }


}
