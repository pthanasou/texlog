<?php
// σύνδεση με βάση
mysql_connect("localhost","root",""); 
mysql_select_db("dbuniv");
mysql_query("set names 'utf8'");  

$sql="select * from anafores limit 0,20";

header('Content-Type: application/rss+xml; charset=UTF8');
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<rss version=\"2.0\">
<channel>
<title>MyRSS</title>
<link>www.google.gr</link>
<description>Mydescription</description>";

  $res=mysql_query($sql);
  while($row=mysql_fetch_array($res))
  {
  
  echo "
  <item>
  <title> $row[katigoria]   </title>
  <pubDate>  $row[xronos_anathesis] </pubDate>
  <editor> $row[email_user]</editor>
  <description>$row[perigrafi]</description>
  
  
  </item>
  
  ";
  }
  echo "</channel> </rss>";





?>