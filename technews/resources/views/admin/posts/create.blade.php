@extends('admin.master')
    @section('content')
              <div class="col-3 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-info">Category Post Add</h4>
                  </div>
                  <div class="card-body">
                    <form action = "{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Post Sarlavhasi</label>
                            <input type="text" name="title" class="form-control"></input>
                        </div>

                        <div class="form-group">
                            <label>To'lig' Ma'lumot</label>
                            <textarea name="body" id="body" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Post Rasmi</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Kategoriya</label>
                            <select name="category_id" class="form-control" aria-label="Default select example">
                                <option selected>Kategoriya Tanlang</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                               
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tag</label>
                            <select name="tags[]" class="form-control select2" multiple="" aria-label="Default select example">
                                

                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="control-label">Is This Ads?</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="ads" value="1" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>

                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Post">
                        </div>
                    </form>
                  </div>
                </div>
              </div>

    @endsection