<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/journal', function () {
    return view('journal.index');
})->middleware(['auth', 'verified'])->name('journal.index');

Route::get('/journal/create',[JournalController::class,'create'])->name('journal.create');
Route::post('/journal/store',[JournalController::class,'store'])->name('journal.store');


Route::get('/gallery',[GalleryController::class,'index'])->name('gallery.index');
Route::get('/gallery/create',[GalleryController::class,'create'])->name('gallery.create');
Route::post('/gallery/store',[GalleryController::class,'store'])->name('gallery.store');

Route::get('/journal/show/{id}',[JournalController::class,'show'])->name('journal.show');
Route::get('/journal/edit/{id}',[JournalController::class, 'edit'])->name('journal.edit');
Route::put('/journal/update/{id}',[JournalController::class,'update'])->name('journal.update');
Route::delete('/journal/delete/{id}',[JournalController::class,'destroy'])->name('journal.destroy');

Route::get('/gallery/show/{id}',[GalleryController::class,'show'])->name('gallery.show');
Route::get('/gallery/edit/{id}',[GalleryController::class,'edit'])->name('gallery.edit');
Route::put('/gallery/update/{id}',[GalleryController::class,'update'])->name('gallery.update');
Route::delete('/gallery/delete/{id}',[GalleryController::class,'destroy'])->name('gallery.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/journal',[JournalController::class,'index'])->name('journal.index');
});

require __DIR__.'/auth.php';
