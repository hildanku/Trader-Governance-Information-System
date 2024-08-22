@extends('_voler.traders.master')

@section('content')

<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Data - Submission #{{ $data->id }} | {{ $data->businessName }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {{-- <form class="form form-horizontal" method="POST" action="{{ route('trader.business.update', $data->id) }}"> --}}
                            {{-- @csrf
                            <div class="form-body"> --}}
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <label>Business Name</label>
                                    </div> --}}
                                    <p>Business Name: {{ $data->businessName }}</p>
                                    <p>Business Name: {{ $data->businessType }}</p>
                                    <p>Location Code: {{ $data->locationCode }}</p>
                                    <p>Reviewed By: {{ $data->fullname }}</p>
                                    <p>Submission Status:
                                        @if ($data->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif ($data->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif ($data->status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                        {{-- {{ $data->status }} --}}
                                    </p>

                                    {{-- <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="businessName" value="{{ $data->businessName }}" required>
                                    </div> --}}
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        @if ($data->status == 'approved')
                                        <a href="{{ route('printPdf', $data->id) }}" class="btn btn-primary me-1 mb-1">Print</a>
                                        @elseif ($data->status == 'rejected')
                                        <button type="submit" class="btn btn-primary me-1 mb-1" disabled>Print</button>
                                        @endif
                                        <a href="{{ route('trader.submission') }}" class="btn btn-dark me-1 mb-1">Back</a>
                                        {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                    </div>
                                </div>
                            {{-- </div> --}}
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Location Map</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div id="map" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://unpkg.com/maplibre-gl@3.x/dist/maplibre-gl.js"></script>
<link href="https://unpkg.com/maplibre-gl@3.x/dist/maplibre-gl.css" rel="stylesheet" />

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const apiKey = "{{ env('ALS_API_KEY') }}";
        const mapName = "{{ env('ALS_MAP_NAME') }}";
        const region = "{{ env('ALS_REGION') }}";

        const lat = {{ $data->locationLatitude }};
        const lng = {{ $data->locationLongitude }};

        const map = new maplibregl.Map({
            container: 'map',
            style: `https://maps.geo.${region}.amazonaws.com/maps/v0/maps/${mapName}/style-descriptor?key=${apiKey}`,
            center: [lng, lat],
            zoom: 17
        });

        map.addControl(new maplibregl.NavigationControl(), 'top-left');

        const marker = new maplibregl.Marker()
            .setLngLat([lng, lat])
            .addTo(map);
    });
</script>
@endsection