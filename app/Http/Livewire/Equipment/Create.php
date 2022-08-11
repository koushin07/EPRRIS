<?php

namespace App\Http\Livewire\Equipment;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    
    public function render()
    {
        return view('livewire.equipment.create');
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
