<?php

namespace App\Http\Controllers;

use App\Models\RequestEvent;
use Illuminate\Http\Request;
use App\Models\RequestMusbangkel;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PengajuanController extends Controller
{
    public function event_index()
    {
        return view('admin.pengajuan.event.index');
    }

    public function event_edit(RequestEvent $event)
    {
        return view('admin.pengajuan.event.edit-event')->with([
            'event' => $event
        ]);
    }

    public function event_update(Request $request, RequestEvent $event)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'event' => 'required|min:2|max:255|unique:request_events,event,' . $event->id,
                'phone' => 'required|numeric',
                'date_start' => 'required|date',
                'date_done' => 'required|date',
                'location' => 'required',
                'proposal' => 'mimes:pdf|max:2048',
                'surat_permohonan' => 'mimes:pdf|max:2048',
                'photo' => 'image|file|max:2048',
                'video' => 'mimetypes:video/mp4,video/quicktime|max:100000'
            ])->validate();
        
            if ($request->file('proposal')) {
                if ($event->proposal) {
                    Storage::delete($event->surat_proposal);
                }

                $validatedData['proposal'] = $request->file('proposal')->store('proposal');
            }

            if ($request->file('surat_permohonan')) {
                if ($event->surat_permohonan) {
                    Storage::delete($event->surat_permohonan);
                }

                $validatedData['surat_permohonan'] = $request->file('surat_permohonan')->store('surat-permohonan');
            }

            if ($request->file('photo')) {
                if ($event->photo) {
                    Storage::delete($event->photo);
                }

                $validatedData['photo'] = $request->file('photo')->store('photo-event');
            }

            if ($request->file('video')) {
                $validatedData['video'] = $request->file('video')->store('video-event');
            }

            $validatedData['slug'] = slug($request->event);
            $validatedData['admin_id'] = auth()->user()->admin->id;
        
            $event->update($validatedData);
        
            return redirect()->intended('/event')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Event Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Event Failed!'
            ]);
        }
    }

    public function event_update_status(Request $request, RequestEvent $event)
    {
        return $event->update(['status' => $request->status, 'admin_id' => auth()->user()->admin->id]);
    }

    public function event_update_feedback(Request $request, RequestEvent $event)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'feedback' => 'required'
            ])->validate();

            $validatedData['admin_id'] = auth()->user()->admin->id;
        
            $event->update($validatedData);
        
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Feedback Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Feedback Failed!'
            ]);
        }
    }

    public function event_update_proposal(Request $request, RequestEvent $event)
    {
        if ($event->update(['status_proposal' => $request->status])) {
            return redirect()->back()->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect()->back()->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function event_update_permohonan(Request $request, RequestEvent $event)
    {
        if ($event->update(['status_permohonan' => $request->status])) {
            return redirect()->back()->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect()->back()->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function event_show(RequestEvent $event)
    {
        return view('admin.pengajuan.event.show-event')->with([
            'event' => $event
        ]);
    }

    public function event_destroy(RequestEvent $event)
    {
        if ($event->delete()) {
            return redirect('event')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Delete Success!'
            ]);
        } else {
            return redirect('event')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Delete Failed!'
            ]);
        }
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
        ->addColumn('created_at', function ($model) {
            return view('admin.pengajuan.event.data-created-at', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.pengajuan.event.form-action', compact('model'))->render();
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function musbangkel_index()
    {
        return view('admin.pengajuan.musbangkel.index');
    }

    public function musbangkel_edit(RequestMusbangkel $musbangkel)
    {
        return view('admin.pengajuan.musbangkel.edit-musbangkel')->with([
            'musbangkel' => $musbangkel
        ]);
    }

    public function musbangkel_update(Request $request, RequestMusbangkel $musbangkel)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|min:2|max:255|unique:request_musbangkels,name,' . $musbangkel->id,
                'request_type' => 'required',
                'size' => 'min:2|max:255',
                'amount' => 'min:2|max:255',
                'location' => 'required',
                'photo' => 'image|file|max:2048',
                'video' => 'mimetypes:video/mp4,video/quicktime|max:100000'
            ])->validate();

            if ($request->file('photo')) {
                if ($musbangkel->photo) {
                    Storage::delete($musbangkel->photo);
                }

                $validatedData['photo'] = $request->file('photo')->store('photo-event');
            }

            if ($request->file('video')) {
                if ($musbangkel->video) {
                    Storage::delete($musbangkel->video);
                }

                $validatedData['video'] = $request->file('video')->store('video-event');
            }

            $validatedData['slug'] = slug($request->name);
            $validatedData['admin_id'] = auth()->user()->admin->id;
        
            $musbangkel->update($validatedData);
        
            return redirect()->intended('/musbangkel')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Musbangkel Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Musbangkel Failed!'
            ]);
        }
    }

    public function musbangkel_update_status(Request $request, RequestMusbangkel $musbangkel)
    {
        return $musbangkel->update(['status' => $request->status, 'admin_id' => auth()->user()->admin->id]);
    }

    public function musbangkel_show(RequestMusbangkel $musbangkel)
    {
        return view('admin.pengajuan.musbangkel.show-musbangkel')->with([
            'request' => $musbangkel
        ]);
    }

    public function musbangkel_destroy(RequestMusbangkel $musbangkel)
    {
        if ($musbangkel->delete()) {
            return redirect('musbangkel')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Delete Success!'
            ]);
        } else {
            return redirect('musbangkel')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Delete Failed!'
            ]);
        }
    }

    public function musbangkel_update_feedback(Request $request, RequestMusbangkel $musbangkel)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'feedback' => 'required'
            ])->validate();

            $validatedData['admin_id'] = auth()->user()->admin->id;
        
            $musbangkel->update($validatedData);
        
            return redirect()->back()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Feedback Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Feedback Failed!'
            ]);
        }
    }

    public function dataMusbangkel()
    {
        return DataTables::of(RequestMusbangkel::all())
        ->addColumn('rukun_warga', function ($model) {
            return view('admin.pengajuan.musbangkel.data-rukun-warga', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('admin.pengajuan.musbangkel.data-status', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('admin.pengajuan.musbangkel.data-created-at', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.pengajuan.musbangkel.form-action', compact('model'))->render();
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }
}
