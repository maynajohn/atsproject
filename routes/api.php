<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\ConvocationController;
use App\Http\Controllers\OffreEmploiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('users', UserController::class);
Route::apiResource('candidats', CandidatController::class);
Route::apiResource('entreprises', EntrepriseController::class);
Route::apiResource('offres', OffreEmploiController::class);
Route::apiResource('candidatures', CandidatureController::class);
Route::apiResource('convocations', ConvocationController::class);