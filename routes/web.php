<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DatatableController;
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
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('user', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::get('datatable', [DatatableController::class, 'index'])->name('datatable');
        Route::get('datatable/lists', [DatatableController::class, 'lists'])->name('datatable.lists');
    });

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/customLogin', [AuthController::class, 'authenticate'])->name('customLogin');
Route::get('/registerLogin', [AuthController::class, 'register'])->name('register');
