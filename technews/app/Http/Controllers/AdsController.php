<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ads;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Ads::all();
        return view('admin.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'url'=>'required'
        ]);

        // dd($request->all()); 

        $requestData = $request->all();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = rand().".".$file->getClientOriginalExtension();
            $file->move('temp/img/',$image_name);
            $requestData['image'] = $image_name;
        }
            Ads::create($requestData);

            return redirect()->route('admin.ads.index')->with('success','Ads created successfully');
    }


    public function edit(Ads $ad)
    {
        return view('admin.ads.edit',compact('ad'));
    }


    public function update(Request $request,Ads $ad)
    {

        $requestData = $request->all();

        if($ad->image != ""){
            $image = public_path('temp/img/'.$ad->image);
            unlink($image);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name1 = rand().".".$file->getClientOriginalExtension();
            $file->move('temp/img/',$image_name1);
            $requestData['image'] = $image_name1;
        }
            $ad->update($requestData);

            return redirect()->route('admin.ads.index')->with('success','Ads updated successfully');
    }
}
