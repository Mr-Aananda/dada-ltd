<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile Controllers
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //User Controllers
    Route::resource('user', UserController::class);

    Route::resource('production', ProductionController::class);
    Route::get('/productions/{id}/export/excel', [ProductionController::class, 'exportExcel'])->name('production.exportExcel');
    Route::get('/productions/{id}/export/pdf', [ProductionController::class, 'exportPdf'])->name('production.exportPdf');

    //URL Controllers
    Route::resource('url', UrlController::class);
    route::get('/s/{shortUrl}', [UrlController::class, 'redirectToMainUrl'])->name('url.redirect');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return "Storage link create successfully";
});

require __DIR__ . '/auth.php';
