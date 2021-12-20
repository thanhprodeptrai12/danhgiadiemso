<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

Route::group(['prefix' => 'admin/', 'middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\RedirectController::class, 'list'])->name('home');
    Route::get('/view/{month}/{id}', [App\Http\Controllers\RedirectController::class, 'detail'])->name('detail.list');

    Route::get('/criteria', [App\Http\Controllers\CriteriaController::class, 'list'])->name('criteria');
    Route::post('/criteria/update', [App\Http\Controllers\CriteriaController::class, 'update'])->name('update');
    Route::post('/criteria/store', [App\Http\Controllers\CriteriaController::class, 'store'])->name('store');
    Route::get('/criteria/{id}/delete', [App\Http\Controllers\CriteriaController::class, 'delete'])->name('delete.criteria');

    Route::get('/point', [App\Http\Controllers\PointController::class, 'list'])->name('point');
    Route::get('/point/{id}', [App\Http\Controllers\PointController::class, 'detail'])->name('detail.point');
    Route::get('/update/point', [App\Http\Controllers\PointController::class, 'update'])->name('detail.update');
    Route::get('/store', [App\Http\Controllers\PointController::class, 'store']);
    Route::get('/point/{id}/delete', [App\Http\Controllers\PointController::class, 'delete'])->name('delete.point');

    Route::get('/user', [App\Http\Controllers\UserController::class, 'list'])->name('user');
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('store');
    Route::get('/user/{id}/hide', [App\Http\Controllers\UserController::class, 'hide'])->name('hide.user');
    Route::get('/user/{id}/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('delete.user');
    Route::get('/user/{id}/public', [App\Http\Controllers\UserController::class, 'public'])->name('public.user');
    
     //logout
    Route::get('/logout', function () {
        Session::flush();
        Auth::logout();
        return Redirect::to("/admin");
    });
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
