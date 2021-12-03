<?php

use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\HogaradminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HogarController;
use App\Http\Controllers\PeticionesadminController;
use App\Http\Controllers\PeticionesController;
use App\Http\Controllers\UseradminController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $hogar=User::Where('id','=',Auth::user()->id)->first();
    return view('dashboard', compact('hogar'));

    
})->name('dashboard');


/*Route::middleware(['auth:sanctum', 'verified'])->get('/hogar', function () {
    return view('hogar.index');
})->name('hogar');*/

Route::resource('hogar', HogarController::class);
Route::resource('peticiones', PeticionesController::class);

Route::get('/list', [PeticionesController::class, 'index2']);


/*Todo lo Admin*/
Route::resource('hogaradmin', HogaradminController::class);

Route::patch('/peticionesactual/{idpeti}/{idhogar}', [PeticionesadminController::class, 'updateestado']);
Route::resource('peticionesadmin', PeticionesadminController::class);

Route::resource('useradmin', UseradminController::class);
Route::resource('admin', AdministracionController::class);
Route::resource('registeradmin', UseradminController::class);

Route::get('/listadmin', [PeticionesadminController::class, 'indexlist']);
Route::get('/peticionesuser/{idhoga}', [PeticionesadminController::class, 'indexuser']);
Route::get('/peticionesestado/{idpeti}', [PeticionesadminController::class, 'estado']);
Route::get('/peticioneslist/{idhoga}', [PeticionesadminController::class, 'indexuserlist']);





