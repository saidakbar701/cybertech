@extends('admin.master')
    @section('content')
              <div class="col-3 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-info">Advertaisment</h4>
                    <a href="{{ route('admin.ads.index') }}" class="btn btn-info btn-sm float-right">Back</a>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"></input>
                        </div>

                        <div class="form-group">
                            <label>Url</label>
                            <input type="text" name="url" class="form-control"></input>
                        </div>

                        <div class="form-group">
                            <label>Ads Rasmi</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <!--  -->

                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add Ads">
                        </div>
                    </form>
                  </div>
                </div>
              </div>

    @endsection