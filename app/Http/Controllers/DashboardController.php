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
}
