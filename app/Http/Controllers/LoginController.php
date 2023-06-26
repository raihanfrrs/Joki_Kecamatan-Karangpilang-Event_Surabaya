<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {   
        return view('login.view_login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255|alpha_num',
            'password' => 'required'
        ]);

        $credential = $request->only('username', 'password');

        $checkUser = User::where('username', $request->username)->get();

        if (count($checkUser) > 0 && $checkUser[0]->status === 'non-active') {
            return back()->withErrors([
                'username' => 'Your account is being deactivated by the admin, please contact the admin!',
            ])->onlyInput('username');
        }

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            $user = Auth::user();

            if($user){
                return redirect()->intended('dashboard')->with([
                    'flash-type' => 'sweetalert',
                    'case' => 'default',
                    'position' => 'center',
                    'type' => 'success',
                    'message' => 'Sign-in Success!'
                ]);
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Username or Password is Wrong!',
            'password' => 'Username or Password is Wrong!',
        ])->onlyInput('username', 'password');
    }
}
