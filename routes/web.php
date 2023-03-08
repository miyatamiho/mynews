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


use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    Route::get('news', 'index')->name('news.index');
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
    Route::get('news.delete', 'delete')->name('news.delete');
});

    
use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::post('profile/create', 'create')->name('profile.create');
    Route::post('profile/edit', 'update')->name('profile.update');
    Route::get('profile/create', 'add')->name('profile.add');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::get('profile', 'index')->name('profile.index');
    Route::post('profile/edit', 'update')->name('profile.update');
    Route::get('profile.delete', 'delete')->name('profile.delete');
});

use App\Http\Controllers\Admin\AnimalnewsController;
Route::controller(AnimalnewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::post('animalnews/create', 'create')->name('animalnews.create');
    Route::get('animalnews/create', 'add')->name('animalnews.add');
    Route::get('animalnews', 'index')->name('animalnews.index');
    Route::get('animalnews/edit', 'edit')->name('animalnews.edit');
    Route::post('animalnews/edit', 'update')->name('animalnews.update');
    Route::get('animalnews.delete', 'delete')->name('animalnews.delete');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NewsController as PublicNewsController;
    Route::get('/', [PublicNewsController::class, 'index'])->name('news.index');

use   App\Http\Controllers\ProfileController as PublicProfileController;
    Route::get('/profile', [PublicProfileController::class, 'index'])->name('profile.index');

use App\Http\Controllers\AnimalnewsController as PublicAnimalnewsController;
    Route::get('/animalnews', [PublicAnimalnewsController::class, 'index'])->name('animalnews.index');
    
    