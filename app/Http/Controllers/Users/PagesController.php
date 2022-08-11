<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Equipment;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
   function index()
   {
      $serviceable = Equipment::where('status', 'Serviceable')->count();
      $poor = Equipment::where('status', 'Poor')->count();
      $unusable = Equipment::where('status', 'Unusable')->count();
      $provinces = Province::withCount('Municipality')->get();

      // $equipments = equipment::select(['equipment_name']);

      // $status = $this->EquipmentService->getEquipmentStatus()->count();

      // $borrow = borrow::where('confirm', 2)->withTrashed()->count('equipment_id');

      // $provinces = Province::withCount('Municipality')->get();
      // $user = Municipality::find(auth()->user()->municipality_id);
      return view('Dashboard', compact('serviceable', 'poor', 'unusable', 'provinces'));
   }

   function show($id)
   {
      return view('municipality.show', [
         'id' => $id
      ]);
   }
}
