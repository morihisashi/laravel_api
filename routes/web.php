<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GbizController;

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

Route::get('/gbiz', [GbizController::class, 'index'])->name('gbiz.index');
Route::post('/gbiz', [GbizController::class, 'redirect'])->name('gbiz.redirect');
Route::post('/gbiz/list', [GbizController::class, 'list'])->name('gbiz.list');