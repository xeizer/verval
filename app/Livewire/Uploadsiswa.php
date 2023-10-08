<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Imports\Siswa;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Session;

class Uploadsiswa extends Component
{
    use WithFileUploads, LivewireAlert;

    #[Rule('required|mimes:csv,xls,xlsx')]
    public $file;
    public function uploadSiswa()
    {
        Excel::import(new Siswa, $this->file);
        $hitung = session('hitung');
        $this->alert('success', $hitung . ' Data berhasil disimpan');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.uploadsiswa');
    }
}
