<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'tutee_id', 
        'tutor_id', 
        'subject_name', 
        'subject_topic', 
        'date', 
        'status', 
        'start_time', 
        'end_time'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function tutee()
    {
        return $this->belongsTo(User::class, 'tutee_id');
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }
}
