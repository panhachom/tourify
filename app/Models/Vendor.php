<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
