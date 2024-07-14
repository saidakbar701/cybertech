@extends('admin.master')
    @section('content')
              <div class="col-3 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-info">Category Post</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Post Sarlavhasi</label>
                            <input type="text" value="{{ $post->title }}" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>To'lig' Ma'lumot</label>
                            <textarea name="body"  id="" class="form-control">{{ $post->title }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Post Rasmi</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('temp/img/'.$post->image) }}" alt="" width="200">
                        </div>

                        <div class="form-group">
                            <label>Kategoriya</label>
                            <select name="category_id" class="form-control" aria-label="Default select example">
                                <option selected>Kategoriya Tanlang</option>

                                @foreach ($categories as $category)
                                    <option {{ $post->category_id == $category->id ? "selected" : ""}} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                               
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]" class="form-control select2" multiple aria-label="Default select exemple">
          

                                @foreach ($tags as $tag)
                                    <option @if(in_array($tag->id, $post->tags->pluck('id')->toArray()))selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                               
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="control-label">Is This Ads?</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" {{ $post->ads == 1 ? "checked" : "" }} value="1" name="ads" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>

                       

                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Edit Post">
                        </div>
                    </form>
                  </div>
                </div>
              </div>

    @endsection