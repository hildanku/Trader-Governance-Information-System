@extends('_voler.operators.master')

@section('content')
<div class="row" id="basic-table">
    <div class="col-12 col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">User Management</h4>
            <div class="float-end">
              <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>
            </div>
        </div>
        <div class="card-content">
          {{-- <div class="d-flex float-end">
            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Adsd</a>
          </div> --}}
          <div class="card-body">
            {{-- <p class="card-text">Using the most basic table up, here’s how
              <code>.table</code>-based tables look in Bootstrap. You can use any example
              of below table for your table and it can be use with any type of bootstrap tables.</p> --}}
            <!-- Table with outer spacing -->
            {{-- <a href="{{ route('operators.userManagement.create') }}" class="btn btn-primary">Add User</a> --}}
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->fullname }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            {{-- <a href="{{ route('operators.userManagement.show', $data->id) }}" class="btn btn-primary">View</a> --}}
                            {{-- <a href="{{ route('operators.userManagement.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('operators.userManagement.destroy', $data->id) }}" class="btn btn-danger">Delete</a> --}}
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection