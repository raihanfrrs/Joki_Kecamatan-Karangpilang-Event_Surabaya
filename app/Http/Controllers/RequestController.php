<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestMusbangkel;
use Yajra\DataTables\Facades\DataTables;

class RequestController extends Controller
{
    //Masuk ke halaman utamaa dari rukun warga request index
    public function index_musbangkel()
    {
        return view('rukun-warga.request.musbangkel.index');
    }

    public function create_musbangkel()
    {
        return view('rukun-warga.request.musbangkel.add-musbangkel');
    }

    public function store_musbangkel(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'request_type' => 'required',
            'size' => 'min:2|max:255',
            'amount' => 'min:2|max:255',
            'location' => 'required'
        ]);

        $validateData['status'] = 'proses';
        $validateData['rukun_warga_id'] = auth()->user()->rukun_warga[0]->id;

        $request = RequestMusbangkel::create($validateData);

        if ($request) {
            return redirect('request/musbangkel/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Request Success!'
            ]);
        } else {
            return redirect('request/musbangkel/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Request Failed!'
            ]);
        }
    }

    public function edit_musbangkel(RequestMusbangkel $musbangkel)
    {
        return view('rukun-warga.request.musbangkel.edit-musbangkel')->with([
            'request' => $musbangkel
        ]);
    }

    public function update_musbangkel(Request $request, RequestMusbangkel $musbangkel)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'request_type' => 'required',
            'size' => 'min:2|max:255',
            'amount' => 'min:2|max:255',
            'location' => 'required'
        ]);

        if ($musbangkel->update($validateData)) {
            return redirect('request')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('request')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function show_musbangkel(RequestMusbangkel $musbangkel)
    {
        return view('rukun-warga.request.musbangkel.show-musbangkel')->with([
            'request' => $musbangkel
        ]);
    }

    public function destroy_musbangkel(RequestMusbangkel $musbangkel)
    {
        if ($musbangkel->delete()) {
            return redirect('request')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Delete Success!'
            ]);
        } else {
            return redirect('request')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Delete Failed!'
            ]);
        }
    }

    public function dataRequestMusbangkel()
    {
        return DataTables::of(RequestMusbangkel::where('rukun_warga_id', auth()->user()->rukun_warga[0]->id)->get())
        ->addColumn('admin', function ($model) {
            return view('rukun-warga.request.musbangkel.data-admin', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('rukun-warga.request.musbangkel.data-status', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('rukun-warga.request.musbangkel.form-action', compact('model'))->render();
        })
        ->rawColumns(['admin', 'status', 'action'])
        ->make(true);
    }
}