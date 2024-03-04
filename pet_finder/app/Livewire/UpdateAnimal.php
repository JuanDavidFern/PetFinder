<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateAnimal extends Component
{
    use WithFileUploads;
    public $animal;
    public $photo;
    public function render()
    {
        return view('livewire.update-animal');
    }
}
