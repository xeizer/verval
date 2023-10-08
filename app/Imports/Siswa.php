<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Siswa as ModelSiswa;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Orangtua;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Siswa implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        $hitung = 0;
        foreach ($collection as $col) {

            $user = User::updateOrCreate([
                'email' => $col[1]
            ], [
                'name' => $col[5],
                'password' => bcrypt($col[2]),
                'gambar' => '',
                'tlp' => $col[10],
                'nik' => '',
                'jkel' => $col[8],
                'agama' => $col[9],
                'tempatlahir' => $col[6],
                'tgllahir' => $col[7],
                'alamat' => $col[11],
                'status' => 0,
                'prov' => '',
                'kota' => '',
                'kec' => '',
                'kel' => '',
            ]);
            $user = User::where('email', $col[1])->first();
            if ($user) {
                ModelSiswa::updateOrCreate(
                    [
                        'user_id' => $user->id
                    ],
                    [
                        'nisn' => $col[4],
                        'angkatan' => $col[0],
                        'nis' => $col[3],
                        'jurusan_id' => Jurusan::where('kode', $col[12])->first()->id,
                        'kelas_id' => Kelas::where('nama', $col[13])->first()->id,
                        'asalsmp' => $col[14],
                    ]
                );
                Orangtua::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'nama_ayah' => $col[15],
                        'pekerjaan_ayah' => $col[16],
                        'hp_ayah' => $col[17],
                        'nama_ibu' => $col[18],
                        'pekerjaan_ibu' => $col[19],
                        'hp_ibu' => $col[20],
                        'nama_wali' => $col[21],
                        'alamat_wali' => $col[22],
                        'hp_wali' => $col[23],
                    ]
                );
            }
            $hitung++;
        }
        session(['hitung' => $hitung]);
    }
}
