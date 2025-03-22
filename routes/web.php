<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Users;
use App\Http\Livewire\Logs;

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

Route::get('/', Login::class)->middleware('guest')->name("login");

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', Dashboard::class)->name("dashboard");
});
