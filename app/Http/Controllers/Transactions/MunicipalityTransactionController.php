<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Services\MunicipalityTransactionService;
use App\Models\MunicipalityTransaction;
use App\Models\Municipality;
use App\Http\Requests\Transactions\Municipality\CreateRequest;
use App\Http\Controllers\Controller;

class MunicipalityTransactionController extends Controller
{

    protected $MTService;
    public function __construct(MunicipalityTransactionService $municipalityTransactionService)
    {
        $this->MTService = $municipalityTransactionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CreateRequest $request)
    {

        
        $request->validated();
        $check = $this->MTService->isEquipmentAvailable($request);


        if (empty($check)) {

            return back()->with('error', 'Equipment not found');
        }


        if ($check['borrow_id'] != '') {

            $this->softDelete($check['borrow_id']);

            MunicipalityTransaction::create([
                'municipality_id' => auth()->user()->municipality_id,
                'equipment_id' => $check['equipment_id'],
            ]);
            return back();

        }

        MunicipalityTransaction::create([
            'municipality_id' => auth()->user()->municipality_id,
            'equipment_id' => $check['equipment_id'],
        ]);

        $equipmentId = $check['equipment_id'];
        $owner = Municipality::with(['equipment' => function ($q) use ($equipmentId) {
            return $q->find($equipmentId);
        }])
            ->where('id', '=', $check['owner'])->first();

        // borrowEvent::dispatch($owner);

        return back()->with('success', 'Request Sent');

    }

    public function softDelete($id)
    {

       
        $borrows = MunicipalityTransaction::find($id);
        $borrows->delete();
        return back()->with('success', 'Request Sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
