<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/orders/create', [OrderController::class, 'showForm']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);
});

Route::get('/admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login']);
Route::post('/admin/{order}/status', [AdminController::class, 'updateStatus'])->middleware('admin.auth');
