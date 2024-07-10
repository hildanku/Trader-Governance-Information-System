<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Submission Details</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .badge { padding: 5px 10px; border-radius: 3px; }
        .bg-warning { background-color: #ffc107; }
        .bg-success { background-color: #28a745; }
        .bg-danger { background-color: #dc3545; }
    </style>
</head>
<body>
    <h1>Submission #{{ $data->id }} | {{ $data->businessName }}</h1>
    <p>Business Name: {{ $data->businessName }}</p>
    <p>Owned by: {{ $data->businessOwner }}</p>
    <p>Location Code: {{ $data->locationCode }}</p>
    <p>Submission Status:
        @if ($data->status == 'pending')
            <span class="badge bg-warning">Pending</span>
        @elseif ($data->status == 'approved')
            <span class="badge bg-success">Approved</span>
        @elseif ($data->status == 'rejected')
            <span class="badge bg-danger">Rejected</span>
        @endif
    </p>
    <hr>
    <p>Issued At : {{ $data->issuedAt }}</p>
    <p>Expired At : {{ $data->expiredAt }}</p>
    <p>Reviewed By: {{ $data->fullname }}</p>
</body>
</html>
