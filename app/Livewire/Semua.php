<?php

namespace App\Livewire;

use App\Models\Kec;
use App\Models\Kel;
use App\Models\Kota;
use App\Models\Orangtua;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\User;
use App\Models\Siswa;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Validator;

class Semua extends Component
{
    use LivewireAlert;
    public $user;
    public $email;
    public $name;
    public $tlp, $ayahhp, $ibuhp, $walihp;
    public $nik;
    public $jkel;
    public $agama;
    public $tempatlahir;
    public $tgllahir;
    public $alamat;
    public $status;
    public $prov = 'Kalimantan Barat';
    public $kota;
    public $listkota, $listkec, $listkel;
    public $kec;
    public $kel;
    public $smp;
    public $ayahnama, $ayahkerja;
    public $ibunama, $ibukerja;
    public $walinama, $alamatwali;
    public $pilihan = 'bio';

    public function pilih($jenis)
    {
        $this->pilihan = $jenis;
    }
    public function simpanAlamat()
    {
        $data = [
            'kel' => $this->kel,
        ];
        $rules = [
            'kel' => 'required',
        ];
        $validator = Validator::make($data, $rules, [
            'kel.numeric' => 'Lengkapi Kelurahan',
        ]);
        if ($validator->fails()) {
            foreach ($validator->messages()->getMessages() as $va) {
                $this->alert('warning', $va[0]);
            }
        }
        $simpan = $this->user;
        $simpan->alamat = $this->alamat;
        $simpan->prov = 'KALIMANTAN BARAT';
        $simpan->kota = $this->kota;
        $simpan->kec = $this->kec;
        $simpan->kel = $this->kel;
        if ($this->user->status < 2) {
            $simpan->status = 2;
        }
        $simpan->save();
        $this->alert('success', 'BERHASIL!', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
        ]);
    }
    public function simpan()
    {
        $data = [
            'tlp' => $this->tlp,
        ];
        $rules = [
            'tlp' => 'numeric',
        ];
        $validator = Validator::make($data, $rules, [
            'tlp.numeric' => 'No HP harus berupa angka',
        ]);
        if ($validator->fails()) {
            foreach ($validator->messages()->getMessages() as $va) {
                $this->alert('warning', $va[0]);
            }
        }
        $validator->validate();
        $simpan = $this->user;
        $simpan->name = $this->name;
        $simpan->tlp = $this->tlp;
        $simpan->nik = $this->nik;
        $simpan->jkel = $this->jkel;
        $simpan->agama = $this->agama;
        $simpan->tempatlahir = $this->tempatlahir;
        $simpan->tgllahir = $this->tgllahir;
        if ($this->user->status < 1) {
            $simpan->status = 1;
        }
        $simpan->save();
        $simpanasal = Siswa::where('user_id', $this->user->id)->firstOrFail();
        $simpanasal->asalsmp = $this->smp;
        $simpanasal->save();
        $this->reset(['name', 'tlp', 'nik', 'jkel', 'agama', 'tempatlahir', 'tgllahir']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->alert('success', 'BERHASIL!', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
        ]);
    }
    public function updatedKota()
    {
        $this->reset('kec');
        $this->listkec = Kec::where('kota_id', $this->kota)->get();
    }
    public function updatedKec()
    {
        $this->listkel = Kel::where('kec_id', $this->kec)->get();
    }
    public function simpanAyah()
    {
        $data = [
            'ayahhp' => $this->ayahhp,
        ];
        $rules = [
            'ayahhp' => 'numeric',
        ];
        $validator = Validator::make($data, $rules, [
            'ayahhp.numeric' => 'No HP harus berupa angka',
        ]);
        if ($validator->fails()) {
            $this->alert('warning', 'Terdapat Kesalahan, Cek inputan Anda');
        }
        $validator->validate();
        $simpan = Orangtua::where('user_id', $this->user->id)->firstOrFail();
        $simpan->nama_ayah = $this->ayahnama;
        $simpan->pekerjaan_ayah = $this->ayahkerja;
        $simpan->hp_ayah = $this->ayahhp;
        $simpan->save();
        if ($this->user->status < 3) {
            $gantistatus = $this->user;
            $gantistatus->status = 3;
            $gantistatus->save();
        }
        $this->reset(['ayahnama', 'ayahkerja', 'ayahhp']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->alert('success', 'BERHASIL!', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
        ]);
    }
    public function simpanIbu()
    {
        $data = [
            'ibuhp' => $this->ibuhp,
        ];
        $rules = [
            'ibuhp' => 'numeric',
        ];
        $validator = Validator::make($data, $rules, [
            'ibuhp.numeric' => 'No HP harus berupa angka',
        ]);
        if ($validator->fails()) {
            $this->alert('warning', 'Terdapat Kesalahan, Cek inputan Anda');
        }
        $validator->validate();
        $simpan = Orangtua::where('user_id', $this->user->id)->firstOrFail();
        $simpan->nama_ibu = $this->ibunama;
        $simpan->pekerjaan_ibu = $this->ibukerja;
        $simpan->hp_ibu = $this->ibuhp;
        $simpan->save();
        if ($this->user->status < 4) {
            $gantistatus = $this->user;
            $gantistatus->status = 4;
            $gantistatus->save();
        }
        $this->reset(['ibunama', 'ibukerja', 'ibuhp']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->alert('success', 'BERHASIL!', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
        ]);
    }
    public function simpanWali()
    {
        $data = [
            'walihp' => $this->walihp,
        ];
        $rules = [
            'walihp' => 'numeric',
        ];
        $validator = Validator::make($data, $rules, [
            'walihp.numeric' => 'No HP harus berupa angka',
        ]);
        if ($validator->fails()) {
            $this->alert('warning', 'Terdapat Kesalahan, Cek inputan Anda');
        }
        $validator->validate();
        $simpan = Orangtua::where('user_id', $this->user->id)->firstOrFail();
        $simpan->nama_wali = $this->walinama;
        $simpan->alamat_wali = $this->alamatwali;
        $simpan->hp_wali = $this->walihp;
        $simpan->save();
        if ($this->user->status < 5) {
            $gantistatus = $this->user;
            $gantistatus->status = 5;
            $gantistatus->save();
        }
        $this->reset(['walinama', 'alamatwali', 'walihp']);
        $this->resetErrorBag();
        $this->resetValidation();
        $this->alert('success', 'BERHASIL!', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
        ]);
    }
    public function render()
    {
        $this->user = User::findOrFail(session('user'));
        $this->email = $this->user->email;
        $this->name = $this->user->name;
        $this->tlp = $this->user->tlp;
        $this->nik = $this->user->nik;
        $this->jkel = $this->user->jkel;
        $this->agama = $this->user->agama;
        $this->tempatlahir = $this->user->tempatlahir;
        $this->tgllahir = $this->user->tgllahir;
        $this->smp = $this->user->siswa->asalsmp;
        $this->status = $this->user->status;
        $this->alamat = $this->user->alamat;
        $this->ayahnama = $this->user->orangtua->nama_ayah;
        $this->ayahkerja = $this->user->orangtua->pekerjaan_ayah;
        $this->ayahhp = $this->user->orangtua->hp_ayah;
        $this->ibunama = $this->user->orangtua->nama_ibu;
        $this->ibukerja = $this->user->orangtua->pekerjaan_ibu;
        $this->ibuhp = $this->user->orangtua->hp_ibu;
        $this->walinama = $this->user->orangtua->nama_wali;
        $this->alamatwali = $this->user->orangtua->alamat_wali;
        $this->walihp = $this->user->orangtua->hp_wali;
        if ($this->status >= 2) {
            $this->kota = $this->user->kota;
            $this->kec = $this->user->kec;
            $this->kel = $this->user->kel;
            $this->listkec = Kec::where('kota_id', $this->kota)->get();
            $this->listkel = Kel::where('kec_id', $this->kec)->get();
        }


        $this->listkota = Kota::all();
        return view('livewire.semua');
    }
}
