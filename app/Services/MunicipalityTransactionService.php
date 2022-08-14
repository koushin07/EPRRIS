<?php

namespace App\Services;

use App\Models\Equipment;
use phpDocumentor\Reflection\Types\Boolean;
use App\Services\EquipmentService;
use App\Models\Municipality;

class MunicipalityTransactionService
{

    protected $EquipmentService;

    public $returnRecord = array();
    
    public function __construct(EquipmentService $EquipmentService)
    {

        $this->EquipmentService = $EquipmentService;
    }

    public function isEquipmentAvailable($request)
    {
        //this will get the requested serviceable equipment  within the requested municipality 
        $equipments = $this->EquipmentService->getMunicipalityEquipment(
            $request->municipality,
            $request->equipment
        )->get();
    
        //check if equipment is available 
        if ($equipments->isEmpty()) {
            return array();
        }
        
        //will get data from borrow table that has the id of the requested muni and equip
        $borrows = $this->borrowedEquipment(
            $request->municipality,
            $request->equipment
        )->get();
      

        //check if the request is borrowed
        if (!$borrows->isEmpty()) {
             
            // filter by returned all the fetched data 
            $filtered = $this->filterEquipmentReturned($borrows); //this is array
            //if null means the equipment is borrowed but not yet return
            if ($filtered) {
                foreach ($equipments as $equipment) {
                    foreach ($filtered as $key => $value) {

                        if ($value->equipment_id == $equipment->id) {                           
                            //soft delete borrow id
                            return array('equipment_id' => $equipment->id,'borrow_id' => $value->id, 'owner' => $equipment->muncipality_id);
                        }
                    }
                }
            }
         
            return array();
        } else {
            
            $setup =  Equipment::where('equipment_name', $request->equipment)->first();
          
            return array('equipment_id' => $setup->id, 'borrow_id' => '', 'owner' => $setup->municipality_id );
        }
    }

    public function borrowedEquipment($municipality, $equipment)
    {
        return Municipality::select(['municipality_transactions.equipment_id', 'municipality_transactions.id', 'municipality_transactions.returned'])
            ->where('municipalities.municipality_name', '=', $municipality)
            ->join('equipment', 'municipalities.id', '=', 'equipment.municipality_id')
            ->where('equipment.equipment_name', '=', $equipment)
            ->join('municipality_transactions', 'equipment.id', '=', 'municipality_transactions.equipment_id')
            ->where('municipality_transactions.deleted_at', '=', null);
    }

    public function filterEquipmentReturned($records)
    {
        //is it returned?
        foreach ($records as $record) {
            if ($record->returned) { //not null or empty
                $this->returnRecord[] = $record;
            }
        }
        return $this->returnRecord;
    }
}
