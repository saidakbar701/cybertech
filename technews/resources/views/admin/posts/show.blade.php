            @extends('admin.master')
            @section('content')
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Show</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Last</th>
                          <th scope="col">Image</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{ $post->id }}</td>
                          <td>{{ $post->body }}</td>
                          <td>{{ $post->title }}</td>
                          <td>
                          <img src="{{ asset('temp/img/'.$post->image) }}" alt="" width="200">
                          </td>
                          
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @endsection