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
Route::controller(ProfileController::class)->prefix('admin','profile','create')->group(function() {
    Route::get('news/create', 'add');
    
Route::controller(ProfileController::class)->prefix('admin','profile','edit')->group(function(){
    Route::get('news/create','edit');
    
});



Route::controller(AAAController::class)->group(function()
{
    Route::get('XXX','bbb');
    
});


