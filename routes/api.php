<?php

use App\Http\Controllers\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/vote', [VoteController::class, 'vote']);
Route::get('/feedback/{id}/total_votes', [VoteController::class, 'totalVotes']);