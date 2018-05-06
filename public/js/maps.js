
function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(53.38028079999999,-2.596021599999972),mapTypeId: google.maps.MapTypeId.ROADMAP};
map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(53.38028079999999,-2.596021599999972)});
infowindow = new google.maps.InfoWindow({content:'<strong>Carbe Ltd</strong><br>Brunel House <br>340 Firecrest Court <br>Warrington Chesire<br>WA1 1RG <br><a href="http://carbe.co.uk/">www.carbe.co.uk</a> <br>'});
google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
