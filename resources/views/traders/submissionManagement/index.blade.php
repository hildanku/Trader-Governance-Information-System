@extends('_voler.operators.master')

@section('content')
<div class="row" id="basic-table">
    <div class="col-12 col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">SubMission Management</h4>
            <div class="float-end">
              <a class="btn btn-success" href="{{ route('trader.submission.create') }}">Add</a>
            </div>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Business Name</th>
                    <th>Location Code</th>
                    <th>Status Submission</th>
                    {{-- <th>Reviewed By</th> --}}
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->businessName }}</td>
                        <td>{{ $data->locationCode }}</td>
                        <td>
                          @if ($data->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                          @elseif ($data->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                          @elseif ($data->status == 'rejected')
                            <span class="badge bg-danger">Rejected</span>
                          @endif
                          {{-- {{ $data->status }} --}}
                        </td>
                        {{-- <td>{{ $data->reviewedBy }}</td> --}}
                        <td>
                            <a class="btn btn-primary" href="{{ route('trader.submission.detail', $data->id) }}">Detail</a>
                            {{-- <button type="button" class="btn btn-danger btn-sm delete-btn" data-food-id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}">
                              Delete
                            </button> --}}
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
        <p>Are you sure you want to delete <strong>{{ $data->id }}</strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteForm{{ $data->id }}" action="{{ Route('trader.submission.destroy', $data->id) }}" method="POST">
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