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
    Route::get('/account', 'index');
    Route::post('/account','store');
    Route::get('/account/{id}','show');
    Route::put('/account/{id}','update');
    Route::delete('/account/{id}','destroy');
});

Route::controller(CoinController::class)->group(function(){
    Route::get('/coin', 'index');
    Route::post('/coin','store');
    Route::get('/coin/{id}','show');
    Route::put('/coin/{id}','update');
    Route::delete('/coin/{id}','destroy');
});

Route::controller(CategorieController::class)->group(function(){
    Route::get('/categorie', 'index');
    Route::post('/categorie','store');
    Route::get('/categorie/{id}','show');
    Route::put('/categorie/{id}','update');
    Route::delete('/categorie/{id}','destroy');
});

Route::controller(MovementtypeController::class)->group(function(){
    Route::get('/movimenttype', 'index');
    Route::post('/movimenttype','store');
    Route::get('/movimenttype/{id}','show');
    Route::put('/movimenttype/{id}','update');
    Route::delete('/movimenttype/{id}','destroy');
});

Route::controller(MovementController::class)->group(function(){
    Route::get('/moviment', 'index');
    Route::post('/moviment','store');
    Route::get('/moviment/{id}','show');
    Route::put('/moviment/{id}','update');
    Route::delete('/moviment/{id}','destroy');
});


