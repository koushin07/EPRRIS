<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Users\PagesController;
use App\Http\Controllers\Transactions\MunicipalityTransactionController;
use App\Http\Controllers\Municipality\EquipmentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'auth'], function () {
    //all auth user
    Route::get('/dashboard', [PagesController::class, 'index'])->name('dashboard');
    Route::get('/municipality/{id}', [PagesController::class, 'show'])->name('municipality');
    Route::resource('equipment', EquipmentController::class);

    //municipality 
    Route::group(['middleware' => 'role:municipality', 'prefix' => 'municipality', 'as' => 'municipality.'], function(){
        Route::resource('transaction', MunicipalityTransactionController::class);
    });
});



require __DIR__.'/auth.php';
