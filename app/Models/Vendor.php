<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about_us',
        'email',
        'contact',
        'logo',
        'user_id',
    ];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
