<?php

namespace App\Livewire;

use App\Models\Animal;
use Livewire\Component;

class PetFilter extends Component
{
    public $filterType = "name";

    public $filterText = "";

    public $showFilterButtons = false;

    public function render()
    {
        $query = Animal::query();

        if ($this->filterText) {
            $query->where($this->filterType, 'like', '%' . $this->filterText . '%');
        }

        if ($this->filterType === 'sponsors_count_asc') {
            $query->orderBy('sponsors_count', 'asc');
        } elseif ($this->filterType === 'sponsors_count_desc') {
            $query->orderBy('sponsors_count', 'desc');
        }

        $animals = $query->get();

        return view('livewire.pet-filter', compact('animals'));
    }

    public function changeFilterType($type)
    {
        $this->filterType = $type;
        $this->reset("filterText");
    }


    public function toggleFilterButtons()
    {
        $this->showFilterButtons = !$this->showFilterButtons;
    }


}
