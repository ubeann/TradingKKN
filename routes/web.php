<?php

use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SubmissionController::class, 'index'])->name('landing');
Route::prefix('create')->name('create.')->group(function () {
    Route::get('/', [SubmissionController::class, 'create'])->name('form');
    Route::post('/', [SubmissionController::class, 'store'])->name('store');
});
Route::prefix('taken')->name('taken.')->group(function () {
    Route::get('/', [SubmissionController::class, 'show'])->name('show');
    Route::post('taken', [SubmissionController::class, 'take'])->name('store');
});
Route::delete('cancel', [SubmissionController::class, 'cancel'])->name('cancel');
Route::get('download/form', [SubmissionController::class, 'download'])->name('document.form');