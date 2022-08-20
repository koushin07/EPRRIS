<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\Equipment;
use App\Http\Controllers\Controller;
use App\Events\BCastingEvent;


class PagesController extends Controller
{
   function index()
   {
      $serviceable = Equipment::where('status', 'Serviceable')->count();
      $poor = Equipment::where('status', 'Poor')->count();
      $unusable = Equipment::where('status', 'Unusable')->count();
      $provinces = Province::withCount('Municipality')->get();
      return view('Dashboard', compact('serviceable', 'poor', 'unusable', 'provinces'));
   }

   function show($id)
   {
      return view('municipality.show', [
         'id' => $id
      ])->with('success', 'great');
   }
}
