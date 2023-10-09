<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Siswa;
use App\Models\User;

class CekController extends Controller
{
    public function verval($nisn)
    {
        $data = Siswa::where('nisn', $nisn)->firstOrFail();
        return view('verval', [
            'user' => User::findOrFail($data->user_id)
        ]);
    }
    public function cekNisn(Request $req)
    {
        $this->validate($req, [
            'nisn' => 'required|numeric|digits:10'
        ], [
            'nisn.required' => 'NISN harus diisi',
            'nisn.numeric' => 'NISN harus berupa Angka',
            'nisn.digits' => 'jumlah digit NISN adalah 10'
        ]);
        $data = Siswa::where('nisn', $req->nisn)->first();
        if ($data) {
            session(['user' => $data->user_id]);
            return view('biodata', [
                'user' => User::findOrFail($data->user_id)
            ]);
        } else {
            Alert::error('GALAT', 'Tidak menemukan NISN tersebut');
            return back();
        }
    }
}
