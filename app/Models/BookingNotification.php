<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingNotification extends Model
{
    use HasFactory;

    // Table name is bookingnotifications
    protected $table = 'booking_notifications'; 

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'user_id',
        'name',
        'action',
        'booking',
        'time',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
