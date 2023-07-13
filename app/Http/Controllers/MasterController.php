<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\RukunWarga;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MasterController extends Controller
{
    public function rw_index()
    {
        return view('admin.data-master.rukun-warga.index');
    }

    public function rw_create()
    {
        return view('admin.data-master.rukun-warga.add-rw');
    }
    
    public function rw_store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|min:2|max:255|unique:users',
            'password' => 'required',
            'name' => 'required|min:2|max:255',
            'phone' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255|email:rfc,dns',
        ]);

        $validateData['level'] = 'rukun warga';
        $validateData['password'] = bcrypt($request->password);
        $user = User::create($validateData);

        $validateData['user_id'] = $user->id;
        $validateData['slug'] = slug($request->name);
        $rukunwargas = RukunWarga::create($validateData);

        if ($rukunwargas) {
            return redirect('rw/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Success!'
            ]);
        } else {
            return redirect('rw/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Adding Failed!'
            ]);
        }
    }

    public function rw_edit(RukunWarga $rw) 
    {
        return view('admin.data-master.rukun-warga.edit-rw')->with([
            'rw' => $rw
        ]);
    }

    public function rw_update(Request $request, RukunWarga $rw)
    {
        $validateData = $request->validate([
            'name' => 'required|min:2|max:255',
            'phone' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255|email:rfc,dns',
        ]);

        $validateData['slug'] = slug($request->name);
        $rukunwargas = RukunWarga::whereId($rw->id)->update($validateData);

        if ($rukunwargas) {
            return redirect('rw')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('rw')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function rw_destroy(RukunWarga $rw)
    {
        if ($rw->delete()) {
            return redirect('rw')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Delete Success!'
            ]);
        } else {
            return redirect('rw')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Delete Failed!'
            ]);
        }
    }

    public function dataRukunWarga()
    {
        return DataTables::of(RukunWarga::all())
        ->addColumn('action', function ($model) {
            return view('admin.data-master.rukun-warga.form-action', compact('model'))->render();
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function admin_index()
    {
        return view('admin.data-master.admin.index');
    }

    public function dataAdmin()
    {
        return DataTables::of(Admin::all())
        ->addColumn('action', function ($model) {
            return view('admin.data-master.rukun-warga.form-action', compact('model'))->render();
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
