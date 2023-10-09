<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Progress extends Component
{
    public $status, $terpilih;

    public function render()
    {
        $user = User::findOrFail(session('user'));
        $this->status = $user->status;
        return view('livewire.progress');
    }
}
