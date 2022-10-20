<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Actions\Todo\GetAction;
use App\Http\Actions\Todo\PostAction;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todo', GetAction::class);
Route::post('/todo', PostAction::class);
