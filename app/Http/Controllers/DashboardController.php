<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use App\Models\RequestEvent;
use App\Models\RequestMusbangkel;
use App\Models\RukunWarga;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countRukunWarga()
    {
        return RukunWarga::count();
    }

    public function countPhoto()
    {
        return PhotoEvent::count();
    }

    public function countEvent()
    {
        return RequestEvent::count();
    }

    public function countMusbangkel()
    {
        return RequestMusbangkel::count();
    }

    public function countRequest()
    {
        return RequestMusbangkel::where('rukun_warga_id', auth()->user()->rukun_warga->id)->count();
    }

    public function countAccepted()
    {
        return RequestMusbangkel::where('rukun_warga_id', auth()->user()->rukun_warga->id)
                                ->where('status', 'terima')
                                ->count();
    }

    public function countRejected()
    {
    return RequestMusbangkel::where('rukun_warga_id', auth()->user()->rukun_warga->id)
                                ->where('status', 'tolak')
                                ->count();
    }
}
