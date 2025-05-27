<?php

use App\Http\Controllers\VacancyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum'])->group(function () {
Route::apiResource('users', UserController::class);
//});
