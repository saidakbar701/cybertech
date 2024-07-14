@extends('admin.master')
    @section('content')
<div class="col-6 col-md-6 col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4>All Category Posts</h4>
      <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Add Post</a>                   
    </div>
    @if(Session::has('success'))
    <p class="alert alert-success text-white">{{ Session::get('success') }}</p>
    @endif

    @if(Session::has('delete'))
    <p class="alert alert-danger text-white">{{ Session::get('delete') }}</p>
    @endif
    <div class="card-body">
      <table class="table">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Post Title</th>
            <th scope="col">Title</th>
            <th scope="col">Created At</th>
            <th scope="col">Image</th>
            <th colspan="3">Action</th>
          </tr>
          
            <tr>
            
              @foreach ($posts as $post)
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ Str::limit($post->body,140) }}</td>
                  <td>{{ $post->created_at }}</td>
                  <td>
                      <img src="{{ asset('temp/img/'.$post->image) }}" alt="" width="200">
                  </td>
                  <td>
                      <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-warning">Edit</a>
                  </td>
                  <td>
                      <form action="{{ route('admin.posts.destroy',$post->id) }}" method="POST">
                      @csrf
                          @method('DELETE')
                          <input type="submit" onclick="return confirm('Ma\'lumot o\chirilsinmi?')" value="Delete" class="btn btn-danger">
                      </form>
                  </td>
                  <td>
                      <a href="{{ route('admin.posts.show',$post->id) }}" class="btn btn-info">Detail</a>
                  </td>
              
              </tr>
              @endforeach
      </table>
    </div>
  </div>
</div>
    
    @endsection