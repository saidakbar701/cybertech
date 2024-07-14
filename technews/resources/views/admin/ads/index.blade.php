@extends('admin.master')
    @section('content')
<div class="col-6 col-md-6 col-lg-12">
  <div class="card">
    <div class="card-header">
      <h4>All Category Posts</h4>
      <a href="{{ route('admin.ads.create') }}" class="btn btn-success">Add Post</a>                   
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
            <th scope="col">Title</th>
            <th scope="col">Url</th>
            <th scope="col">Image</th>
            <th colspan="3">Action</th>
          </tr>
          
            <tr>
            
              @foreach($ads as $ad)
                  <td>{{ $ad->id }}</td>
                  <td>{{ $ad->title }}</td>
                  <td>{{ $ad->url }}</td>
                  <td>
                      <img src="{{ asset('temp/img/'.$ad->image) }}" alt="" width="200">
                  </td>
                  <td>
                      <a href="{{ route('admin.ads.edit',$ad->id) }}" class="btn btn-warning">Edit</a>
                  </td>
              @endforeach
              </tr>
              
      </table>
    </div>
  </div>
</div>
    
    @endsection