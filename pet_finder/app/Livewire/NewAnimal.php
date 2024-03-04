<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class NewAnimal extends Component
{
    use WithFileUploads;
    public $name;
    public $age;
    public $type;
    public $characteristics;
    public $information;
    public $photo;
    public function render()
    {
        $this->name = old('name');
        $this->age = old('age');
        $this->type = old('type');
        $this->characteristics = old('characteristics');
        $this->information = old('information');
        return view('livewire.new-animal');
    }
}
