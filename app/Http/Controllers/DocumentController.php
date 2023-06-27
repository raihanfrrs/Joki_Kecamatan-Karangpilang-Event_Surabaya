<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    public function photo_index()
    {
        return view('admin.document.photo.index');
    }

    public function dataPhoto()
    {
        return DataTables::of(PhotoEvent::all())
        ->addColumn('action', function ($model) {
            return view('user.player.form-action', compact('model'))->render();
        })
        ->rawColumns(['age', 'status', 'action'])
        ->make(true);
    }

    public function video_index()
    {

    }
}
