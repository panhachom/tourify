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

}
