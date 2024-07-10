@extends('_voler.operators.master')

@section('content')
<div class="row" id="basic-table">
    <div class="col-12 col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Submission Management</h4>
            <div class="float-end">
              <a class="btn btn-success" href="{{ route('operator.submission.create') }}">Add</a>
            </div>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Business ID</th>
                    <th>Submitted By</th>
                    <th>Located In</th>
                    <th>Status</th>
                    <th>Reviewed By</th>
                    <th>Submission Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->businessName }}</td>
                        <td>{{ $data->submittedBy }}</td>
                        <td>{{ $data->locationCode }}</td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->fullname }}</td>
                        <td>{{ $data->created_at }}</td>                      
                        <td>
                          {{-- <button type="button" 
                          class="btn btn-success btn-sm delete-btn" 
                          data-food-id="{{ $data->id }}" 
                          data-bs-toggle="modal" 
                          data-bs-target="#approveModal{{ $data->id }}">
                            Approve
                          </button> --}}
                          @if($data->status == 'pending')
                          <button type="button" 
                            class="btn btn-success btn-sm approve-btn" 
                            data-submission-id="{{ $data->id }}" 
                            data-bs-toggle="modal" 
                            data-bs-target="#approveModal{{ $data->id }}">
                            Approve
                          </button>
                          <button type="button" 
                          class="btn btn-danger btn-sm reject-btn" 
                          data-submission-id="{{ $data->id }}" 
                          data-bs-toggle="modal" 
                          data-bs-target="#rejectModal{{ $data->id }}">
                          Reject
                        </button>
                          @endif
                            {{-- <a class="btn btn-warning" href="{{ route('operator.areas.edit', $data->id) }}">Edit</a> --}}
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
  @foreach ($datas as $data)
<!-- Approve Modal -->
<div class="modal fade" id="approveModal{{ $data->id }}" tabindex="-1" aria-labelledby="approveModalLabel{{ $data->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="approveModalLabel{{ $data->id }}">Approve Submission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to approve this submission?</p>
        <p><strong>Business ID:</strong> {{ $data->businessId }}</p>
        <p><strong>User ID:</strong> {{ $data->userId }}</p>
        <p><strong>Location ID:</strong> {{ $data->locationId }}</p>
        <p><strong>Status:</strong> {{ $data->status }}</p>
        <p><strong>Reviewed By:</strong> {{ $data->reviewedBy }}</p>
        <p><strong>Created At:</strong> {{ $data->created_at }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="{{ route('operator.submission.approve', $data->id) }}" method="POST">
          @csrf
          @method('POST')
          <button type="submit" class="btn btn-success">Approve</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@foreach ($datas as $data)
<!-- Approve Modal -->
<div class="modal fade" id="rejectModal{{ $data->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $data->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel{{ $data->id }}">Reject Submission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to reject this submission?</p>
        <p><strong>Business ID:</strong> {{ $data->businessName }}</p>
        <p><strong>User ID:</strong> {{ $data->userId }}</p>
        <p><strong>Location ID:</strong> {{ $data->locationCode }}</p>
        <p><strong>Status:</strong> {{ $data->status }}</p>
        <p><strong>Reviewed By:</strong> {{ $data->fullname }}</p>
        <p><strong>Created At:</strong> {{ $data->created_at }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="{{ route('operator.submission.reject', $data->id) }}" method="POST">
          @csrf
          @method('POST')
          <button type="submit" class="btn btn-success">Reject</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
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
        {{-- <form id="deleteForm{{ $data->id }}" action="{{ Route('operator.areas.destroy', $data->id) }}" method="POST">
          @csrf
          @method('POST')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form> --}}
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
      $('.approve-btn').click(function() {
      var id = $(this).data('submission-id');
      $('#approveModal' + id).modal('show');
    });
    });
</script>
@endsection