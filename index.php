<?php
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
  
  <?php
  $sql="select * from anafores limit 0,20";
  $res=mysql_query($sql);
  while($row=mysql_fetch_array($res))
  {
  
  echo "
  var pos=new google.maps.LatLng($row[y],$row[x]);
  
  marker = new google.maps.Marker({
    position: pos,
	map: map
  });
  ";
  }
  
  
  ?>
  
  
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>

<div id=mymap>

</div>
<a href='rss.php'>Μy RSS</a> 
<br><br><br><br>
<?php

include ("footer.php");

?> 