<?php
include("header.php");
?>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<div id=main>

   
   

<h2>Σύνδεση Χρήστη</h2>
Συμπληρώστε παρακάτω:
<form action='index.php' method=post>
<table>
<tr><td>email</td><td><input type=email required name=email size=20></td></tr>
<tr><td>Password</td><td><input type=password name=password required size=20></td></tr>
<tr><td colspan=2><input type=submit name=syndesi value='Σύνδεση'></td></tr>
</table>
<br><br>
</form>



</div>
<br><br><br><br>

<?php

include ("footer.php");

?>