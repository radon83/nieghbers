<div>
    <div id="map" style="height: 400px;"></div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        var map = L.map('map').setView([{{ $latitude }}, {{ $longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy: <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([{{ $latitude }}, {{ $longitude }}], {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function(event) {
            var newPosition = marker.getLatLng();
            @this.set('latitude', newPosition.lat);
            @this.set('longitude', newPosition.lng);
        });

        window.livewire.on('locationUpdated', (data) => {
            marker.setLatLng([data.latitude, data.longitude]);
            map.setView([data.latitude, data.longitude], 13);
        });
    });
</script>
