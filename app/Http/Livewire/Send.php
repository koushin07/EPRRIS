<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Services\UserService;
use App\Services\ProvinceService;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\Equipment;

class Send extends ModalComponent
{
    protected $ProvinceService;
    protected $UserService;
    public function mount(UserService $UserService, ProvinceService $ProvinceService)
    {
        $this->UserService = $UserService;
        $this->ProvinceService = $ProvinceService;
    }
    public function render()
    {
        return view('livewire.send', [
            'municipalities' => Municipality::with('user')
                ->whereNot('id', auth()->user()->municipality_id)
                ->where(
                    'province_id',
                    $this->ProvinceService->getProvinceUser(auth()->id())->id
                )->get('municipality_name'),

            'equipments' => Equipment::where('status', 'Serviceable')->with(['municipality' =>
            fn ($query) => $query->where('province_id',  $this->UserService->getUserProvince(
                auth()->user()->municipality_id
            )->first()->id)])->groupBy('equipment_name')->get('equipment_name'),
        ]);
    }
}
