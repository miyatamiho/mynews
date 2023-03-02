<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Animalnews;

use App\Models\Animalhistory;

use Carbon\Carbon;

class AnimalnewsController extends Controller
{
    //  
    public function add()
    {
        return view('admin.animalnews.create');
    }
    
    public function create(Request $request)
    {
        
        $this->validate($request, Animalnews::$rules);
        
        $animalnews = new Animalnews;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $animalnews->image_path = basename($path);
        } else {
            $animalnews->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $animalnews->fill($form);
        $animalnews->save();
        
        return redirect('admin/animalnews/create');
    }
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
            if ($cond_title != '') {
        
        $posts = Animalnews::where('title' , $cond_title)->get();
            } else {
        
        $posts = Animalnews::all();
    }
        return view('admin.animalnews.index' , ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        $animalnews = Animalnews::find($request->id);
        if (empty($animalnews)){
            abort(404);
        }
        return view('admin.animalnews.edit', ['animalnewsnews_form' =>$animalnews]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Animalnews::$rules);
        $animalnews = Animalnews::find($request->id);
        $animalnews_form = $request->all();
        
        if ($request->remove == 'true'){
            $animalnews_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $animalnews_form['image_path'] = basename($path);
        } else {
            $animalnews_form['image_path'] = $news->image_path;
        }
        
        unset($animalnews_form['image']);
        unset($animalnews_form['remove']);
        unset($animalnews_form['_token']);
        
        $animalnews->fill($animalnews_form)->save();
        
        $animalhistory = new Animalhistory();
        $animalhistory->animalnews_id = $animalnews->id;
        $animalhistory->edited_at = Carbon::now();
        $animalhistory->save();
        
        return redirect('admin/animalnews');
    
    }
public function delete(Request $request)
{
        $animalnews = Animalnews::find($request->id);
        $animalnews->delete();
        return redirect('admin/animalnews/');
}
}


