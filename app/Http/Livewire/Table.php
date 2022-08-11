<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Equipment;

class Table extends Component
{
    use WithPagination;
    public $sortBy;
    public $search;
    protected $queryString = ['search', 'sortBy'];
    public function render()
    {
        return view('livewire.table', [
            'equipments' =>Equipment::where('equipment_name', 'like', "%{$this->search}%")
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
