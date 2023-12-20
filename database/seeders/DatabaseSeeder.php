<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KelolaPegawai;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'role' => 'Admin',
        ]);
        Role::create([
            'role' => 'Pegawai',
        ]);
        Role::create([
            'role' => 'Pimpinan',
        ]);

        User::create([
            'username' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role_id' => 1,
        ]);

        KelolaPegawai::create([
            'nama' => 'admin',
            'alamat' => 'Subang',
            'jenis_kelamin' => 'L',
            'tgl_lahir' => date('Y-m-d', strtotime('1998-06-08')),
            'user_id' => 1,
        ]);
    }
}
