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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth','admin']],function()
{
      Route::get('/dashboard',function()
      {
       return view('admin.dashboard');
      });
      Route::get('/role-register',[App\Http\Controllers\admin\DashboardController::class,'registered']);

      Route::get('/add-user',function()
      {
       return view('admin.adduser');
      });

      Route::post('/submit','App\Http\Controllers\admin\DashboardController@admin_reg');

      Route::get('/submit',function()
      {
       return view('admin.dashboard');
      });
      Route::put('/edit/{id}','App\Http\Controllers\admin\DashboardController@update');
      
});

Route::get('/userprofile/{id}','App\Http\Controllers\HomeController@userprofile');


