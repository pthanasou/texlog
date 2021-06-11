<?php
include("header.php");
?>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<div id=main>
   <?php
   if (isset($_POST['eggrafi']))  // αν εχει πατηθεί το κουμπί κάτω από την φόρμα που ακολουθεί
   // τότε εκτελεί ερώτημα εισαγωγής των στοιχείων στην βάση
   {
		$sql="INSERT INTO users ( email, password, onoma, phone, typos_xristi) 
		VALUES ( '$_POST[email]', '$_POST[password]', '$_POST[onoma]', '$_POST[phone]', 'user')";
		if (mysql_query($sql)) {
		   echo "Η εγγραφή σας έγινε επιτυχώς.";
		}
		else
		{
		   echo "Η εγγραφή σας δεν είναι επιτυχής. Το email αυτό υπάρχει.";
		 }
   }
   else
   {
   
   ?>
   
   
   

<h2>Εγγραφή Χρήστη</h2>
Συμπληρώστε παρακάτω:
<form action='' method=post>
<table>
<tr><td>email</td><td><input type=email required name=email size=20></td></tr>
<tr><td>Password</td><td><input type=password name=password required size=20></td></tr>
<tr><td>Ονοματεπώνυμο</td><td><input type=text  name=onoma size=40></td></tr>
<tr><td>Τηλέφωνο</td><td><input type=text  name=phone size=40></td></tr>
<tr><td colspan=2><input type=submit name=eggrafi value='Εγγραφή'></td></tr>
</table>
<br><br>
</form>


<?php
}
echo "
</div>
<br><br><br><br>
";

include ("footer.php");

?>