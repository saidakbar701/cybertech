<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

use Illuminate\Support\Str;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        // dd($request->all());

        $requestData = $request->all();

        $requestData['slug'] = Str::slug($requestData['name']);

        Tag::create($requestData);

        return redirect()->route('admin.tags.index')->with('success','Category updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {       
        $request->validate([
            'name' => 'required'
        ]);


        $requestData = $request->all();
        $requestData['slug'] = Str::slug($requestData['name']);

        $tag->update($requestData);

        return redirect()->route('admin.tags.index')->with('success','Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('delete','Tags deleted successfully');
    }
}
