<?php

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

Auth::routes();

Route::get('/update', [App\Http\Controllers\Api\codetime::class, 'update'])->name('update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/code', [App\Http\Controllers\HomeController::class, 'send_code'])->name('code')->middleware('auth');
Route::post('/open', [App\Http\Controllers\HomeController::class, 'open'])->name('open')->middleware('auth');
Route::get('/key',[App\http\Controllers\Api\KeyController::class, 'index'])->name('send_key')->middleware('auth');

Route::group(['middleware' => ['auth','role:admin']], function () {
   Route::resource('admin',App\http\Controllers\Admin\AdminController::class);
});
