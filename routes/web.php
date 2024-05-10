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

Route::get('/form', function () {
    return view('form');
});

Route::post('/submit-form', [formController::class, 'store'])->name('submit.form');
Route::post('/submit-form-and-redirect', [formController::class, 'storeAndRedirect'])->name('submit.form.and.redirect');
Route::post('/submit-form-and-redirect', [formController::class, 'storeAndRedirect'])->name('submit.form.and.redirect');


    
Route::middleware(['admin'])->group(function () {
    Route::get('/user-database', [userdatacontroller::class, 'index'])->name('database');
});
