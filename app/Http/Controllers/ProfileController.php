<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\RukunWarga;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update_identity(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:2|max:255',
            'phone' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255|email:rfc,dns',
        ]);

        if (auth()->user()->level == 'admin') {
            $validateData['slug'] = slug($request->name);
            $profile = Admin::whereId(auth()->user()->admin->id)->update($validateData);
        }elseif (auth()->user()->level == 'rukun warga') {
            $validateData['slug'] = slug($request->name);
            $profile = RukunWarga::whereId(auth()->user()->rukun_warga->id)->update($validateData);
        }

        if ($profile) {
            return redirect('profile')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('profile')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function update_setting(Request $request)
    {
        if ($request->username != auth()->user()->username) {
            $users = $request->validate([
                'username' => 'required|min:5|max:255'
            ]);

            User::whereId(auth()->user()->id)->update($users);
        }

        if ($request->password) {
            $users = $request->validate([
                'password' => [Password::min(5)]
            ]);
            
            $users['password'] = bcrypt($request->password);

            User::whereId(auth()->user()->id)->update($users);
        }

        return redirect('profile')->with([
            'case' => 'default',
            'position' => 'center',
            'type' => 'success',
            'message' => 'Update Success!'
        ]);
    }
}
