<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorSubject extends Model
{
    protected $fillable = [
        'tutor_id', 
        'subject', 
        'hourly_rate',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
}
