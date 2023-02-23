<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;

use App\Models\Profilehistory;

use Carbon\carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('name', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/edit');
        
    }

    public function edit(Request $request)
    {
        
        $profile = Profile::find($request->id);
        if (empty($profile)){
            abort(404);
        }
    
        return view('admin.profile.edit', ['profile_form' =>$profile]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
    
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
    
        $profile->fill($profile_form)->save();
        
        
        $prohistory = new Profilehistory();
        $prohistory->profile_id = $profile->id;
        $prohistory->edited_at = Carbon::now();
        $prohistory->save();

        return redirect('admin/profile');
    }
}
