<?php

use App\Http\Controllers\HomeController;
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

Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/', function () {
        return view('auth.login');
    })->middleware('auth');;

    Auth::routes();

    Route::get('/vet/home', [HomeController::class, 'vetHome'])->name('vet.home')->middleware('is_veterinary');
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
