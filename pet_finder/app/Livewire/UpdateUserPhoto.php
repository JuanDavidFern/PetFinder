<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateUserPhoto extends Component
{
    use WithFileUploads;
    public $photo;
    public function render()
    {
        return view('livewire.update-user-photo');
    }
}
