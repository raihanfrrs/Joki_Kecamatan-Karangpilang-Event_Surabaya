<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestEvent extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [
        'id'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'event'
            ]
        ];
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function photo_event()
    {
        return $this->hasMany(PhotoEvent::class);
    }

    public function video_event()
    {
        return $this->hasMany(VideoEvent::class);
    }

    public function rukun_warga()
    {
        return $this->belongsTo(RukunWarga::class);
    }
}
