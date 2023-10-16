<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodoController;
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

// Login & Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('storeregister');

// Auth Login User
Route::middleware(['auth', 'auth.session'])->group(function () {

    // Note
    Route::get('/', [NoteController::class, 'index'])->name('note');
    Route::get('/note/create', [NoteController::class, 'create'])->name('createnote');
    Route::post('/note/store', [NoteController::class, 'store'])->name('storenote');
    Route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('editnote');
    Route::put('/note/{id}', [NoteController::class, 'update'])->name('updatenote');
    Route::delete('/note/{id}', [NoteController::class, 'destroy'])->name('destroynote');

    // Todo
    // Route::get('/', [TodoController::class, 'index'])->name('todo');
    // Route::get('/', [TodoController::class, 'show'])->name('showtodo');
    Route::get('/todo/{id}/detail', [TodoController::class, 'detail'])->name('detailtodo');
    Route::get('/todo/{id}/create', [TodoController::class, 'create'])->name('createtodo');
    Route::post('/todo/store', [TodoController::class, 'store'])->name('storetodo');
    Route::get('/todo/{id}/edit', [TodoController::class, 'edit'])->name('edittodo');
    Route::put('/todo/{id}/', [TodoController::class, 'update'])->name('updatetodo');
    Route::delete('/todo/{id}/', [TodoController::class, 'destroy'])->name('destroytodo');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/logout', [LoginController::class, 'abort'])->name('abortlogout');

});

// Route::get('/', function () {
//     return view('welcome');
// });
