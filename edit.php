<?php
include ("header.php");
echo "<div id=main>";


// αν έχουμε πατήσει το save 
if (isset($_POST['save']))
{

// ανανεώνουμε τα στοιχεία του χρήστη με βάση που στέλνει η παρακάτω φόρμα 
// εκτελώντας το ερώτημα update
$sql="update users 
set password='$_POST[password]' ,
onoma='$_POST[onoma]',
phone='$_POST[phone]',
typos_xristi='$_POST[typos_xristi]'
where email='$_GET[email]'";

if (mysql_query($sql))
	echo "Τα στοιχεία αποθηκεύτηκαν! ";


}


// βρίσκει τον χρήστη με email από την λίστα του αρχείου  xristes.php


$sql="select * from users where email='$_GET[email]'";
$res=mysql_query($sql);

// παίρνει τα στοιχεία του
$row=mysql_fetch_array($res);

// εμφανίζει τα στοιχεία του χρήστη στην φόρμα που ακολουθεί

	echo "

	<h1>Στοιχεία χρήστη </h1>
	<form action='' method='post'>
	   <table>
	   <tr><td>email</td><td><input type=email readonly name=email value='$row[email]'></td></tr>
	   <tr><td>Password</td><td><input type=password name=password value='$row[password]'></td></tr>
	   <tr><td>Ονοματεπώνυμο</td><td><input type=text name=onoma value='$row[onoma]'></td></tr>
	   <tr><td>Τηλέφωνο</td><td><input type=text  name=phone value='$row[phone]'></td></tr>
	    <tr><td>Τύπος Χρήστη</td><td>
		<select name=typos_xristi>";
		
		
		// δυνατότητα να αλλάζει ρόλο ο διαχειριστής
		
		// αν ο χρήστης είναι user οι επιλογές μας είναι user,admin
		if ($row['typos_xristi']=='user') echo"
		<option>user</option>
		<option>admin</option>
		";
		
		// αν ο χρήστης είναι user οι επιλογές μας είναι admin, user
		if ($row['typos_xristi']=='admin') echo"
		<option>admin</option>
		<option>user</option>
		";
		
		
		echo "
		</select></td></tr>
		<tr><td></td><td><input type=submit name=save value=\"Αποθήκευση\"></td></tr>
	
	   </table>
	 </form>
	   ";

echo "</div>";
include ("footer.php");
?>