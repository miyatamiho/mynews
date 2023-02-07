<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function add()
    {
        return view('admin.news.create');
    }
}

use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->group(function() {
    Route::get('news/create', 'add');
});



Route::controller(AAAController::class)->group(function()
{
    Route::get('XXX','bbb');
    
});

