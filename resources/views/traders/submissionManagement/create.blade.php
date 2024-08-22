@extends('_voler.traders.master')

@section('content')

<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Data</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" action="{{ route('trader.submission.store') }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Business ID</label>
                                    </div>
                                    <fieldset class="form-group">
                                        <select name="businessId" class="form-select" id="businessSelect">
                                            @foreach ($dataBusiness as $business)
                                            <option value="{{ $business->id }}">{{ $business->id }} - {{ $business->businessName }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <div class="col-md-4">
                                        <label>Location ID</label>
                                    </div>
                                    <fieldset class="form-group">
                                        <select name="locationId" class="form-select" id="locationSelect">
                                            @foreach ($dataLocations as $location)
                                            <option value="{{ $location->id }}" data-lat="{{ $location->locationLatitude }}" data-lng="{{ $location->locationLongitude }}">{{ $location->id }} - {{ $location->locationCode }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <input type="hidden" id="locationLatitude" name="locationLatitude">
                                    <input type="hidden" id="locationLongitude" name="locationLongitude">
                                    <input type="hidden" name="userId" value="{{ $dataId }}">
                                    {{-- <input type="hidden" name="reviewedBy" value="1"> --}}
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

        const locationSelect = document.getElementById('locationSelect');
        const initialOption = locationSelect.options[locationSelect.selectedIndex];
        const initialLat = parseFloat(initialOption.dataset.lat);
        const initialLng = parseFloat(initialOption.dataset.lng);

        const map = new maplibregl.Map({
            container: 'map',
            style: `https://maps.geo.${region}.amazonaws.com/maps/v0/maps/${mapName}/style-descriptor?key=${apiKey}`,
            center: [initialLng, initialLat],
            zoom: 17
        });

        map.addControl(new maplibregl.NavigationControl(), 'top-left');

        const marker = new maplibregl.Marker()
            .setLngLat([initialLng, initialLat])
            .addTo(map);

        document.getElementById('locationLatitude').value = initialLat;
        document.getElementById('locationLongitude').value = initialLng;

        locationSelect.addEventListener('change', function(e) {
            const selectedOption = e.target.options[e.target.selectedIndex];
            const lat = parseFloat(selectedOption.dataset.lat);
            const lng = parseFloat(selectedOption.dataset.lng);

            document.getElementById('locationLatitude').value = lat;
            document.getElementById('locationLongitude').value = lng;

            map.setCenter([lng, lat]);
            marker.setLngLat([lng, lat]);
        });

        map.on('click', function(e) {
            const lngLat = e.lngLat;
            document.getElementById('locationLatitude').value = lngLat.lat;
            document.getElementById('locationLongitude').value = lngLat.lng;

            marker.setLngLat(lngLat);
        });
    });
</script>
@endsection
