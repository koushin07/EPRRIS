<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Equipment;

class EquipmentQty extends Component
{
    use WithPagination;
    public $search;

    protected $queryString = ['search'];

  
    
    public function render()
    {
        return view('livewire.dashboard.equipment-qty', [
            'duplicates' => Equipment::select('equipment_name')
                ->selectRaw('count(equipment_name) as qty')
                ->groupBy('equipment_name')
                ->where('equipment_name', 'like', '%' . $this->search . '%')
                ->paginate(4),
            ]);
    }
}
