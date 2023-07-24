<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use App\Models\VideoEvent;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return view('welcome-auth');
        } else {
            return view('welcome-guest')->with([
                'photos' => PhotoEvent::all(),
                'videos' => VideoEvent::all()
            ]);
        }
        
    }
}
