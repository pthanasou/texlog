<?php
include("header.php");
echo "<div id=main>";

  
  // σε περίπτωση που έχει οριστεί με GET (sto URL) η κατηγορία τότε κάνει διαγραφή
if (isset($_GET['delkatigoria']))
{
// εκτελώντας το παρακάτω ερώτημα
   $sql="delete from katigories where katigoria='$_GET[delkatigoria]'";
   mysql_query($sql);

}


// αν εχει πατηθεί το κουμπί προσθήκη
if (isset($_POST['prosthiki']))
{

//εκτελεί προσθήκη κατηγορίας με το παρακάτω ερώτημα
   $sql="insert into katigories(katigoria) values ('$_POST[katigoria]')";
   mysql_query($sql);
}

// στείνω ένα πίνακα
echo "<h2>Κατηγορίες</h2>";
echo "<table >";

// επιλέγω όλες τις κατηγορίες
$sql="select * from katigories order by katigoria";
$res=mysql_query($sql);

// βάζω τους τίτλους στον πίνακα
 echo "<tr><th></th><th>Ονομα Κατηγορίας</th></tr>";
 
 // η φόρμα για την καταχώρηση κατηγορίας
  echo "<tr><td></td><td><form action='katigories.php' method=post><input type=text name=katigoria><input type=submit name=prosthiki value='Προσθήκη'></form></td></tr>";

  
  // για κάθε εγγραφή (while) παίρνω την τιμή της κατηγορίας
  while ($row=mysql_fetch_array($res))
{

// εμφανίζει την τιμή και τις επιλογές
  echo "<tr><td><a href='katigories.php?delkatigoria=$row[katigoria]'>Διαγραφή</a></td><td>$row[katigoria]</td></tr>";
 

}



echo "</table>";
  echo "</div>";
include("footer.php");
?>