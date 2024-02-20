<?php

use App\Http\Controllers\ApproveController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth', 'role:admin,user'], function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('admin.logout')->middleware('auth');

    Route::post('/dashboard', [App\Http\Controllers\CalendarController::class, 'events']);

    Route::get('/approve', [App\Http\Controllers\ApproveController::class, 'index'])->name('approve');
    Route::post('/approve/approve/{id}', [App\Http\Controllers\ApproveController::class, 'approve'])->name('approve.approve');
    Route::post('/approve/decline/{id}', [App\Http\Controllers\ApproveController::class, 'decline'])->name('approve.decline');
    Route::delete('/approve/delete/{id}', [App\Http\Controllers\ApproveController::class, 'delete'])->name('approve.delete');


    Route::get('/daily', [App\Http\Controllers\DailyTaskController::class, 'index'])->name('daily');
    Route::post('/daily', [App\Http\Controllers\DailyTaskController::class, 'store'])->name('daily_task.store');
    Route::put('/daily/{daily_task}', [App\Http\Controllers\DailyTaskController::class, 'update'])->name('daily_task.update');
    Route::delete('/daily/{daily:id}', [App\Http\Controllers\DailyTaskController::class, 'destroy'])->name('daily_task.delete');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
