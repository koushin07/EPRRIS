<?php

namespace App\Http\Controllers\Transactions;

use App\Events\MunicipalityTransactionEvent;
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
        if ($this->MTService->isEquipmentAvailable( $request->validated())) {
            return back()->with('success', 'Request Sent');
        }
       return back()->with('error', 'equipment not available');
 

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
       return view('transaction.show');
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
