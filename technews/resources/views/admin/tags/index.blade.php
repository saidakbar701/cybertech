@extends('admin.master')
    @section('content')
              <div class="col-3 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Tags</h4>
                    <a href="{{ route('admin.tags.create') }}" class="btn btn-success">Tag Add</a>
                   
                    
                  </div>
                  <div class="card-body">

                  @if(Session::has('success'))
                  <p class="alert alert-success text-white">{{ Session::get('success') }}</p>
                  @endif

                  @if(Session::has('delete'))
                  <p class="alert alert-danger text-white">{{ Session::get('delete') }}</p>
                  @endif

                    <table class="table">

                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tag name</th>
                          <th scope="col">Slug</th>
                          <th scope="col">Created At</th>
                          <th scope="col" colspan="3">Action</th>
                        </tr>
                       @foreach($tags as $tag)
                        <tr>
                          <th>{{ $tag->id }}</th>
                          <td>{{ $tag->name }}</td>
                          <td>{{ $tag->slug }}</td>
                          <td>{{ $tag->created_at }}</td>
                          <td>
                            <a href="{{ route('admin.tags.edit',$tag->id) }}" class="btn btn-warning">Edit</a>
                          </td>
                          <td>
                              <form action="{{ route('admin.tags.destroy',$tag->id) }}" method="POST">
                              @csrf
                                @method('DELETE')
                                  <input type="submit" onclick="return confirm('Ma\'lumot o\chirilsinmi?')" value="Delete" class="btn btn-danger">
                              </form>
                          </td>
                          <td>
                            <a href="{{ route('admin.tags.show',$tag->id) }}" class="btn btn-info">Detail</a>
                          </td>
                        </tr>
                        @endforeach
                    </table>


                    
                  </div>
                </div>
              </div>
    
    @endsection