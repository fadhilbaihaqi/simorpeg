<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaPegawai;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class KelolaPegawaiController extends Controller
{
    public function index()
    {
        $keyword = request('search');
        $KelolaPegawai = KelolaPegawai::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('kelola_pegawai.kelolapegawai', compact('KelolaPegawai'));
    }

    public function store(Request $request)
    {
        //Validasi Input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
        ]);

        //Insert data ke tbl Users
        $data = [
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ];
        $user = User::create($data);

        try {
            //Insert Data ke tbl kelola_pegawai
            KelolaPegawai::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'user_id' => $user->id,
            ]);
            return redirect(route('kelolapegawai'))->with('toast_success', 'Data Berhasil Ditambahkan!');
        } catch (Throwable $e) {
            report($e);
            return redirect(route('kelolapegawai'))->with('toast_warning', 'Data harus diisi');
        }
    }


    public function tambah_data()
    {
        $roles = Role::all();
        return view('kelola_pegawai.tambah_data', compact('roles'));
    }

    public function edit_data($id)
    {
        $peg = KelolaPegawai::findorfail($id);
        $roles = Role::all();
        return view('kelola_pegawai.edit_data', compact('peg', 'roles'));
    }

    public function update_data(Request $request, $id)
    {
        $validatedData = [
            'username' => 'required',
            'role_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
        ];
        if ($request->password) {
            $validatedData['password'] = 'required';
        }
        //validasi Input
        $request->validate($validatedData);
        // mencari data 
        $peg = KelolaPegawai::findorfail($id);

        try {
            //Insert data ke tbl Users
            $data = [
                'username' => $request->username,
                'role_id' => $request->role_id
            ];

            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }

            User::where('id', $peg->user_id)->update($data);
            $peg->update($request->all());
            return redirect(route('kelolapegawai'))->with('toast_success', 'Data Berhasil Update!');
        } catch (Throwable $e) {
            report($e);
            return redirect(route('kelolapegawai'))->with('catch', 'Data harus diisi');
        }
    }

    public function delete_data($id)
    {
        $peg = KelolaPegawai::findorfail($id);
        $peg->delete();
        User::where('id', $peg->id)->delete();
        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
