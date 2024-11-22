<?php

use App\Http\Controllers\AdminController;
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


Route::get('/',[AdminController::class,'home'])->name('home');
Route::get('/room/create',[AdminController::class,'create'])->name('rooms.create');
Route::post('/room',[AdminController::class,'store'])->name('rooms.store');

Route::get('/home',[AdminController::class,'index'])->name('home');
