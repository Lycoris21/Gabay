<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function subjects()
    {
        return $this->hasMany(TutorSubject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
