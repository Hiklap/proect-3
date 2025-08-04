<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TuriesController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('main');
})->name('main');


Route::get('/turies', [TuriesController::class, 'index'])->name('turies.index');
Route::get('/turies/{id}', [TuriesController::class, 'show'])->name('turies.show');

Route::get('/tours/{id}/apply', [TuriesController::class, 'applyForm'])->name('tours.apply');
Route::post('/tours/{id}/apply', [TuriesController::class, 'applyStore'])->name('tours.apply.store');

// Админ-панель
Route::get('/admin/tours', [AdminController::class, 'index'])->name('admin.tours.index');
Route::get('/admin/tours/create', [AdminController::class, 'create'])->name('admin.tours.create');
Route::post('/admin/tours', [AdminController::class, 'store'])->name('admin.tours.store');
Route::get('/admin/tours/{id}/edit', [AdminController::class, 'edit'])->name('admin.tours.edit');
Route::put('/admin/tours/{id}', [AdminController::class, 'update'])->name('admin.tours.update');
Route::delete('/admin/tours/{id}', [AdminController::class, 'destroy'])->name('admin.tours.destroy');