<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\ProcessController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SettingController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hizmetler', [HomeController::class, 'services'])->name('services');
Route::get('/surec', [HomeController::class, 'process'])->name('process');
Route::get('/fiyatlandirma', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/hakkimizda', [HomeController::class, 'about'])->name('about');
Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');
Route::post('/iletisim', [ContactController::class, 'store'])->name('contact.store');

// Admin Auth Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/giris', [DashboardController::class, 'showLoginForm'])->name('login');
    Route::post('/giris', [DashboardController::class, 'login'])->name('login.post');
    Route::post('/cikis', [DashboardController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('services', ServiceController::class)->except(['show']);
        Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');

        Route::resource('pricing', PricingController::class)->except(['show']);
        Route::get('pricing/{pricing}', [PricingController::class, 'show'])->name('pricing.show');

        Route::resource('process', ProcessController::class)->except(['show']);
        Route::get('process/{process}', [ProcessController::class, 'show'])->name('process.show');

        Route::get('messages', [AdminContactController::class, 'index'])->name('contact.index');
        Route::get('messages/{contact}', [AdminContactController::class, 'show'])->name('contact.show');
        Route::delete('messages/{contact}', [AdminContactController::class, 'destroy'])->name('contact.destroy');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
