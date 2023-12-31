<?php

use App\Http\Controllers\BackupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('backups', [BackupController::class, 'index'])->middleware(['auth', 'verified'])->name('backups.index');
Route::get('backups/create', [BackupController::class, 'create'])->middleware(['auth', 'verified'])->name('backups.create');
Route::post('backups/store', [BackupController::class, 'store'])->middleware(['auth', 'verified'])->name('backups.store');
Route::delete('backups/destroy/{backup}', [BackupController::class, 'destroy'])->middleware(['auth', 'verified'])->name('backups.destroy');
Route::get('backups/toggle/{backup}', [BackupController::class, 'toggleStatus'])->middleware(['auth', 'verified'])->name('backups.toggle');
Route::put('backups/settings', [SettingController::class, 'index'])->name('backups.settings');

Route::middleware('auth')->group(function () {
    Route::get('/settings', [ProfileController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings', [ProfileController::class, 'update'])->name('settings.update');
    Route::delete('/settings', [ProfileController::class, 'destroy'])->name('settings.destroy');
});

require __DIR__.'/auth.php';
