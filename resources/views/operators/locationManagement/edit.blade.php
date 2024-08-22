@extends('_voler.operators.master')

@section('content')

<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add new location</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" action="{{ route('operator.locations.update', $data->id) }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Location Code</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="locationCode" value="{{ $data->locationCode }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Location Description</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="locationDescription" value="{{ $data->locationDescription }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Location Latitude</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" id="locationLatitude" name="locationLatitude" value="{{ $data->locationLatitude }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Location Longitude</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" id="locationLongitude" name="locationLongitude" value="{{ $data->locationLongitude }}" readonly>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pick your location</h4>
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

        map.on('click', function(e) {
            const lngLat = e.lngLat;
            document.getElementById('locationLatitude').value = lngLat.lat;
            document.getElementById('locationLongitude').value = lngLat.lng;

            marker.setLngLat(lngLat);
        });
    });
</script>
@endsection