<?php

namespace App\Services;

use Request;
use App\Services\UserService;

use App\Models\borrow;
use App\Models\User;
use App\Models\Municipality;
use App\Models\Equipment;

class EquipmentService
{

    protected $UserService;

    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }
    

    public function getEquipmentByName($name)
    {
        return Equipment::where('equipment_name', $name);
    }

    public function getEquipmentStatus($status = 'serviceable')
    {
        return Equipment::where('status', $status);
    }

    public function getEquipmentByMunicipalityId($id)
    {
        return Equipment::select('equipment.*')
            ->where('equipment.municipality_id', $id);
    }


    public function getMunicipalityEquipment($municipality, $equipment, $by = 'name')
    {
        if($by == 'name'){
             return Equipment::select(['equipment.municipality_id', 'equipment.id', 'equipment.equipment_name'])
            ->where('equipment.equipment_name', '=', $equipment)
            ->join('municipalities','equipment.municipality_id', '=','municipalities.id')
            ->where('municipalities.municipality_name', '=', $municipality)
            ->join('provinces', 'municipalities.province_id', '=' , 'provinces.id');
          
        }elseif($by =='id'){
            return Equipment::select(['equipment.municipality_id', 'equipment.id', 'equipment.equipment_name', 'municipalities.municipality_name'])
            ->where('equipment.id', '=', $equipment)
            ->join('municipalities','equipment.municipality_id', '=','municipalities.id')
            ->where('municipalities.id', '=', $municipality)
            ->join('provinces', 'municipalities.province_id', '=' , 'provinces.id');
          
        }
       
        // return Municipality::select(['equipment.id', 'equipment.equipment_name'])
        // ->where('municipalities.municipality_name', '=', $municipality)
        // ->join('equipment', 'municipalities.id', '=', 'equipment.municipality_id',)
        // ->where('equipment.equipment_name', '=', $equipment);

    }

  
}
