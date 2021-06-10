<?php
include ("header.php");
echo "<div id=main style='height:800px;'>";


// βρίσκω την αναφορά που ζητήθηκε
$sql="select * from anafores where id_anaforas=$_GET[id]";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);


// αν έχω πατήσει save
if (isset($_POST['save']))
{

	
	
	// εκτελώ το ερώτημα με τα στοιχεία της φόρμας και των αρχείων
	
	$sql="update anafores set
	epilisis=1 , apantisi='$_POST[lysi]',	xronos_epilisis=now() ,
	email_admin='$_SESSION[email]' where id_anaforas=$_GET[id]
	";

	// εκτελώ το ερώτημα
	if (mysql_query($sql)) echo "Η λύση της αναφοράς καταχωρήθηκε";
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
 var pos=new google.maps.LatLng($row[y], $row[x]);
   // οι παράμετροι του χάρτη
  var mapOptions = {
    zoom: 16,
	
  };
  
   map = new google.maps.Map(document.getElementById('mymap2'), mapOptions);
   map.setCenter(new google.maps.LatLng($row[y], $row[x]));
 //ορίζει την  θέση από την βάση μας

	
	// ορίζει ένα marker στη θέση αυτή για τον χάρτη map
     marker = new google.maps.Marker({
        map: map,
        position: pos
      });
	  
	
 
}



google.maps.event.addDomListener(window, 'load', initialize);

    </script>
 ";
 
 // Η φόρμα καταχώρησης που περιέχει και το id=mymap2 που είναι ο χάρτης και μεταφέρει και αρχεία (multipart/form-data)
 echo "
 
 
   <br>
   <table>
   <tr><td><div id=mymap2 ></div></td>
   <td valign=top>
   Γεωγραφικό Μήκος :<br><input type=text required name=mikos value='$row[x]' id=mikos><br>
   Γεωγραφικό Πλάτος:<br><input type=text required name=platos value='$row[y]' id=platos>
   </td>
   </tr></table>
   
   Περιγραφή:<br>
   <textarea name=perigrafi required cols=40 rows=5>$row[perigrafi]</textarea><br>
   
   Κατηγορία<br>
   $row[katigoria]
   ";
   
   
   // κλείνει το select της κατηγορίας και μας δίνει δυνατότητα για 4 φωτογραφίες και από κάμερα κινητού
   echo "
   <br><br>
  ";
  
  // όπου υπάρχουν οι φωτογραφίες τις εμφανίζουμε 
  if ($row['photo1']!='') echo "<img src='upload/$row[photo1]' width=200px > ";
   if ($row['photo2']!='') echo "<img src='upload/$row[photo2]' width=200px ><br>";
    if ($row['photo3']!='') echo "<img src='upload/$row[photo3]' width=200px > ";
	 if ($row['photo4']!='') echo "<img src='upload/$row[photo4]' width=200px >";
	 echo "<br><br>";
  	 
  if ($row['epilisis']==0  && $_SESSION['type']=="admin") echo "
    Περιγραφή Επίλυση
	<form action='' method=post >
    <textarea name=lysi cols=30 rows=2></textarea><br>
   <input type=submit value='Καταχώρηση' name=save>
   </form>
   ";
   
   if ($row['epilisis']==1)
   echo   "<textarea >$row[apantisi]</textarea><br> Λύθηκε απο: $row[email_admin]";
   
   
   
}  
echo "</div>";
include ("footer.php");
?>