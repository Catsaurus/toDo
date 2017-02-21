
function myMap() {

    var myCenter = new google.maps.LatLng(58.378991, 26.714598);
    var elephantLoc = new google.maps.LatLng(58.378189, 26.714668);

    var mapProp = {center:myCenter, zoom:16};
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
            position: elephantLoc,
            animation: google.maps.Animation.BOUNCE,
            icon: "../Asset/img/elephant.png"
        });
    marker.setMap(map);

    google.maps.event.addListener(marker,'click', function() {
        var messageWindow = new google.maps.InfoWindow({content:"Tere!"});
        messageWindow.open(map,marker);});
}