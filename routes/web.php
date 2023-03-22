<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::post('/submit-form', [FormController::class, 'store'])->name('submit-form');


require __DIR__.'/auth.php';