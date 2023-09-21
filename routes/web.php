<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Realtor\RealtorPropertyController;
use App\Http\Controllers\Realtor\RealtorPropertyImageController;

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


Route::get('/', [HomeController::class, 'index']);

Route::get('/properties', [\App\Http\Controllers\Property\PropertyController::class, 'index'])->name('property.index');
Route::get('/properties/{property}', [\App\Http\Controllers\Property\PropertyController::class, 'show'])->name('property.show');

Route::resource('property.offer', \App\Http\Controllers\Property\PropertyOfferController::class)->middleware('auth')->only(['store']);

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group( function () {
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});

Route::prefix('realtor')
    ->name('realtor.')
    ->middleware('auth')
    ->group(function () {
        Route::name('property.restore')
            ->put('property/{property}/restore', [RealtorPropertyController::class, 'restore'])
            ->withTrashed();
        Route::resource('property', RealtorPropertyController::class)
            ->except(['show'])
            ->withTrashed();
        Route::resource('property.image', RealtorPropertyImageController::class)
            ->only(['create', 'store', 'destroy']);
    });


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
