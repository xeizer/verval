<?php

namespace App\Livewire;

use App\Imports\Kotkeckel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Uploadkotkeckel extends Component
{
    use WithFileUploads, LivewireAlert;
    #[Rule('required|mimes:csv,xls,xlsx')]
    public $file;
    public function uploadKotKecKel()
    {
        Excel::import(new Kotkeckel, $this->file);
        $this->alert('success', 'Data berhasil disimpan');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.uploadkotkeckel');
    }
}
