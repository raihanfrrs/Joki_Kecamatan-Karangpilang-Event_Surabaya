<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'username',
        'password',
        'level',
    ];

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    public function rukun_warga()
    {
        return $this->hasMany(RukunWarga::class);
    }
}
