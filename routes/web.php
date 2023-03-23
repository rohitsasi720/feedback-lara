<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::post('/submit-form', [FormController::class, 'store'])->name('submit-form');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');


require __DIR__.'/auth.php';