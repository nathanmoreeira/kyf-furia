<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/fan/register', [FanController::class, 'create'])->name('fan.register');
Route::post('/fan/register', [FanController::class, 'store'])->name('fan.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [FanController::class, 'index'])->name('dashboard');
    Route::resource('fans', FanController::class)->except(['show']);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
