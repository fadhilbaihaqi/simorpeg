<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'role_id',
        'password',
    ];


    public function role() // Relasi ke table Role
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function pegawai() // Relasi ke table Kelola Pegawai
    {
        return $this->belongsTo(KelolaPegawai::class, 'id');
    }
    public function monitoring($tanggal = '')
    {

        if ($_GET) {
            $tanggal = $_GET['tahun'] . '-' . $_GET['bulan'];
        }
        $where = $tanggal == '' ? date('Y-m') : $tanggal;
        return $this->hasMany(KelolaMonitoring::class)->where("tanggal", "like", "%$where%")->orderBy('tanggal', 'desc');
    }
}
