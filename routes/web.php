<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [AdminController::class, 'home'])->name('home');

Route::get('/rooms/create', [AdminController::class, 'create'])->name('rooms.create');
Route::get('/rooms/show', [AdminController::class, 'show'])->name('rooms.show');
Route::post('/rooms', [AdminController::class, 'store'])->name('rooms.store');
Route::get('/rooms_delete/{id}', [AdminController::class, 'delete'])->name('rooms.delete');
Route::get('/rooms_edit/{id}', [AdminController::class, 'edit'])->name('rooms.edit');
Route::patch('/rooms_update/{id}', [AdminController::class, 'update'])->name('rooms.update');
Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/room_details/{id}', [HomeController::class, 'details'])->name('room.details');
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
Route::get('/bookings', [AdminController::class, 'bookings']);
Route::get('/delete_booking/{booking}', [AdminController::class, 'delete_booking']);

Route::get('/approve_booking/{booking}', [AdminController::class, 'approve_booking']);
Route::get('/reject_booking/{booking}', [AdminController::class, 'reject_booking']);
Route::get('/view_gallary', [AdminController::class, 'view_gallary']);
Route::post('/upload_gallary', [AdminController::class, 'upload_gallary']);
Route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary']);
Route::post('/contact', [HomeController::class, 'contact']);
Route::get('/all_messages', [AdminController::class, 'all_messages']);
Route::get('/send_mail/{contact}', [AdminController::class, 'send_mail']);
Route::post('/mail/{contact}', [AdminController::class, 'mail']);

