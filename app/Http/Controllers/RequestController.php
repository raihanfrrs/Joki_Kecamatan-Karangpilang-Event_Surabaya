<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestMusbangkel;
use Yajra\DataTables\Facades\DataTables;

class RequestController extends Controller
{
    //Masuk ke halaman utamaa dari rukun warga request index
    public function index()
    {
        return view('rukun-warga.request.index');
    }

    public function create()
    {
        return view('rukun-warga.request.add-request');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'request_type' => 'required',
            'size' => 'min:2|max:255',
            'amount' => 'min:2|max:255',
            'location' => 'required'
        ]);

        $validateData['status'] = 'proses';
        $validateData['rukun_warga_id'] = auth()->user()->rukun_warga[0]->id; // menyimpan id autghentikasi

        $request = RequestMusbangkel::create($validateData);

        if ($request) {
            return redirect('request/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Request Success!'
            ]);
        } else {
            return redirect('request/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Request Failed!'
            ]);
        }
    }

    public function edit(RequestMusbangkel $request)
    {
        return view('rukun-warga.request.edit-request')->with([
            'request' => $request
        ]);
    }

    public function update(Request $request, RequestMusbangkel $musbangkel)
    {
        $validateData = $request->validate([
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

    public function show(RequestMusbangkel $request)
    {
        return view('rukun-warga.request.show-request')->with([
            'request' => $request
        ]);
    }

    public function destroy(RequestMusbangkel $request)
    {
        if ($request->delete()) {
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

    public function dataRequest()
    {
        return DataTables::of(RequestMusbangkel::where('rukun_warga_id', auth()->user()->rukun_warga[0]->id)->get())
        ->addColumn('admin', function ($model) {
            return view('rukun-warga.request.data-admin', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('rukun-warga.request.data-status', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('rukun-warga.request.form-action', compact('model'))->render();
        })
        ->rawColumns(['admin', 'status', 'action'])
        ->make(true);
    }
}
