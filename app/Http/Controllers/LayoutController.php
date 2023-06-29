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
                'photos' => PhotoEvent::orderBy('id', 'desc')->limit(8)->get(),
                'videos' => VideoEvent::orderBy('id', 'desc')->limit(8)->get()
            ]);
        }
        
    }
}
