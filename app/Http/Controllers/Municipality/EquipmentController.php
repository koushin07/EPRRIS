<?php

namespace App\Http\Controllers\Municipality;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEquipmentRequest;
use App\Models\Equipment;
use App\Models\Municipality;
use Illuminate\Auth\Events\Validated;

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
        $request->validated();
        Equipment::create([
            'equipment_name' => $request->equipment_name,
            'municipality_id' => auth()->user()->municipality_id,
            'code' => $request->code,
            'asset_desc' => $request->asset_desc,
            'category' => $request->category,
            'unit' => $request->unit,
            'model_number' => $request->model_number,
            'serial_number' => $request->serial_number,
            'status' => $request->status,
            'asset_id' => $request->asset_id,
            'remarks' => $request->remarks,
        ]);
        return back();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {

        // $request->validated();
        // dd($equipment, $request);
        $equipment->update($request->validated());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
