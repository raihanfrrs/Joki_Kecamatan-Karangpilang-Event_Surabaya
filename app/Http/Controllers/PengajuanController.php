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
        ->addColumn('date_start', function ($model) {
            return view('admin.pengajuan.event.data-date-start', compact('model'))->render();
        })
        ->addColumn('date_done', function ($model) {
            return view('admin.pengajuan.event.data-date-done', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('admin.pengajuan.event.data-status', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.pengajuan.event.form-action', compact('model'))->render();
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }
}
