<?php
session_start();
$con = mysql_connect('localhost','career_admin','r4z0r')
	or die(mysqli_error());
mysql_select_db("cpsc_careers",$con); 
//v2
?>
