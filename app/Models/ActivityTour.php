<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTour extends Model
{
    use HasFactory;

    protected $table = 'activity_tour'; // The name of your pivot table

    protected $fillable = [
        'activity_id',
        'tour_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class,'activity_tour');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'activity_tour');
    }
}
