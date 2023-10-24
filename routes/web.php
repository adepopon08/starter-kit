<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::prefix('admin')->middleware(['auth', 'roles:admin,user'])
    ->name('admin.')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard'); //{{ route('admin.dashbooard') }}
        //Route::get('user', [UserController::class, 'index'])->name('user');
        Route::resource('user', UserController::class);
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('roles', RoleController::class);
    });

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/customLogin', [AuthController::class, 'authenticate'])->name('customLogin');
Route::get('/registerLogin', [AuthController::class, 'register'])->name('register');
