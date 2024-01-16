<?php

use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('createproduct', [ProductController::class, 'index_create_product'])->name('createproduct');
Route::post('createproduct', [ProductController::class, 'store'])->name('createproduct.store');
Route::get('products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');