<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\API\APIController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('apicompany', APIController::class);
// });
Route::post('signup',[APIController::class,'signup']);

Route::post('adminlogin',[APIController::class,'adminlogin']);
Route::post('logout',[APIController::class,'logout']);
// Route::get('/viewcmpy/{id}',[ APIController::class,'ViewCompany']);
// Route::post('/updateCmp/{id}',[ UpdateController::class,'updateCmpData']);
// Route::delete('/deletecmp/{id}',[ UpdateController::class,'deletecmpData']);
// Route::get('/view/{id}',[UpdateController::class,'view2']);