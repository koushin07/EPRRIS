<?php

namespace App\Http\Livewire\Equipment;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Equipment;
use App\Models\Municipality;

class Show extends Component
{
    use WithPagination;
    public $municipality_id;
    public $sortBy;
    public $search;

    public function mount($municipality_id)
    {
        $this->municipality_id =$municipality_id;
    }
    protected $queryString = ['search', 'sortBy'];
    
    public function render()
    {
        return view('livewire.equipment.show', [
            'name' =>Municipality::find($this->municipality_id),
            'equipments' =>Equipment::where('municipality_id', $this->municipality_id)
            ->where('equipment_name', 'like', "%{$this->search}%")
           ->where('status','LIKE', "%{$this->sortBy}%")
            ->paginate(10)
        ]);
    }
    public function sorting($sort)
    {
        // dd($sort);
        $this->sortBy=$sort;
        
    }
}
