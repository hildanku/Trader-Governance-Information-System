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
                                    <p><>Business Name:</> {{ $data->businessName }}</p>
                                    <p><>Location Code:</> {{ $data->locationCode }}</p>
                                    <p><>Reviewed By:</> {{ $data->fullname }}</p>
                                    <p><>Submission Status:</> {{ $data->status }}</p>

                                    {{-- <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="businessName" value="{{ $data->businessName }}" required>
                                    </div> --}}
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Print</button>
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
        const apiKey = "v1.public.eyJqdGkiOiJmODVlNzExZC03MWE3LTQ3OTAtYWZjZC02ODBiOGM4OWMyMDYifZFF0YWJCtRWl0RrmK_4rEYz6RInVI3fmIXdAaleFg9o9pbDhc7A7VZ9VA-En-de2_zXaYIuup-b5a9EpTdbf-BjCSlN7yF8Bla8P2Gi-GqEQgokj9zLRDFJqYyDpqQM-xbL0ywbDL9i2pvB0uJeVmwKyce33xHDowN3GND2R9Ir1at4QRcuUMYBpljIUMTeH7pZXqgySRRQJYSK8gZ_gSZIPJGsAbTrXtZBaeeCTyaneCVCTnlGO914VbHrcH2td7LMYSl9MVggr-2Mawun6MRbrlsJ-p5ebCPXzoTaiEC963lHH4XRTx9-HENIFRIzIJrwCMHNrQMlwoDDX3Uec3M.ZWU0ZWIzMTktMWRhNi00Mzg0LTllMzYtNzlmMDU3MjRmYTkx";
        const mapName = "sisfo_tatakelolapedagang";
        const region = "us-east-1";

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