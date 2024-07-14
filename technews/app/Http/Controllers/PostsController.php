<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\CategoryPost;

use App\Models\Category;

use App\Models\Tag;

use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = CategoryPost::all();
        $categories = Category::all();
        return view('admin.posts.index', compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::paginate(3);
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validatsiya
    $requestData = $request->validate([
        'title' => 'required',
        'body' => 'required',
        'image' => 'required',
        'category_id' => 'required',
        'tags' => 'nullable|array'
    ]);

    // dd($request->all());

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('temp/img/'), $imageName);
        $requestData['image'] = $imageName;
    }

    $requestData['slug'] = Str::slug($requestData['title']);

    $tags = $requestData['tags'] ?? [];
    unset($requestData['tags']);

    $post = CategoryPost::create($requestData);

    if (!empty($tags)) {
        $post->tags()->attach($tags);
    }

    return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
}
    /**
     * Display the specified resource.
     */
    public function show(CategoryPost $post)
    {   
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryPost $post)
    {
        $categories = Category::all();
        $tags = Tag::paginate(3);
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryPost $post)
    {
        $requestData = $request->all();

        if(empty($request->ads)){
            $requestData['ads'] = 0;
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = time().".".$file->getClientOriginalExtension();
            $file->move('temp/img/',$image_name);
            $requestData['image'] = $image_name;
        }
        $requestData['slug'] = Str::slug($request->title);
        $post->update($requestData);
        $post->tags()->sync($request->tags);
        return redirect()->route('admin.posts.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryPost $post)
    {
        $post->delete();

        if($post->image != ""){
            $image = public_path('temp/img/'.$post->image);
            unlink($image);
        }

        return redirect()->route('admin.posts.index')->with('delete','Post deleted successfully');
    }

    
    
}
