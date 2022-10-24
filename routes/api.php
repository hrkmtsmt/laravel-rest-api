<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Actions\Todo\GetAction as GetAllAction;
use App\Http\Actions\Todo\PostAction;
use App\Http\Actions\Todo\Item\GetAction;
use App\Http\Actions\Todo\Item\PutAction;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todo', GetAllAction::class);
Route::post('/todo', PostAction::class);
Route::get('/todo/{id}', GetAction::class);
Route::put('/todo/{id}', PutAction::class);
