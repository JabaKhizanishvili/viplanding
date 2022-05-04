<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\main;
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

Route::get('/', [main::class, "index"])->name('index');
Route::post('/register', [main::class, "reg"])->name('register');
Route::any('/checkadmin', [main::class, "checkadmin"])->name('check');
Route::any('/adminpanel', [main::class, "costum"])->name('costum')->middleware('admin');
Route::any('/admin', [main::class, "admin"])->name('admin')->middleware('adminchecklog');;
Route::any('/logout', [main::class, "logout"])->name('logout');
