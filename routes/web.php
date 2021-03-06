<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('products.index');
});

Route::get('/login', [AuthController::class, 'login']);
Route::get('/registration', [AuthController::class, 'registration']);
Route::get('/inventory', [AuthController::class, 'inventory']);
Route::get('/analytics', [AuthController::class, 'analytics']);
Route::get('/inventory', [AuthController::class, 'inventory']);
Route::get('/reports', [AuthController::class, 'reports']);
Route::get('/logs', [AuthController::class, 'logs']);
