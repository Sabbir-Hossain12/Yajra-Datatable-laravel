<?php

use App\Http\Controllers\DatatableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list',[DatatableController::class,'dataTableLogic']);
Route::post('/store',[DatatableController::class,'store']);