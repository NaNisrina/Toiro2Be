<?php

use App\Http\Controllers\NoteController;
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

// Note
Route::get('/', [NoteController::class, 'index'])->name('note');
// Route::get('/#popup1', [NoteController::class, 'create'])->name('createnote');
// Route::post('/note', [NoteController::class, 'create'])->name('createnote');
Route::put('/{id}', [NoteController::class, 'edit'])->name('editnote');
Route::delete('/{id}', [NoteController::class, 'destroy'])->name('deletenote');

// Route::get('/', function () {
//     return view('welcome');
// });
