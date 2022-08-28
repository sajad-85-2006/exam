<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers;
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

Route::get('/',[App\Http\Controllers\HomeContoroller::class,'index'])->middleware('auth');
Route::get('/exam/{id}',[App\Http\Controllers\ExamController::class,'index'])->middleware('auth');
Route::post('/exam/{id}',[App\Http\Controllers\ExamController::class,'store'])->middleware('auth');

Route::prefix('admin')->middleware('auth')->group(function (){

    Route::get('/',[App\Http\Controllers\admin\AdminController::class,'index']);
    Route::get('/user',[App\Http\Controllers\admin\AdminController::class,'user']);
    Route::post('/user/delete/{id}',[App\Http\Controllers\admin\AdminController::class,'userDelete']);
    Route::post('/user/admin/{id}',[App\Http\Controllers\admin\AdminController::class,'userAdmin']);
    Route::get('/exam',[App\Http\Controllers\admin\AdminController::class,'exam']);
    Route::get('/test/create',[App\Http\Controllers\admin\AdminController::class,'testCreate']);
    Route::post('/test/create',[App\Http\Controllers\admin\AdminController::class,'testUpdateCreate']);
    Route::post('/test/delete/{id}',[App\Http\Controllers\admin\AdminController::class,'testDelete']);
    Route::get('/exam/show/{id}',[App\Http\Controllers\admin\AdminController::class,'examShow']);
    Route::get('/exam/edit/{id}',[App\Http\Controllers\admin\AdminController::class,'examCreate']);
    Route::post('/exam/edit/{id}',[App\Http\Controllers\admin\AdminController::class,'examStore']);
    Route::post('/exam/delete/{id}',[App\Http\Controllers\admin\AdminController::class,'examDelete']);
});

Auth::routes();
