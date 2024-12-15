<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BookingNotification extends Model
{
    use HasFactory;

    protected $table = 'booking_notifications'; 

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'action',
        'booking',
        'time_created',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function getTimeSinceAttribute()
    {
        return Carbon::parse($this->time_created)->diffForHumans();
    }

    public function getSenderIdAttribute()
    {
        return $this->sender_id;
    }

    public function getReceiverIdAttribute()
    {
        return $this->receiver_id;
    }
}
