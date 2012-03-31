<?php
	include 'dbconnect.php';
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	
	//Checkign to see if any fields are blank
	$error = false; 
	$required = array('username','password');
	foreach($required as $field){
		if(empty($_POST[$field])){
			$error=true;
			echo "</br>" .$field . " is blank"; 
		}
	}
	if($error){
		header("Location: error.php?errorCode=Did not fill out form completely"); 
		exit; 	
	}
	
	
	
	$sql ="SELECT * FROM students WHERE user_name='".$username."' AND password='".$password."';";
	$result = mysql_query($sql,$con) or die('</br>Could not select from table '.mysql_error());
	$number_of_rows = mysql_num_rows($result);
	if($number_of_rows == 1){
		$row = mysql_fetch_array($result);
		$_SESSION['first_name']= $row['first_name'];
		$_SESSION['last_name']=$row['last_name'];
		$_SESSION['username']=$row['user_name'];
		$_SESSION['password']=$row['password'];
		$_SESSION['type']="Student";
 		header("Location: manager.php"); 
		exit; 
	}
	$sql ="SELECT * FROM employers WHERE user_name='".$username."' AND password='".$password."';";
	$result = mysql_query($sql,$con) or die('</br>Could not select from table '.mysql_error());
	$number_of_rows = mysql_num_rows($result);
	if($number_of_rows == 1){
		$row = mysql_fetch_array($result);
		$_SESSION['first_name']= $row['first_name'];
		$_SESSION['last_name']=$row['last_name'];
		$_SESSION['username']=$row['user_name'];
		$_SESSION['password']=$row['password']; 
		$_SESSION['type']="Business";
 		header("Location: manager.php"); 
		exit; 
	}	
	else{
		header("Location: error.php?errorCode=That user does not exist");
	}
 
	
?>