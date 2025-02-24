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


Route::get('/generate-pdf/{id}/{table}', [SubmitController::class, 'generatePdf'])->name('generate.pdf');

Route::get('/search-pdf/{id?}', [SubmitController::class, 'searchView'])->name('search.view');
Route::post('/search-pdf', [SubmitController::class, 'searchPdf'])->name('search.pdf');





