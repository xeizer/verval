<?php

namespace App\Livewire;

use App\Models\Siswa;
use Livewire\Component;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Biodata extends Component
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
    public $prov;
    public $kota;
    public $kec;
    public $kel;
    public $smp;

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
        $this->sudahSimpan = true;
        $this->alert('success', 'BERHASIL!', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
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

        return view('livewire.biodata');
    }
}
