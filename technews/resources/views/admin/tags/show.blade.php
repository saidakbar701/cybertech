@extends('admin.master')
            @section('content')
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tags Show</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Slug</th>
                          <th scope="col">Create At</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-center">
                          <td>{{ $tag->id }}</td>
                          <td>{{ $tag->name }}</td>
                          <td>{{ $tag->slug }}</td>
                          <td>{{ $tag->created_at }}</td>
                          
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @endsection