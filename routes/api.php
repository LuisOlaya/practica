<?php

use App\Http\Controllers\CasaController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\DireccionPersonaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PrimerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('primer/{id}', [PrimerController::class, 'index']);
/* Route::get('persona', [PersonaController::class, 'index']);
Route::get('persona/{persona}', [PersonaController::class, 'show']);
Route::post('persona', [PersonaController::class, 'store']); */



Route::resource('persona', PersonaController::class);
Route::resource('casa', CasaController::class);
Route::resource('direccion', DireccionController::class);

Route::post('direccion/{direccion}/persona/{persona}', [DireccionPersonaController::class, 'add']);
Route::delete('direccion/{direccion}/persona/{persona}', [DireccionPersonaController::class, 'remove']);
Route::get('consulta/{persona}', [ConsultasController::class, 'basic']);




