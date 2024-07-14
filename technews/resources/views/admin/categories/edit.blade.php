@extends('admin.master')
    @section('content')
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-info">Category Edit Form</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
                    @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" value="{{ $category->name }}" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Category">
                        </div>
                    </form>
                  </div>
                </div>
              </div>

    @endsection