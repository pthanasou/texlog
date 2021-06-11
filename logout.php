<?php
// ξεκινά session
session_start();
// καταστρέφει session και καλεί το header
session_destroy();
include("header.php"); 
?>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
   <script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(38.286903, 21.787307)
  };
  map = new google.maps.Map(document.getElementById('mymap'), mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>

<div id=mymap>

</div>
<br><br><br><br>
<?php

include ("footer.php");

?>