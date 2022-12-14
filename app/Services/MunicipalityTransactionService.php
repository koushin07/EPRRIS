<?php

namespace App\Services;

use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Support\Facades\DB;
use App\Services\EquipmentService;
use App\Models\MunicipalityTransaction;
use App\Models\Municipality;
use App\Models\Equipment;
use App\Events\MunicipalityTransactionEvent;
use App\Events\SendMunicipalityRequest;

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
            $request['municipality_name'],
            $request['equipment_name']
        )->get();

        //check if equipment is available 
        // dd($equipments, $request->equipment);
        if ($equipments->isEmpty()) {
            return false;
        }

        //will get data from borrow table that has the id of the requested muni and equip
        // $borrows = $this->borrowedEquipment(
        //     $request->municipality,
        //     $request->equipment
        // )->get();


        // //check if the request is borrowed
        // if (!$borrows->isEmpty()) {
        //     dd( $borrows);
        //     // filter by returned all the fetched data 
        //     $filtered = $this->filterEquipmentReturned($borrows); //this is array
        //     //if null means the equipment is borrowed but not yet return



        foreach ($equipments as $equipment) {

            if ($equipment->quantity != 0 && $equipment->quantity >= $request['quantity']) {

                // dd($equipment->quantity, $request->quantity);

                // dd('goods');
                $this->insertData(
                    $equipment->id,
                    $equipment->municipality_id,
                    $request['quantity'],

                );
                return true;

                //soft delete borrow id
                // return array('equipment_id' => $equipment->id,'borrow_id' => $value->id, 'owner' => $equipment->muncipality_id);

            }
            return false;
        }

        return true;
        // } else {

        //     $setup =  Equipment::where('equipment_name', $request->equipment)->first();
        //     $this->insertData($setup->id, $setup->municiaplity_id, $request->quantity);
        //     // return array('equipment_id' => $setup->id, 'borrow_id' => '', 'owner' => $setup->municipality_id);
        // }
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

    public function insertData($equipment_id, $municipality_id, $quantity)
    {

        $equipment = Equipment::find($equipment_id);
        $record = MunicipalityTransaction::where([
            'municipality_id' => auth()->user()->municipality_id,
            'equipment_id' => $equipment_id,
        ])->first();

        DB::transaction(function () use ($equipment, $equipment_id, $quantity, $record) {
            if (!$record) {
                MunicipalityTransaction::create([
                    'municipality_id' => auth()->user()->municipality_id,
                    'equipment_id' => $equipment_id,
                    'quantity' => $quantity,
                ]);
            } elseif ($record) {
                $record->quantity = $record->quantity + $quantity;
                $record->save();
            }
            $equipment->quantity =  $equipment->quantity - $quantity;
            $equipment->save();
        }, 3);


        $owner = Municipality::with(['equipment' => fn ($q) =>  $q->find($equipment_id)])
            ->where('id', '=', $municipality_id)->first();

        $that = collect([
            'owner' => $owner, //for notif
            'owned' => Equipment::where('municipality_id', $municipality_id)->first(), //reciever of the notifs
            'sender' => Municipality::find(auth()->user()->municipality_id) //sender 
        ]);
        MunicipalityTransactionEvent::dispatch($that);
        return;
    }
}
