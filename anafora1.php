<?php
include ("header.php");
echo "<div id=main style='height:800px;'>";


// αν έχω πατήσει save
if (isset($_POST['save']))
{

$f1=""; $f2=""; $f3=""; $f4=""; 
// αν έχω δώσει το αρχείο foto1 τότε
	if ($_FILES['foto1']['name']!="")
	{
	
	// παίρνω ένα τυχαίο αριθμό ώστε να μην έχω ίδιο ποτέ όνομα αρχείου
	$n=rand(1000,9999);
	
	// το βάζω στο όνομα του αρχείου μπροστά
	$f1=$n.$_FILES['foto1']['name'];
	
	// ανεβάζω το αρχείο στο φάκελο upload με το νέο όνομα
	move_uploaded_file($_FILES['foto1']['tmp_name'],"upload/".$f1);
    
	}
	
	// το ίδιο και στα αλλά αρχεία
	if ($_FILES['foto2']['name']!="")
	{
	// παίρνω ένα τυχαίο αριθμό ώστε να μην έχω ίδιο ποτέ όνομα αρχείου
	$n=rand(1000,9999);
	
	// το βάζω στο όνομα του αρχείου μπροστά
	$f2=$n.$_FILES['foto2']['name'];
	move_uploaded_file($_FILES['foto2']['tmp_name'],"upload/".$f2);
	
	}
	if ($_FILES['foto3']['name']!="")
	{
	// παίρνω ένα τυχαίο αριθμό ώστε να μην έχω ίδιο ποτέ όνομα αρχείου
	$n=rand(1000,9999);
	
	// το βάζω στο όνομα του αρχείου μπροστά
	$f3=$n.$_FILES['foto2']['name'];
	move_uploaded_file($_FILES['foto3']['tmp_name'],"upload/".$f3);
	
	}
	if ($_FILES['foto4']['name']!="")
	{
	// παίρνω ένα τυχαίο αριθμό ώστε να μην έχω ίδιο ποτέ όνομα αρχείου
	$n=rand(1000,9999);
	
	// το βάζω στο όνομα του αρχείου μπροστά
	$f4=$n.$_FILES['foto4']['name'];
	move_uploaded_file($_FILES['foto4']['tmp_name'],"upload/".$f4);
	 
	}
	
	
	// εκτελώ το ερώτημα με τα στοιχεία της φόρμας και των αρχείων
	
	$sql="INSERT INTO anafores (
	perigrafi ,x ,y ,xronos_anathesis ,
	epilisis,photo1 ,photo2 ,photo3 ,photo4,
	katigoria ,email_user
	)
	VALUES (
	 '$_POST[perigrafi]', '$_POST[mikos]', '$_POST[platos]', NOW(), 0, 
	 '".$f1."', '".$f2."', '".$f3."','".$f4."', 
	 '$_POST[katigoria]', '$_SESSION[email]'
	)";

	// εκτελώ το ερώτημα
	if (mysql_query($sql)) echo "Η αναφορά καταχωρήθηκε";
	else echo "Λάθος στην καταχώρηση";

}
else
{



echo "
<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true'></script>
  <script>
  
  // από το google
  // ορίζω μια μεταβλητή για το χάρτη και το marker
var map;
 var marker;
 
 // η βασική συνάρτηση για αρχικοποίηση του χάρτη
function initialize() {

   // οι παράμετροι του χάρτη
  var mapOptions = {
    zoom: 16,
	
  };
  
   map = new google.maps.Map(document.getElementById('mymap2'), mapOptions);
  // αν με βρεί δυνατότητα geolocation τότε
   if(navigator.geolocation) {
   
   // προσδιορίζει την θέση μου
    navigator.geolocation.getCurrentPosition(function(position) {
	
	// ορίζει νέα θέση
      var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

	// ορίζει ένα marker στη θέση αυτή για τον χάρτη map
     marker = new google.maps.Marker({
        map: map,
        position: pos
      });
	  
	 // και στα αντικείμενα της φόρμας mikos, platos εμφανίζει τις τιμές latidute και longitude
      document.getElementById('mikos').value=pos.lng();
	   document.getElementById('platos').value=pos.lat();
      map.setCenter(pos);
    }, function() {
	
	// αν δεν λειτουργήσει τότε βάλε θέση την 
       map.setCenter(new google.maps.LatLng(38.287496, 21.786929));
	   document.getElementById('mikos').value=21.786929;
	   document.getElementById('platos').value=38.287496;
	     marker = new google.maps.Marker({
        map: map,
        position: pos
      });
    });
  } else {
      // αν δεν υπάρχει καθόλου geolocation τότε βάλε θέση την 
       map.setCenter(new google.maps.LatLng(38.287496, 21.786929));
	   document.getElementById('mikos').value=21.786929;
	   document.getElementById('platos').value=38.287496;
	     marker = new google.maps.Marker({
        map: map,
        position: pos
      });
  }
  
 
 // αν κάνω click στο χάρτη τότε πρόσθέτω μέσω της addmarker ένα νέο marker
   google.maps.event.addListener(map, 'click', function(event) {
    addmarker(event.latLng);
  });
}



function addmarker(location)
{
// στα αντικείμενα mikos, platos δίνει τις νέες τιμές
 document.getElementById('mikos').value=location.lng();
	   document.getElementById('platos').value=location.lat();
	  
	  // σβίνει τον παλιό marker
	   marker.setMap(null);
	   
	   // βάζει νέο marker
  marker = new google.maps.Marker({
        map: map,
        position: location
      });

}



google.maps.event.addDomListener(window, 'load', initialize);

    </script>
 ";
 
 // Η φόρμα καταχώρησης που περιέχει και το id=mymap2 που είναι ο χάρτης και μεταφέρει και αρχεία (multipart/form-data)
 echo "
 
   <form action='' method=post enctype='multipart/form-data'>
   <br>
   <table>
   <tr><td><div id=mymap2 ></div></td>
   <td valign=top>
   Γεωγραφικό Μήκος :<br><input type=text required name=mikos id=mikos><br>
   Γεωγραφικό Πλάτος:<br><input type=text required name=platos id=platos>
   </td>
   </tr></table>
   
   Περιγραφή:<br>
   <textarea name=perigrafi required cols=40 rows=5></textarea><br>
   
   Κατηγορία<br>
   <select name=katigoria>
   ";
   
   
   // επιλέγει όλες τις κατηγόρίες από τον πίκακα και τις κανει option για την αναφορά
   $sql="select * from katigories";
   $res=mysql_query($sql);
   while($row=mysql_fetch_array($res))
   {
   echo "<option>$row[katigoria]</option>";
   }
   
   
   // κλείνει το select της κατηγορίας και μας δίνει δυνατότητα για 4 φωτογραφίες και από κάμερα κινητού
   echo "
   </select><br><br>
   Φωτογραφίες:<br>
   <input type=file name=foto1 accept='image/*' capture='camera'><br>
   <input type=file name=foto2 accept='image/*' capture='camera'><br>
   <input type=file name=foto3  accept='image/*' capture='camera'><br>
   <input type=file name=foto4  accept='image/*' capture='camera'><br>
   <br><br>
   <input type=submit value='Καταχώρηση' name=save>
   </form>
   ";
   
   
   
   
}  
echo "</div>";
include ("footer.php");
?>