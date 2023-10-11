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
Route::get('/note/create', [NoteController::class, 'create'])->name('createnote');
Route::post('/note/store', [NoteController::class, 'store'])->name('storenote');
Route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('editnote');
Route::put('/note/{id}', [NoteController::class, 'update'])->name('updatenote');
Route::delete('/note/{id}', [NoteController::class, 'destroy'])->name('destroynote');

Route::get('/note/create', [NoteController::class, 'create'])->name('createtodo');

// Route::get('/', function () {
//     return view('welcome');
// });
