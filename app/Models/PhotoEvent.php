<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhotoEvent extends Model
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
                'source' => 'name'
            ]
        ];
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function request_event()
    {
        return $this->belongsTo(RequestEvent::class);
    }
}
