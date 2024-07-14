<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Tag;

use App\Models\CategoryPost;

class MainController extends Controller
{
    public function index(){
        
        return view('home');
    }


    public function contact(){
        return view('contact');
    }


    public function categoryPosts($slug){
        $category = Category::where('slug',$slug)->first();
        return view('category',compact('category'));
    }

    public function postDetail($slug)
    {
        $posts = CategoryPost::where('slug', $slug)->first();
        $posts->increment('view');
        $posts->save();
        $otherPosts = CategoryPost::where('category_id',$posts->category_id)
        ->where('id','!=',$posts->id)
        ->orderBy('view','DESC')
        ->limit(6)
        ->get();
        $tags = Tag::all();
        return view('postDetail',compact('posts','tags','otherPosts'));
    }


    public function dashboard(){
        return view('admin.dashboard');
    }
}