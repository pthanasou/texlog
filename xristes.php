<?php
include ("header.php");
echo "<div id=main>";

// αν έχουμε επιλέξει διαγραφή
if (isset($_GET['del']))
{

// εκτελούμε ερώτημα διαγραφής
   $sql="delete from users where email='$_GET[del]'";
   mysql_query($sql);

}


// δημιουργούμε ένα πίνακα
echo "<h2>Διαχείριση Χρηστών</h2>";
echo "<table  cellpadding=10>";

// εκτελούμε το ερώτημα για όλους τους χρήστες
$sql="select * from users";

// παίρνουμε τον πίνακα των χρήστων
$res=mysql_query($sql);

// τίτλοι στον πίνακα
 echo "<tr><th></th><th>email</th><th>Ονοματεπώνυμο</th><th>Τηλέφωνο</th><th>Τύπος Χρήστη</th></tr>";
  
  // για κάθε εγγραφή παίρνουμε τα στοιχεία του χρήστη
while ($row=mysql_fetch_array($res))
{


  echo "<tr><td><a href='edit.php?email=$row[email]'>Επεξεργασία</a> <a href='xristes.php?del=$row[email]'>Διαγραφή</a></td><td>$row[email]</td><td>$row[onoma]</td><td>$row[phone]</td>";
   echo "<td>$row[typos_xristi]</td></tr>";
	

}



echo "</table>";

   echo "</div>";
  
include ("footer.php");
?>