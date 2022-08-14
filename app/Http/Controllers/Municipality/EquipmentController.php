<?php

namespace App\Http\Controllers\Municipality;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use App\Models\User;
use App\Models\Municipality;
use App\Models\Equipment;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Http\Requests\CreateEquipmentRequest;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessEquipmentJob;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('equipment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEquipmentRequest $request)
    {
       
        $this->authorize('create-equipment');
        // $request->validated();
        // Equipment::create([
        //     'equipment_name' => $request->equipment_name,
        //     'municipality_id' => auth()->user()->municipality_id,
        //     'code' => $request->code,
        //     'asset_desc' => $request->asset_desc,
        //     'category' => $request->category,
        //     'unit' => $request->unit,
        //     'model_number' => $request->model_number,
        //     'serial_number' => $request->serial_number,
        //     'status' => $request->status,
        //     'asset_id' => $request->asset_id,
        //     'remarks' => $request->remarks,
        // ]);

            ProcessEquipmentJob::dispatch();
        // Session::put('equipment_added', $request->equipment_name);
        return back()->with('success', $request->equipment_name . ' ' .'is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        return view('equipment.show', [
           'id' => $id
        ]);
    }

    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {

        // $request->validated();
        // dd($equipment, $request);
        $this->authorize('update-equipment', $equipment);
        $equipment->update($request->validated());
        return back()->with('success', 'Successfully Updated', 'yes');
    }

   
}
