<?php
include ("header.php");
echo "<div id=main>";

if (isset($_POST['save']))
{

	$sql="update users set  password='$_POST[password]', 
	onoma='$_POST[onoma]', phone='$_POST[phone]' where email='$_SESSION[email]'";
    if (mysql_query($sql)) {
	   echo "Τα στοιχεία αποθηκεύτηκαν.";
	}
	else
	{
	   echo "Η Αποθήκευση δέν έγινε. <br> ";
	
	};
}


$sql="select * from users where email='$_SESSION[email]'";
$res=mysql_query($sql);


$row=mysql_fetch_array($res);


	echo "

	<h2>Προφίλ Χρήστη </h2>
	<form action='' method='post'>
	   <table>
	   <tr><td>email</td><td><input type=email required readonly name=email value='$row[email]'></td></tr>
	   <tr><td>Password</td><td><input type=password required name=password value='$row[password]'></td></tr>
	   <tr><td>Ονομα</td><td><input type=text name=onoma value='$row[onoma]'></td></tr>
	   <tr><td>Τηλέφωνο</td><td><input type=text  name=phone value='$row[phone]'></td></tr>
	 
		<tr><td></td><td>
		<input type=submit name=save value=\"Αποθήκευση\"></td></tr>
	   </table>
	 </form>
	   ";
  
echo "</div>";
include ("footer.php");
?>