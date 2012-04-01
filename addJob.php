<?php
include "dbconnect.php"; 

$desc = $_POST['desc'];
$contact = $_POST['contact'];
$skills = $_POST['skills'];

//Cleansing data from my injection attacks and XSS attacks
$desc = mysql_real_escape_string(strip_tags($desc));
$contact = mysql_real_escape_string(strip_tags($contact));
$skills = mysql_real_escape_string(strip_tags($skills));


$required = array('desc','contact','skills');
$error = false;
	foreach($required as $field){
		if(empty($_POST[$field])){
			$error=true;
			header("Location: error.php?errorCode=Did not fill out form completely");
		}
	}

$datetime=date("m/d/y"); 

$sql = "INSERT into careers(a_datetime,description,contact_info,skills_needed)
		VALUES('".$datetime."','".$desc."','".$contact."','".$skills."');";
$result = mysql_query($sql,$con) or die(mysql.error()); 
echo $sql; 

?>





