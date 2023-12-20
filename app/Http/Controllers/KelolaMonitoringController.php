<?php

namespace App\Http\Controllers;

use App\Models\KelolaMonitoring;
use Illuminate\Http\Request;

class KelolaMonitoringController extends Controller
{
    public function index()
    {
        if ((strtolower(auth()->user()->role->role) == strtolower('Pegawai'))) {
            $monitoring = KelolaMonitoring::where('user_id', auth()->user()->id)->orderBy('tanggal', 'desc')->get();
        } else {
            $monitoring = KelolaMonitoring::orderBy('tanggal', 'desc')->get();
        }
        return view('kelola_monitoring.kelolamonitoring', compact('monitoring'));
    }


    public function create()
    {
        return view('kelola_monitoring.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'task_harian' => 'required',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        KelolaMonitoring::create($validatedData);
        return redirect(route('kelolamonitoring.index'))->with('toast_success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $monitoring = KelolaMonitoring::findorfail($id);
        return view('kelola_monitoring.edit', compact('monitoring'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'task_harian' => 'required',
        ]);
        KelolaMonitoring::find($id)->update($validatedData);
        return redirect(route('kelolamonitoring.index'))->with('toast_success', 'Data Berhasil diubah!');
    }

    public function destroy($id)
    {
        KelolaMonitoring::destroy($id);
        return redirect(route('kelolamonitoring.index'))->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function validateTask(Request $request, $id)
    {
        $request->validate([
            'upload' => 'image|file'
        ]);

        $validatedData['upload'] = $request->file('upload')->store('task');
        $validatedData['tanggal_selesai'] = date('Y-m-d');
        $validatedData['status'] = 1;

        KelolaMonitoring::find($id)->update($validatedData);
        return redirect(route('kelolamonitoring.index'))->with('toast_success', 'Task berhasil diselesaikan!');
    }
}
