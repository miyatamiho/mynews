<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(Request $requerst)
    {
        $posts = Profile::all()->sortByDesc('update_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
    
    return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
