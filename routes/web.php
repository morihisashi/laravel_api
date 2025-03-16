<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GbizController;
use App\Http\Controllers\ChatworkController;

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

// gbiz用のルーティング
Route::get('/gbiz', [GbizController::class, 'index'])->name('gbiz.index');
Route::post('/gbiz', [GbizController::class, 'redirect'])->name('gbiz.redirect');
Route::post('/gbiz/list', [GbizController::class, 'list'])->name('gbiz.list');
Route::post('/gbiz/detail', [GbizController::class, 'detail'])->name('gbiz.detail');

// chatwork用のルーティング
Route::get('/chatwork', [ChatworkController::class, 'index'])->name('chatwork.index');
Route::post('/chatwork/send', [ChatworkController::class, 'sendMessage'])->name('chatwork.send');
Route::get('/chatwork/getuser', [ChatworkController::class, 'showGetUserForm'])->name('chatwork.getuser.form');
Route::post('/chatwork/getuser', [ChatworkController::class, 'getRoomMembers'])->name('chatwork.getuser');