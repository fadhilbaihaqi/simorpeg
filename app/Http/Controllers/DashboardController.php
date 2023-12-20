<?php

namespace App\Http\Controllers;

use App\Models\KelolaMonitoring;
// use App\Models\KelolaPegawai;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $TotalTaskHarian = KelolaMonitoring::count();
        $TotalTaskFinish = KelolaMonitoring::where('status', 1)->count();
        $TotalTaskProgress = KelolaMonitoring::where('status', 0)->count();
        $TotalTaskHarian = KelolaMonitoring::count();
        $TotalPegawai = User::where('role_id', 2)->count();
        return view('dashboard.index', compact('TotalTaskHarian', 'TotalPegawai', 'TotalTaskFinish', 'TotalTaskProgress'))->with('toast_success', 'Login Berhasil!');
    }
}
