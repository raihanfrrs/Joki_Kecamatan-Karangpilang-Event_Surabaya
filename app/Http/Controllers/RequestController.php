<?php

namespace App\Http\Controllers;

use App\Models\RequestEvent;
use Illuminate\Http\Request;
use App\Models\RequestMusbangkel;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RequestController extends Controller
{
    public function index_event()
    {
        return view('rukun-warga.request.event.index');
    }

    public function create_event()
    {
        return view('rukun-warga.request.event.add-event');
    }

    public function store_event(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'event' => 'required|min:2|max:255|unique:request_events',
                'phone' => 'required|numeric',
                'date_start' => 'required|date',
                'date_done' => 'required|date',
                'location' => 'required',
                'proposal' => 'required|mimes:pdf|max:2048',
                'surat_permohonan' => 'required|mimes:pdf|max:2048',
                'photo' => 'image|file|max:2048',
                'video' => 'mimetypes:video/mp4,video/quicktime|max:100000'
            ])->validate();
        
            if ($request->file('proposal')) {
                $validatedData['proposal'] = $request->file('proposal')->store('proposal');
            }

            if ($request->file('surat_permohonan')) {
                $validatedData['surat_permohonan'] = $request->file('surat_permohonan')->store('surat-permohonan');
            }

            if ($request->file('photo')) {
                $validatedData['photo'] = $request->file('photo')->store('photo-event');
            }

            if ($request->file('video')) {
                $validatedData['video'] = $request->file('video')->store('video-event');
            }

            $validatedData['slug'] = slug($request->event);
            $validatedData['rukun_warga_id'] = auth()->user()->rukun_warga->id;
        
            RequestEvent::create($validatedData);
        
            return redirect()->intended('/request/event/add')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Add Event Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Add Event Failed!'
            ]);
        }
    }

    public function edit_event(RequestEvent $event)
    {
        return view('rukun-warga.request.event.edit-event', [
            'event' => $event
        ]);
    }

    public function update_event(Request $request, RequestEvent $event)
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
            $validatedData['rukun_warga_id'] = auth()->user()->rukun_warga->id;
        
            $event->update($validatedData);
        
            return redirect()->intended('/request/event')->with([
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

    public function destroy_event(RequestEvent $event) 
    {
        try {
            $event->delete();
        
            return redirect()->intended('/request/event')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Delete Event Success!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Delete Event Failed!'
            ]);
        }
    }

    public function show_event(RequestEvent $event)
    {
        return view('rukun-warga.request.event.show-event', [
            'event' => $event
        ]);
    }

    public function dataRequestEvent()
    {
        return DataTables::of(RequestEvent::where('rukun_warga_id', auth()->user()->rukun_warga->id)->get())
        ->addColumn('date_start', function ($model) {
            return view('rukun-warga.request.event.data-date-start', compact('model'))->render();
        })
        ->addColumn('date_done', function ($model) {
            return view('rukun-warga.request.event.data-date-done', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('rukun-warga.request.event.data-status', compact('model'))->render();
        })
        ->addColumn('created_at', function ($model) {
            return view('rukun-warga.request.event.data-created-at', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('rukun-warga.request.event.form-action', compact('model'))->render();
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function index_musbangkel()
    {
        return view('rukun-warga.request.musbangkel.index');
    }

    public function create_musbangkel()
    {
        return view('rukun-warga.request.musbangkel.add-musbangkel');
    }

    public function store_musbangkel(Request $request)
    {

        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|min:2|max:255|unique:request_musbangkels',
                'request_type' => 'required',
                'size' => 'min:2|max:255',
                'amount' => 'min:2|max:255',
                'location' => 'required',
                'photo' => 'image|file|max:2048',
                'video' => 'mimetypes:video/mp4,video/quicktime|max:100000'
            ])->validate();

            if ($request->file('photo')) {
                $validatedData['photo'] = $request->file('photo')->store('photo-event');
            }

            if ($request->file('video')) {
                $validatedData['video'] = $request->file('video')->store('video-event');
            }

            $validatedData['slug'] = slug($request->name);
            $validatedData['rukun_warga_id'] = auth()->user()->rukun_warga->id;
        
            RequestMusbangkel::create($validatedData);
        
            return redirect()->intended('/request/musbangkel/add')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Add Musbangkel Success!'
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Add Musbangkel Failed!'
            ]);
        }
    }

    public function edit_musbangkel(RequestMusbangkel $musbangkel)
    {
        return view('rukun-warga.request.musbangkel.edit-musbangkel')->with([
            'musbangkel' => $musbangkel
        ]);
    }

    public function update_musbangkel(Request $request, RequestMusbangkel $musbangkel)
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
            $validatedData['rukun_warga_id'] = auth()->user()->rukun_warga->id;
        
            $musbangkel->update($validatedData);
        
            return redirect()->intended('/request/musbangkel')->with([
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

    public function show_musbangkel(RequestMusbangkel $musbangkel)
    {
        return view('rukun-warga.request.musbangkel.show-musbangkel')->with([
            'request' => $musbangkel
        ]);
    }

    public function destroy_musbangkel(RequestMusbangkel $musbangkel)
    {
        try {
            $musbangkel->delete();
        
            return redirect()->intended('/request/musbangkel')->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Delete Musbangkel Success!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'flash-type' => 'sweetalert',
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Delete Musbangkel Failed!'
            ]);
        }
    }

    public function dataRequestMusbangkel()
    {
        return DataTables::of(RequestMusbangkel::where('rukun_warga_id', auth()->user()->rukun_warga->id)->get())
        ->addColumn('status', function ($model) {
            return view('rukun-warga.request.musbangkel.data-status', compact('model'))->render();
        })
        ->addColumn('requested_at', function ($model) {
            return view('rukun-warga.request.musbangkel.data-requested-at', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('rukun-warga.request.musbangkel.form-action', compact('model'))->render();
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }
}