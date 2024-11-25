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
Route::get('/rooms/create',[AdminController::class,'create'])->name('rooms.create');
Route::get('/rooms/show',[AdminController::class,'show'])->name('rooms.show');
Route::post('/rooms',[AdminController::class,'store'])->name('rooms.store');
Route::get('/rooms_delete/{id}',[AdminController::class,'delete'])->name('rooms.delete');

Route::get('/home',[AdminController::class,'index'])->name('home');
