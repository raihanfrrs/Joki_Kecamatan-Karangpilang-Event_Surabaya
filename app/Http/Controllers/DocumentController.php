<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use App\Models\VideoEvent;
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
            return view('admin.document.photo.form-action', compact('model'))->render();
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function video_index()
    {
        return view('admin.document.video.index');
    }

    public function dataVideo()
    {
        return DataTables::of(VideoEvent::all())
        ->addColumn('action', function ($model) {
            return view('admin.document.video.form-action', compact('model'))->render();
        })
        ->rawColumns(['age', 'status', 'action'])
        ->make(true);
    }
}
