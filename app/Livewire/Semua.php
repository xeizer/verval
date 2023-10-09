<?php

namespace App\Livewire;

use App\Models\Kec;
use App\Models\Kel;
use App\Models\Kota;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\User;
use App\Models\Siswa;
use Laravolt\Indonesia\Indonesia;

class Semua extends Component
{
    use LivewireAlert;
    public $user;
    public $email;
    public $name;
    public $tlp;
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
    public $pilihan = 'bio';

    public function pilih($jenis)
    {
        $this->pilihan = $jenis;
    }
    public function simpanAlamat() {
        $simpan = $this->user;
        $simpan->alamat = 
    }
    public function simpan()
    {
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
        $this->listkota = Kota::all();
        return view('livewire.semua');
    }
}
