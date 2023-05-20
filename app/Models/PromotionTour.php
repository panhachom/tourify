<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionTour extends Model
{
    use HasFactory;
    
    protected $table = 'promotion_tour'; // The name of your pivot table

}
