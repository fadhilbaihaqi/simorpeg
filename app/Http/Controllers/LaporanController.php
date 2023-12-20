<?php

namespace App\Http\Controllers;

use App\Models\PenilaianPegawai;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', 2)->get();
        return view('laporan.index', compact('user'));
    }
    public function show($id)
    {
        $user = User::find($id);
        $bulan = [
            "01" => "Januari",
            "02" => "Februari",
            "03" => "Maret",
            "04" => "April",
            "05" => "Mei",
            "06" => "Juni",
            "07" => "Juli",
            "08" => "Agustus",
            "09" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember"
        ];
        if (request('bulan') && request('tahun')) {
            $bulan_penilaian = request('tahun') . '-' . request('bulan');
        } else {
            $bulan_penilaian = date('Y-m');
        }
        $penilaian = PenilaianPegawai::where('bulan_penilaian', $bulan_penilaian)->where('user_id', $id)->first();
        return view('laporan.show', compact('user', 'bulan', 'penilaian'));
    }
}
