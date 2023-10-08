<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dataawal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'su',
            'display_name' => 'SuperUser'
        ]);
        User::create([
            'name' => 'xeizer',
            'email' => 'keiser.form@gmail.com',
            'password' => bcrypt('Rahasia1234'),
        ])->addRole('su');
        Jurusan::create(['nama' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'kode' => 'TJKT']);
        Jurusan::create(['nama' => 'Pengembangan Perangkat Lunak dan Gim', 'kode' => 'PPLG']);
        Jurusan::create(['nama' => 'Teknik Otomotif', 'kode' => 'TO']);
        Jurusan::create(['nama' => 'Akuntansi Keuangan Lembaga', 'kode' => 'AKL']);
        Jurusan::create(['nama' => 'Teknik Pengelasan dan Fabrikasi Logam', 'kode' => 'TPFL']);
        Jurusan::create(['nama' => 'Design Komunikasi Visual', 'kode' => 'DKV']);

        Kelas::create([
            'nama' => 'A',
            'tingkat' => 'X'
        ]);
        Kelas::create([
            'nama' => 'B',
            'tingkat' => 'X'
        ]);
    }
}
