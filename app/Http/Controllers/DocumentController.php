<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use App\Models\VideoEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function photo_edit(PhotoEvent $photo)
    {
        return view('admin.document.photo.edit-photo')->with([
            'photo' => $photo
        ]);
    }

    public function photo_update(Request $request, PhotoEvent $photo)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'location' => 'required|min:2|max:255',
            'photo' => 'image|file|max:2048',
            'description' => 'required|max:2500',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('photo')) {
            if ($photo->photo) {
                Storage::delete($photo->photo);
            }
            $validateData['photo'] = $request->file('photo')->store('photo-event');
        }

        $validateData['slug'] = slug($request->name);
        $validateData['admin_id'] = auth()->user()->admin[0]->id;

        $photos = PhotoEvent::whereId($photo->id)->update($validateData);

        if ($photos) {
            return redirect('photo')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('photo')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function dataPhoto()
    {
        return DataTables::of(PhotoEvent::all())
        ->addColumn('photo', function ($model) {
            return view('admin.document.photo.data-photo', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.document.photo.form-action', compact('model'))->render();
        })
        ->rawColumns(['photo', 'action'])
        ->make(true);
    }

    public function video_index()
    {
        return view('admin.document.video.index');
    }

    public function video_create()
    {
        return view('admin.document.video.add-video');
    }

    public function video_store(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'location' => 'required|min:2|max:255',
            'video' => 'required|mimetypes:video/mp4,video/quicktime|max:50000',
            'description' => 'required|max:2500',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('video')) {
            $validateData['video'] = $request->file('video')->store('video-event');
        }

        $validateData['slug'] = slug($request->name);
        $validateData['admin_id'] = auth()->user()->admin[0]->id;

        $videos = VideoEvent::create($validateData);

        if ($videos) {
            return redirect('video/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Adding Success!'
            ]);
        } else {
            return redirect('video/add')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Adding Failed!'
            ]);
        }
    }

    public function video_edit(VideoEvent $video)
    {
        return view('admin.document.video.edit-video')->with([
            'video' => $video
        ]);
    }

    public function video_update(Request $request, VideoEvent $video)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'location' => 'required|min:2|max:255',
            'video' => 'mimetypes:video/mp4,video/quicktime|max:50000',
            'description' => 'required|max:2500',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('video')) {
            if ($video->video) {
                Storage::delete($video->video);
            }
            $validateData['video'] = $request->file('video')->store('video-event');
        }

        $validateData['slug'] = slug($request->name);
        $validateData['admin_id'] = auth()->user()->admin[0]->id;

        $videos = $video->update($validateData);

        if ($videos) {
            return redirect('video')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('video')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function dataVideo()
    {
        return DataTables::of(VideoEvent::all())
        ->addColumn('video', function ($model) {
            return view('admin.document.video.data-video', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.document.video.form-action', compact('model'))->render();
        })
        ->rawColumns(['video', 'action'])
        ->make(true);
    }
}
