<?php

namespace App\Http\Controllers;

use App\Models\RequestEvent;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengajuanController extends Controller
{
    public function event_index()
    {
        return view('admin.pengajuan.event.index');
    }

    public function dataEvent()
    {
        return DataTables::of(RequestEvent::all())
        ->addColumn('photo', function ($model) {
            return view('admin.document.photo.data-photo', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.document.photo.form-action', compact('model'))->render();
        })
        ->rawColumns(['photo', 'action'])
        ->make(true);
    }
}
