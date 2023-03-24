<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FormController;
use App\Models\Feedback;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::post('/submit-form', [FormController::class, 'store'])->name('submit-form');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/feedback/{id}/vote', [FeedbackController::class, 'vote']);



require __DIR__.'/auth.php';