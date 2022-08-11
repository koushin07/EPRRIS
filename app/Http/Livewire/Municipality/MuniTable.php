<?php

namespace App\Http\Livewire\Municipality;

use App\Models\Municipality;
use App\Models\Province;
use Livewire\Component;

class MuniTable extends Component
{
    public $province_id;
    public $search;
    protected $queryString = ['search'];
    public function mount($province_id)
    {
        $this->province_id = $province_id;
    }
    public function render()
    {
        return view('livewire.municipality.muni-table',[
            'name' =>Province::find($this->province_id),
            'municipalities' => Municipality::withCount('equipment')->where('province_id', $this->province_id)
            ->where('municipality_name', 'like', "%{$this->search}%")
            ->paginate(10),
        ]);
    }
}
