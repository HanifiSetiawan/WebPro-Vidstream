<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\userdatacontroller;
use App\Http\Controllers\formController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/edit-profile', [usercontroller::class, 'edit'])->name('edit.profile');
    Route::post('/update-profile', [usercontroller::class, 'update'])->name('update.profile');
    Route::get('/movies/{title}', [MovieController::class, 'play'])->name('movie.play');
});

Route::get('/form', [formController::class, 'index'])->name('form');
Route::post('/submit-form-and-redirect', [formController::class, 'storeAndRedirect'])->name('submit.form');
    
Route::middleware(['admin'])->group(function () {
    Route::get('/user-database', [userdatacontroller::class, 'index'])->name('database');
    Route::delete('/user/{id}', [userdatacontroller::class, 'destroy'])->name('user.delete');
    Route::get('/user/{id}/edit', [userdatacontroller::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [userdatacontroller::class, 'update'])->name('user.update');


});
Route::get('/movies/{title}', [MovieController::class, 'play'])->name('movie.play');
Route::post('/movies/{id}/comment', [MovieController::class, 'storeComment'])->name('movie.comment')->middleware('auth');

