<?php

namespace App\Imports;

use App\Models\Kec;
use App\Models\Kel;
use App\Models\Kota;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Kotkeckel implements ToCollection, WithStartRow
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
        foreach ($collection as $col) {
            $kota = Kota::updateOrCreate([
                'nama' => $col[0]
            ]);
            $kec = Kec::updateOrCreate([
                'kota_id' => $kota->id,
                'nama' => $col[1]
            ]);
            $kel = Kel::updateOrCreate([
                'kec_id' => $kec->id,
                'nama' => $col[2]
            ]);
        }
    }
}
