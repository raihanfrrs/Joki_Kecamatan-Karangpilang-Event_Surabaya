<?php

namespace App\Http\Controllers;

use App\Models\RequestEvent;
use Illuminate\Http\Request;
use App\Models\RequestMusbangkel;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PengajuanController extends Controller
{
    public function event_index()
    {
        return view('admin.pengajuan.event.index');
    }

    public function event_edit(RequestEvent $event)
    {
        return view('admin.pengajuan.event.edit-event')->with([
            'request' => $event
        ]);
    }

    public function event_update(Request $request, RequestEvent $event)
    {
        $rules = [
            'name' => 'required|min:2|max:255',
            'event' => 'required|min:2|max:255',
            'date_start' => 'required|date',
            'date_done' => 'required|date',
            'location' => 'required',
            'phone' => 'required|numeric',
            'proposal' => 'mimes:pdf|max:2048',
            'surat_permohonan' => 'mimes:pdf|max:2048'
        ];

        $validateData = $request->validate($rules);

        if ($request->file('proposal')) {
            if ($event->proposal) {
                Storage::delete($event->proposal);
            }
            $validateData['proposal'] = $request->file('proposal')->store('proposal');
        }

        if ($request->file('surat_permohonan')) {
            if ($event->surat_permohonan) {
                Storage::delete($event->surat_permohonan);
            }
            $validateData['surat_permohonan'] = $request->file('surat_permohonan')->store('surat-permohonan');
        }

        $validateData['slug'] = slug($request->name);

        $events = $event->update($validateData);

        if ($events) {
            return redirect('event')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('event')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function event_update_status(Request $request, RequestEvent $event)
    {
        return $event->update(['status' => $request->status, 'admin_id' => auth()->user()->admin[0]->id]);
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
            'request' => $event
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
            'request' => $musbangkel
        ]);
    }

    public function musbangkel_update(Request $request, RequestMusbangkel $musbangkel)
    {
        $validateData = $request->validate([
            'request_type' => 'required',
            'size' => 'min:2|max:255',
            'amount' => 'min:2|max:255',
            'location' => 'required',
            'feedback' => 'max:255',
        ]);

        if ($musbangkel->update($validateData)) {
            return redirect('musbangkel')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'success',
                'message' => 'Update Success!'
            ]);
        } else {
            return redirect('musbangkel')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Update Failed!'
            ]);
        }
    }

    public function musbangkel_update_status(Request $request, RequestMusbangkel $musbangkel)
    {
        return $musbangkel->update(['status' => $request->status, 'admin_id' => auth()->user()->admin[0]->id]);
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

    public function dataMusbangkel()
    {
        return DataTables::of(RequestMusbangkel::all())
        ->addColumn('rukun_warga', function ($model) {
            return view('admin.pengajuan.musbangkel.data-rukun-warga', compact('model'))->render();
        })
        ->addColumn('status', function ($model) {
            return view('admin.pengajuan.musbangkel.data-status', compact('model'))->render();
        })
        ->addColumn('action', function ($model) {
            return view('admin.pengajuan.musbangkel.form-action', compact('model'))->render();
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }
}
