<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
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
    return view('welcome');
})->name('root')->middleware('PreventBackHistory');


Route::prefix('/doctor')->name('doctor.')->group(function(){

    Route::middleware(['guest:doctor', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'doctor.login')->name('login');
        Route::post('/login', [DoctorController::class, 'check'])->name('check');
        Route::view('/register', 'doctor.register')->name('register');
        Route::post('/register', [DoctorController::class, 'save'])->name('save');
    });
    Route::middleware(['auth:doctor', 'PreventBackHistory'])->group(function () {
        Route::get('/home', function(){
            return view('doctor.home');
        })->name('home');
        Route::post('/logout',[DoctorController::class, 'logout'])->name('logout');
    });

});
