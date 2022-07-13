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
Auth::routes(['register' => false]);
Route::get('/',[\App\Http\Controllers\NewsController::class,'index']);
Route::get('/news/{category}/all',[\App\Http\Controllers\NewsController::class,'categorySearch']);
Route::get('/news/detail/{id}',[\App\Http\Controllers\NewsController::class,'newsDetail'])->name('news.detail');

Route::get('loadnews',[\App\Http\Controllers\NewsController::class,'loadNews'])->name('loadnews');

// authentication

Route::get('/home', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/news/add', [\App\Http\Controllers\NewsController::class,'addNews'])->middleware('auth');
Route::post('/news/add', [\App\Http\Controllers\NewsController::class,'insertNews'])->middleware('auth');
Route::get('/removenews/{id}', [\App\Http\Controllers\NewsController::class,'deleteNews'])->middleware('auth');
Route::get('password',function (){
    return \Illuminate\Support\Facades\Hash::make(12345678);
});
