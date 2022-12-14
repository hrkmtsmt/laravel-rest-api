<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Actions\Todos\GetAction as GetAllAction;
use App\Http\Actions\Todos\PostAction;
use App\Http\Actions\Todos\Todo\GetAction;
use App\Http\Actions\Todos\Todo\PutAction;
use App\Http\Actions\Todos\Todo\PatchAction;
use App\Http\Actions\Todos\Todo\DeleteAction;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todos', GetAllAction::class);
Route::post('/todos', PostAction::class);
Route::get('/todos/{id}', GetAction::class);
Route::put('/todos/{id}', PutAction::class);
Route::patch('/todos/{id}', PatchAction::class);
Route::delete('/todos/{id}', DeleteAction::class);
