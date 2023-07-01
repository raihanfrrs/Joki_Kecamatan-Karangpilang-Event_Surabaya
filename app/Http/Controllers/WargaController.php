<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use App\Models\RequestEvent;
use App\Models\VideoEvent;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        return view('warga.pengajuan.index');
    }

    public function photo()
    {
        return view('warga.photo.index')->with([
            'photos' => PhotoEvent::all()
        ]);
    }

    public function video()
    {
        return view('warga.video.index')->with([
            'videos' => VideoEvent::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:2|max:255',
            'event' => 'required|min:2|max:255',
            'date_start' => 'required|date',
            'date_done' => 'required|date',
            'location' => 'required',
            'phone' => 'required|numeric',
            'proposal' => 'required|mimes:pdf|max:2048',
            'surat_permohonan' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->file('proposal')) {
            $validateData['proposal'] = $request->file('proposal')->store('proposal');
        }

        if ($request->file('surat_permohonan')) {
            $validateData['surat_permohonan'] = $request->file('surat_permohonan')->store('surat-permohonan');
        }

        $validateData['status'] = 'proses';
        $validateData['slug'] = $request->name;

        $request = RequestEvent::create($validateData);

        if ($request) {
            return redirect('pengajuan')->with([
                'case' => 'default',
                'position' => 'center',
            'type' => 'success',
                'message' => 'Pengajuan Success!'
            ]);
        } else {
            return redirect('pengajuan')->with([
                'case' => 'default',
                'position' => 'center',
                'type' => 'error',
                'message' => 'Pengajuan Failed!'
            ]);
        }
    }
}
