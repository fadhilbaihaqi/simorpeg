<?php

namespace App\Http\Controllers;

use App\Models\PenilaianPegawai;
use App\Models\User;
use Illuminate\Http\Request;

class PenilaianPegawaiController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', 2)->get();
        return view('penilaian_pegawai.index', compact('user'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bulan_penilaian' => 'required',
            'problem_solving' => 'required',
            'clean_code' => 'required',
            'database' => 'required',
            'responsibility' => 'required',
            'leadership' => 'required',
            'decition' => 'required',
        ]);
        $validatedData['user_id'] = $id;
        $hitung = ($validatedData['problem_solving'] + $validatedData['clean_code'] + $validatedData['database'] + $validatedData['responsibility'] + $validatedData['leadership'] + $validatedData['decition']) / 6;

        if ($hitung >= 90) {
            $validatedData['grade'] = "A";
        } else if ($hitung >= 80 && $hitung < 90) {
            $validatedData['grade'] = "B";
        } else if ($hitung >= 70 && $hitung < 80) {
            $validatedData['grade'] = "C";
        } else if ($hitung >= 60 && $hitung < 70) {
            $validatedData['grade'] = "D";
        } else {
            $validatedData['grade'] = "E";
        }
        PenilaianPegawai::create($validatedData);
        return redirect(route('penilaianpegawai.show', ['id' => $id]))->with('toast_success', 'Data Berhasil Ditambahkan!');
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
        return view('penilaian_pegawai.show', compact('user', 'bulan', 'penilaian'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bulan_penilaian' => 'required',
            'problem_solving' => 'required',
            'clean_code' => 'required',
            'database' => 'required',
            'responsibility' => 'required',
            'leadership' => 'required',
            'decition' => 'required',
        ]);
        $validatedData['user_id'] = $id;
        $hitung = ($validatedData['problem_solving'] + $validatedData['clean_code'] + $validatedData['database'] + $validatedData['responsibility'] + $validatedData['leadership'] + $validatedData['decition']) / 6;

        if ($hitung >= 90) {
            $validatedData['grade'] = "A";
        } else if ($hitung >= 80 && $hitung < 90) {
            $validatedData['grade'] = "B";
        } else if ($hitung >= 70 && $hitung < 80) {
            $validatedData['grade'] = "C";
        } else if ($hitung >= 60 && $hitung < 70) {
            $validatedData['grade'] = "D";
        } else {
            $validatedData['grade'] = "E";
        }
        PenilaianPegawai::where('bulan_penilaian', $validatedData['bulan_penilaian'])->where('user_id', $id)->update($validatedData);
        return redirect(route('penilaianpegawai.show', ['id' => $id]))->with('toast_success', 'Data Berhasil Diubah!');
    }


    public function destroy($id)
    {
        //
    }
}
