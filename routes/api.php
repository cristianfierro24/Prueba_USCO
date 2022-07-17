<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Resources\DepartmentCollection;
//use App\Http\Resources\DepartamentResource;
//use App\Http\Controllers\DepartmentController;

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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::apiResource('departaments', App\Http\Controllers\Api\DepartamentController::class)
   ->only(['show', 'index', 'destroy', 'store', 'update'])/*->middleware('auth:sanctum')*/;

Route::apiResource('municipalities', App\Http\Controllers\Api\MunicipalityController::class)
   ->only(['show', 'index', 'destroy', 'store', 'update'])/*->middleware('auth:sanctum')*/; 
   
Route::apiResource('medications', App\Http\Controllers\Api\MedicationController::class)
   ->only(['show', 'index', 'destroy', 'store', 'update'])/*->middleware('auth:sanctum')*/; 

Route::apiResource('documenttypes', App\Http\Controllers\Api\DocumentTypeController::class)
   ->only(['show', 'index', 'destroy', 'store', 'update'])/*->middleware('auth:sanctum')*/; 

Route::apiResource('offices', App\Http\Controllers\Api\OfficeController::class)
   ->only(['show', 'index', 'destroy', 'store', 'update'])/*->middleware('auth:sanctum')*/; 

Route::apiResource('diagnostics_medications', App\Http\Controllers\Api\DiagnosticsMedicationController::class)
   ->only(['show', 'index', 'destroy', 'store', 'update'])/*->middleware('auth:sanctum')*/; 

   
