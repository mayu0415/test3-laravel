<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;
use App\Http\Controllers\RegisterController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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



Route::get('/weight_logs', [WeightLogController::class, 'index'])->name('weight_logs.index');
Route::get('/weight_logs/create', [WeightLogController::class, 'create'])->name('weight_logs.create');
Route::post('/weight_logs', [WeightLogController::class, 'store'])->name('weight_logs.store');
Route::get('/weight_logs/search', [WeightLogController::class, 'search'])->name('weight_logs.search');
Route::get('/weight_logs/{weightLogId}', [WeightLogController::class, 'show'])->name('weight_logs.show');
Route::get('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'edit'])->name('weight_logs.edit');
Route::put('/weight_logs/{weightLogId}', [WeightLogController::class, 'update'])->name('weight_logs.update');
Route::get('/weight_logs/{weightLogId}/delete', [WeightLogController::class, 'deleteConfirm'])->name('weight_logs.deleteConfirm');
Route::delete('/weight_logs/{weightLogId}', [WeightLogController::class, 'destroy'])->name('weight_logs.destroy');
Route::get('/weight_logs/goal_setting', [WeightTargetController::class, 'create'])->name('weight_logs.goal_setting');
Route::post('/weight_logs/goal_setting', [WeightTargetController::class, 'store'])->name('weight_logs.goal_setting.store');

Route::get('/register/step1', [RegisterController::class, 'step1'])->name('step1');
Route::post('/register/step1', [RegisterController::class, 'postStep1'])->name('step1.post');
Route::get('/register/step2', [RegisterController::class, 'step2'])->name('step2');
Route::post('/register/step2', [RegisterController::class, 'postStep2'])->name('step2.post');



/*Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest'])
    ->name('login.post');
    
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('logout');*/