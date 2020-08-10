var lat , long , output;
(function getuserloction() {
    if (!navigator.geolocation){
        console.log("Geolocation is not supported by your browser");
        return;
    }
    console.log("Locating");
    function success(position) {
        // Current Location of User
        lat  = position.coords.latitude;
        long = position.coords.longitude;

        console.log('latitude:- '  + lat);
        console.log('longitude:- ' + long);
    }
    function error() {
        console.log("Unable to retrieve your location");
    }
    navigator.geolocation.getCurrentPosition(success, error);
}());
var myCenter = new google.maps.LatLng(29.995672900000002, 31.397388600000003);
function initialize() {
    var mapProp = {
        center: myCenter,
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    var marker = new google.maps.Marker({
        position: myCenter,
        draggable: true
    });
    google.maps.event.addListener(marker, 'dragend', function() {
        var pos = marker.getPosition();
        vue._data.fData.latitude = pos.lat();
        vue._data.fData.longitude = pos.lng();
        vue._data.fData.zoom = map.getZoom();
    });
    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
