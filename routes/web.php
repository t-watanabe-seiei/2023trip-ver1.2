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

// Route::get('/', function () {
//     /* return view('welcome');*/
//   return view('trip');
// });

Route::get('/', 'App\Http\Controllers\ScheduleController@trip')->name('schedule.route');


// Route::get('/showAll', 'ScheduleController@all');
// Laravelのバージョン7までだったら、この書き方はOKでした。しかし、バージョン8になってこの書き方はNGになりました。
Route::get('/showAll', 'App\Http\Controllers\ScheduleController@alldata')->name('schedule.all');

// Scheduleの登録処理
Route::post('/store', 'App\Http\Controllers\ScheduleController@store');

// Route::get('/edit/', 'App\Http\Controllers\ScheduleController@edit');
Route::get('/edit/{id}', 'App\Http\Controllers\ScheduleController@edit2');

Route::post('/update', 'App\Http\Controllers\ScheduleController@update');




//非同期通信
Route::get('/ajaxtest', 'App\Http\Controllers\ScheduleController@getIndex');
Route::get('ajaxtest/show_all', 'App\Http\Controllers\ScheduleController@showAll'); // 全表示


Route::get('/livewire', function () { 
  return view('welcome');
});