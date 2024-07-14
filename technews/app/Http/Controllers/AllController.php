<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoryPost;

use Mail;
use App\Mail\Message;

class AllController extends Controller
{
    public function sendMail(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        // dd($request->all());
        $data = $request->all();
        Mail::to("saidakbarhasanovvuz@gmail.com")->send(new Message($data));
        return redirect()->back()->with(['success'=>'Message sended successfully']);
    }

    public function search(Request $request){
        $key = $request->key;
        $posts = CategoryPost::where('title','like','%'.$key.'%')
        ->orWhere('body','like','%'.$key.'%')->paginate(3);
        return view('search',compact('posts'));
    }
}
