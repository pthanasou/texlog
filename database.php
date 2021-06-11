<?php

// ανοιγει session για να αποθηκεύουμε στον πίνακα $_SESSION
session_start();

// σύνδεση με βάση
mysql_connect("localhost","root",""); 
mysql_select_db("dbuniv");

// χαρακτήρες στην βάση utf 8   
mysql_query("set names 'utf8'");  

?>