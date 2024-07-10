@extends('_voler.operators.master')

@section('content')
<div class="row" id="basic-table">
    <div class="col-12 col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Location Management</h4>
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
                    <th>Location Code</th>
                    <th>Location Description</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Area ID</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->locationCode }}</td>
                        <td>{{ $data->locationDescription }}</td>
                        <td>{{ $data->locationLatitude }}</td>
                        <td>{{ $data->locationLongitude }}</td>
                        <td>{{ $data->areaName }}</td>
                        <td>
                            {{-- <a href="{{ route('operators.userManagement.show', $data->id) }}" class="btn btn-primary">View</a> --}}
                            {{-- <a href="{{ route('operators.userManagement.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('operators.userManagement.destroy', $data->id) }}" class="btn btn-danger">Delete</a> --}}
                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-food-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}">
                              Delete
                            </button>
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
    <!-- Modal -->
@foreach ($datas as $data)
<div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel{{ $data->id }}">Delete Food</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete <strong>{{ $data->locationCode }}</strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteForm{{ $data->id }}" action="{{ Route('operator.locations.destroy', $data->id) }}" method="POST">
          @csrf
          @method('POST')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $('.delete-btn').click(function() {
          var id = $(this).data('food-id');
          var foodName = $(this).closest('tr').find('td:first').text().trim(); // Get food name from the first td of the current row
          $('#deleteModalLabel' + id).text('Delete Food');
          $('#deleteModal' + id).modal('show');
      });
    });
</script>
@endsection