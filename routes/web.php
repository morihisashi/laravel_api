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

//転送先ルート
Route::get('/gbiz', [GbizController::class, 'index']) -> name('gbiz');

//リダイレクト設定
Route::get('/old-url', function(){
  return redirect( route('gbiz'), 301 );
});