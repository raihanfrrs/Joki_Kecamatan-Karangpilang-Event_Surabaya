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

    public function photo_create()
    {
        return view('admin.document.photo.add-photo');
    }

    public function photo_store(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'location' => 'required|min:2|max:255',
            'photo' => 'image|file|max:2048',
            'description' => 'required|max:2500',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('photo-event');
        }

        $validateData['slug'] = slug($request->name);
        $validateData['admin_id'] = auth()->user()->admin[0]->id;

        $photos = PhotoEvent::create($validateData);

        if ($photos) {
            return redirect('photo/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Success!'
            ]);
        } else {
            return redirect('photo/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Adding Failed!'
            ]);
        }
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
        ->rawColumns(['action'])
        ->make(true);
    }
}
