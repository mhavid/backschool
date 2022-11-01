<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ClassController;
use App\Http\Controllers\api\ScheduleController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/users', [UserController::class, 'index'])->name('users');

Route::get('/class', [ClassController::class, 'index'])->name('class');
Route::get('/class/list', [ClassController::class, 'list'])->name('class.list');

Route::resource('schedule', ScheduleController::class);
