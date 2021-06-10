<?php
include ("header.php");
echo "<div id=main>";



// δημιουργούμε ένα πίνακα
echo "<h2>Αναφορές</h2>";
echo "<table  cellpadding=10>";


// ανάλογα με την επιλογή μου εκτελείται ορίζω τα κριτήρια
if ($_GET['q']==1) $wr=" order by id_anaforas desc";
if ($_GET['q']==2) $wr=" where epilisis=0 order by id_anaforas desc";
if ($_GET['q']==3) $wr=" where epilisis=1 order by id_anaforas desc";
if ($_GET['q']==4) $wr=" where email_user='$_SESSION[email]' order by id_anaforas desc";

// εκτελούμε το ερώτημα για τις αναφορές
$sql="select * from anafores ".$wr;

// παίρνουμε τον πίνακα των αναφορών
$res=mysql_query($sql);

// τίτλοι στον πίνακα
 echo "<tr><th></th><th>Περιγραφή</th><th>Λεπτομέρειες</th></tr>";
  
  // για κάθε εγγραφή παίρνουμε τα στοιχεία του χρήστη
while ($row=mysql_fetch_array($res))
{


  echo "<tr><td><a href='edit_anaf.php?id=$row[id_anaforas]'>Επεξεργασία</a></td><td>$row[perigrafi]</td><td>Καταχώρηση από: $row[email_user]";
  if ($row['epilisis']==1) echo " Επίλυση από: $row[email_admin] Λύση: $row[apantisi]";
  
  echo "</td></tr>";
   
	

}



echo "</table>";

   echo "</div>";
  
include ("footer.php");
?>