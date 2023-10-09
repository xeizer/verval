<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\User;
use App\Models\Siswa;

class Alamat extends Component
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
        return view('livewire.alamat');
    }
}
