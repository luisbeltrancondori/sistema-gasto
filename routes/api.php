<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\MovementtypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AccountController::class)->group(function(){
    Route::get('/account', 'index')->middleware('role:admin|user');
    Route::post('/account','store')->middleware('role:admin');
    Route::get('/account/{id}','show')->middleware('role:admin|user');
    Route::put('/account/{id}','update')->middleware('role:admin');
    Route::delete('/account/{id}','destroy')->middleware('role:admin');
});

Route::controller(CoinController::class)->group(function(){
    Route::get('/coin', 'index')->middleware('role:admin|user');
    Route::post('/coin','store')->middleware('role:admin');
    Route::get('/coin/{id}','show')->middleware('role:admin|user');
    Route::put('/coin/{id}','update')->middleware('role:admin');
    Route::delete('/coin/{id}','destroy')->middleware('role:admin');
});

Route::controller(CategorieController::class)->group(function(){
    Route::get('/categorie', 'index')->middleware('role:admin|user');
    Route::post('/categorie','store')->middleware('role:admin');
    Route::get('/categorie/{id}','show')->middleware('role:admin|user');
    Route::put('/categorie/{id}','update')->middleware('role:admin');
    Route::delete('/categorie/{id}','destroy')->middleware('role:admin');
});

Route::controller(MovementtypeController::class)->group(function(){
    Route::get('/movimenttype', 'index')->middleware('role:admin|user');
    Route::post('/movimenttype','store')->middleware('role:admin');
    Route::get('/movimenttype/{id}','show')->middleware('role:admin|user');
    Route::put('/movimenttype/{id}','update')->middleware('role:admin');
    Route::delete('/movimenttype/{id}','destroy')->middleware('role:admin');
});

Route::controller(MovementController::class)->group(function(){
    Route::get('/moviment', 'index')->middleware('role:admin|user');
    Route::post('/moviment','store')->middleware('role:admin');
    Route::get('/moviment/{id}','show')->middleware('role:admin|user');
    Route::put('/moviment/{id}','update')->middleware('role:admin');
    Route::delete('/moviment/{id}','destroy')->middleware('role:admin');
});
