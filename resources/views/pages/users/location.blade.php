@extends('layouts.main')

@section('page-title', __('User Location'))

@section('title', __('User Location'))
@section('parent', __('Control Panel'))
@section('pointer', __('C.M'))
@section('parent-link', route('users.location'))
@section('pointer-link', route('users.location'))

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" />
@endsection
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('User Location') }}</h4>
            </div>

            <div class="card-body">

                <x-alert-component />

                <div id="map"></div>
                
                <button id="saveBtn" >Save</button>


              

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

<script>
    var map = L.map('map').setView([{{ $user->location()->first()->lat }}, {{ $user->location()->first()->long }}], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var marker = L.marker([{{ $user->location()->first()->lat }}, {{ $user->location()->first()->long }}], { draggable: true }).addTo(map);

    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
    });
    L.control.locate().addTo(map);
    map.on('locationfound', function(e) {
        var userLocation = e.latlng;
        marker.setLatLng(userLocation);
        map.setView(userLocation, 13); // Set the map view to the user's location
    });

    document.getElementById('saveBtn').addEventListener('click', function() {
        
        // Get the current coordinates of the marker
        var markerLatLng = marker.getLatLng();
        var lat = markerLatLng.lat;
        var lng = markerLatLng.lng;
        console.log(lat);
        //Livewire.emit('saveLocation', lat, lng);
        // Make an AJAX request to a controller method
        $.ajax({
     
            url: 'dashboard/store-location',
            method: 'POST',
            data: {
                lat: lat,
                lng: lng
            },
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
            success: function(response) {
                console.log('Coordinates saved successfully');
            },
            error: function(xhr, status, error) {
                console.error('Error saving coordinates');
            }
        });
        

      
    });

</script>
@endsection
