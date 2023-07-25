<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use App\Models\VideoEvent;
use App\Models\RequestEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DocumentController extends Controller
{
    public function photo_index()
    {
        return view('admin.document.photo.index');
    }

    public function photo_create()
    {
        return view('admin.document.photo.add-photo', [
            'events' => RequestEvent::whereNotIn('status', ['tolak'])->get()
        ]);
    }

    public function photo_store(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|min:2|max:255',
                'request_event_id' => 'required',
                'location' => 'required|min:2|max:255',
                'photo' => 'image|file|max:2048',
                'description' => 'required|max:2500',
            ])->validate();
        
            if ($request->file('photo')) {
                $validatedData['photo'] = $request->file('photo')->store('photo-event');
            }
            
            $validatedData['slug'] = slug($request->name);
            $validatedData['admin_id'] = auth()->user()->admin->id;

            PhotoEvent::create($validatedData);
        
            return redirect()->intended('/photo/add')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Add Photo Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Add Photo Failed!'
            ]);
        }
    }

    public function photo_edit(PhotoEvent $photo)
    {
        return view('admin.document.photo.edit-photo')->with([
            'photo' => $photo,
            'events' => RequestEvent::whereNotIn('status', ['tolak'])->get()
        ]);
    }

    public function photo_update(Request $request, PhotoEvent $photo)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|min:2|max:255',
                'request_event_id' => 'required',
                'location' => 'required|min:2|max:255',
                'photo' => 'image|file|max:2048',
                'description' => 'required|max:2500',
            ])->validate();
        
            if ($request->file('photo')) {
                if ($photo->photo) {
                    Storage::delete($photo->photo);
                }

                $validatedData['photo'] = $request->file('photo')->store('photo-event');
            }
            
            $validatedData['slug'] = slug($request->name);
            $validatedData['admin_id'] = auth()->user()->admin->id;

            $photo->update($validatedData);
        
            return redirect()->intended('/photo')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Photo Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Photo Failed!'
            ]);
        }
    }

    public function photo_destroy(PhotoEvent $photo)
    {
        if ($photo->delete()) {
            return redirect('photo')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Delete Success!'
            ]);
        } else {
            return redirect('photo')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Delete Failed!'
            ]);
        }
    }

    public function dataPhoto()
    {
        return DataTables::of(PhotoEvent::all())
        ->addColumn('event', function ($model) {
            return view('admin.document.photo.data-event', compact('model'))->render();
        })
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
        return view('admin.document.video.add-video',[
            'events' => RequestEvent::whereNotIn('status', ['tolak'])->get()
        ]);
    }

    public function video_store(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|min:2|max:255',
                'request_event_id' => 'required',
                'location' => 'required|min:2|max:255',
                'video' => 'required|mimetypes:video/mp4,video/quicktime|max:50000',
                'description' => 'required|max:2500',
            ])->validate();
        
            if ($request->file('video')) {
                $validatedData['video'] = $request->file('video')->store('video-event');
            }
            
            $validatedData['slug'] = slug($request->name);
            $validatedData['admin_id'] = auth()->user()->admin->id;

            VideoEvent::create($validatedData);
        
            return redirect()->intended('/video/add')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Add Video Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Add Video Failed!'
            ]);
        }
    }

    public function video_edit(VideoEvent $video)
    {
        return view('admin.document.video.edit-video')->with([
            'video' => $video,
            'events' => RequestEvent::whereNotIn('status', ['tolak'])->get()
        ]);
    }

    public function video_update(Request $request, VideoEvent $video)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|min:2|max:255',
                'request_event_id' => 'required',
                'location' => 'required|min:2|max:255',
                'video' => 'mimetypes:video/mp4,video/quicktime|max:50000',
                'description' => 'required|max:2500',
            ])->validate();
        
            if ($request->file('video')) {
                if ($video->video) {
                    Storage::delete($video->video);
                }
                $validatedData['video'] = $request->file('video')->store('video-event');
            }
            
            $validatedData['slug'] = slug($request->name);
            $validatedData['admin_id'] = auth()->user()->admin->id;

            $video->update($validatedData);
        
            return redirect()->intended('/video')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Video Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Video Failed!'
            ]);
        }
    }

    public function video_destroy(VideoEvent $video)
    {
        if ($video->delete()) {
            return redirect('video')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Delete Success!'
            ]);
        } else {
            return redirect('video')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Delete Failed!'
            ]);
        }
    }

    public function dataVideo()
    {
        return DataTables::of(VideoEvent::all())
        ->addColumn('video', function ($model) {
            return view('admin.document.video.data-video', compact('model'))->render();
        })
        ->addColumn('event', function ($model) {
            return view('admin.document.video.data-event', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.document.video.form-action', compact('model'))->render();
        })
        ->rawColumns(['video', 'action'])
        ->make(true);
    }
}
