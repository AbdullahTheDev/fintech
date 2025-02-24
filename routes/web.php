<?php

use App\Http\Controllers\SubmitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/brief-form', [SubmitController::class, 'briefForm'])->name('brief.form');
Route::post('/submit', [SubmitController::class, 'briefSubmit'])->name('form.submit');