var latitude = 32.166351;
var longitude = 74.195900;
var mapId = 'model-map';
var searchId = 'model-address';
var latElement = 'model-latitude';
var lngElement = 'model-longitude';
var allowGeoRecall = true;
var id;
var latt;
var longg;
var add;
$(document).ready(function() {
    $('#register-map-model').on('show.bs.modal', function(event) {
        id = event.relatedTarget.id;
        if(id == "from"){
            latt = '.latitude';
            longg = '.longitude';
            add = '.from';
        } else {
            latt = '.latitude2';
            longg = '.longitude2';
            add = '.to';
        }
        latitude = ($(latt).val()).length > 0 ? $(longg).val() : latitude;
        longitude = ($(latt).val()).length > 0 ? $(longg).val() : longitude;
        $('#model-address').val($(add).val());
        initAutocomplete();
    });
});


function getCurrentPosition() {
    if(id == "from"){
        $('#from').val('');
        $('#latitude').val('');
        $('#longitude').val('');
    } else {
        $('#to').val('');
        $('#latitude').val('');
        $('#longitude').val('');
    }

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, positionError);
    } else {
        alert("Sorry, your browser does not support HTML5 geolocation.");
    }
}

function positionError() {
    alert('Geolocation is not enabled. Please enable to use this feature');
}

function showPosition(position) {
    var google_map_pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    var google_maps_geocoder = new google.maps.Geocoder();
    google_maps_geocoder.geocode(
        { 'latLng': google_map_pos },
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK && results[0]) {
                $('#model-address').val(results[0].formatted_address);
                lat = [position.coords.latitude];
                long = [position.coords.longitude];
                latitude = lat;
                longitude = long;
                document.getElementById(latElement).value = lat;
                document.getElementById(lngElement).value = long;
                initAutocomplete();
            }
        }
    );
    allowGeoRecall = false;
}

function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById(mapId), {
        center: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
        zoom: 13,
        mapTypeId: 'roadmap'
    });
    var marker = new google.maps.Marker({
        position: {
            lat: parseFloat(latitude), lng: parseFloat(longitude)
        },
        map: map,
        draggable: true
    });
    var searchBox = new google.maps.places.SearchBox(document.getElementById(searchId));
    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for (i = 0; place = places[i]; i--) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }

        map.fitBounds(bounds);
        map.setZoom(15);

    });

    google.maps.event.addListener(marker, 'position_changed', function() {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        document.getElementById(latElement).value = lat;
        document.getElementById(lngElement).value = lng;
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        const latlng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng),
        };

        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: latlng }, (results, status) => {
            if (status === "OK") {
                if (results[0]) {
                    document.getElementById(searchId).value = results[0].formatted_address
                } else {
                    window.alert("No results found");
                }
            } else {
                window.alert("Geocoder failed due to: " + status);
            }
        });
    });
}
function saveMapInformation() {
    if(id == "from"){
        $('.latitude').val($('#model-latitude').val());
        $('.longitude').val($('#model-longitude').val());
        $('.from').val($('#model-address').val());
    } else {
        $('.latitude2').val($('#model-latitude').val());
        $('.longitude2').val($('#model-longitude').val());
        $('.to').val($('#model-address').val());
    }

    // $('#register-map-model').modal('toggle');
}
