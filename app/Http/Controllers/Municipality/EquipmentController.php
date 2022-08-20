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
use App\Services\EquipmentService;

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
    public function store(CreateEquipmentRequest $request, EquipmentService $equipmentService)
    {

        $this->authorize('municipality');
        $equipmentService->insertData($request->validated());
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
