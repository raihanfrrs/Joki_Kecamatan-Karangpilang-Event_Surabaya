<?php

namespace App\Http\Controllers;

use App\Models\RukunWarga;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MasterController extends Controller
{
    public function rw_index()
    {
        return view('admin.data-master.rukun-warga.index');
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
}
