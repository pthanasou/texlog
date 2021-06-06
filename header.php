<?php

// καλούμε για σύνδεση με βάση
include ('database.php');


// ακολουθεί CSS και η ιστοσελίδα μας
?>
<html>
<head>
<title>-- </title>
<style>
#menu {
padding:5px;
width:15%;
height:345px;
background-color:#cc994c;
float:left;
}
#menu a{
display:block;
height:25px;
color: #ffffff;
text-decoration:none;																																																						
font-size:18px;

}


#menu a:hover{
height:25px;
background-color:#3d702f;
width:100%;
}


#mymap
{
margin: 0px 16%;
width:60%;
height:350px;
}

#mymap2
{

width:400px;
height:200px;
}


#main
{
padding: 0px 10px;
margin: 0px 16%;
border: 1px solid;
width:80%;
height:350px;
}

@media screen and (max-width:600px)
{
	#menu {
	width:100%;
	height:260px;
	background-color:#cc994c;
	float:none;
	}
	
	#main {
	margin: 0 0px;
	width:100%;
	height:260px;
	background-color:#fff;
	float:none;
	}

	#mymap
	{
	margin: 0px 0px;
	display: block;
	width:100%;
	height: 400px;
	}

}

</style>
  
<meta charset='uft-8'>
</head>
<body>
<img src="images/banner.jpg" width=100%>
<hr>
<div id=menu>
<h2>Μενού Επιλογών</h2>

<?php

$f=0;

   if (isset($_POST['syndesi']))
   {
   
		$sql="select * from users where email='$_POST[email]' and password='$_POST[password]'";
		$res=mysql_query($sql);
		
		
		if (mysql_num_rows($res)>0) {
		
		
			$row=mysql_fetch_array($res);
		
		
			$_SESSION['email']=$row['email'];
			$_SESSION['type']=$row['typos_xristi'];
		
		}
		else
		{
		
	
		  $f=1;
		   session_destroy();
		}
   }


   

if (isset($_SESSION['email']))
{ 


	if ($_SESSION['type']=='user')
	{
	echo "

	<a href='index.php'>Αρχική</a>
	<a href='anafores.php'>Αναφορές</a>
	<a href='profil.php'>Προφίλ</a>
	<a href='logout.php'>Αποσύνδεση</a>";
	
	
	
	}
	else
	{
	echo "

	<a href='index.php'>Αρχική</a>
	<a href='anafores.php'>Αναφορές</a>
	<a href='xristes.php'>Χρήστες</a>
	<a href='katigories.php'>Κατηγορίες</a>
	<a href='profil.php'>Προφίλ</a>
	<a href='logout.php'>Αποσύνδεση</a>";
	
	
	}
	echo "<br><br> Είστε ο χρήστης με email <br><b>$_SESSION[email]</b>";
}
else
{

// αν δεν έχουμε συνδεθεί εμφανίζει το ανάλογο μενού
	echo "
<a href='index.php'>Αρχική</a>
	<a href='syndesi.php'>Σύνδεση</a>
	<a href='eggrafi.php'>Εγγραφή</a>
	";
	
	// αν έχει προκύψει λάθος εμφανίζει το λάθος
	if ($f==1) echo "<br><br> Λάθος email ή password </br>";

}
?>
</div>