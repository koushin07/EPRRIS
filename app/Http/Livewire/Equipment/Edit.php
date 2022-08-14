<?php

namespace App\Http\Livewire\Equipment;

use App\Models\Equipment;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{

    protected Equipment $equipment;
       
    public function mount(Equipment $equipment)
    {
       
        
      $this->equipment = $equipment;
    }

    public function render()
    {
        // dd($this->equipment);
        return view('livewire.equipment.edit', [
            'equipment' => $this->equipment,
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
