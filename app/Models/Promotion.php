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

    public function tours(){
        return $this->belongsToMany(Tour::class);
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


    public function updateToursIfEndDateEqualsStartDate()
    {
        if ($this->end_date === $this->start_date) {
            // End date is equal to the start date
            $this->end_date = $this->start_date;
            $this->save();

            // Set tour prices to null
            $this->tours()->syncWithoutDetaching(
                $this->tours()->pluck('id')->mapWithKeys(function ($id) {
                    return [$id => ['discount_price' => null]];
                })
            );
        }
    }

}
