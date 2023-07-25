<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photo_event()
    {
        return $this->hasMany(PhotoEvent::class);
    }

    public function video_event()
    {
        return $this->hasMany(VideoEvent::class);
    }

    public function request_event()
    {
        return $this->hasMany(RequestEvent::class);
    }

    public function request_musbangkel()
    {
        return $this->hasMany(RequestMusbangkel::class);
    }
}
