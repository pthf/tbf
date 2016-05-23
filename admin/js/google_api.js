var myCenter=new google.maps.LatLng(20.68202,-103.3990277);



function initialize() {
  var mapProp = {
    center: myCenter,
    zoom:15,
    scrollwheel: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

  var marker=new google.maps.Marker({
  	position:myCenter,
  });

  marker.setMap(map);

}

google.maps.event.addDomListener(window, 'load', initialize);
