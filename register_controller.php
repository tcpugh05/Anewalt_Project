<?php

session_start(); 
$_SESSION['first_name'] = $_POST["first_name"];
$_SESSION['last_name'] = $_POST["last_name"];
$_SESSION['username'] = $_POST["username"];
$_SESSION['password'] = $_POST["password"];
$_SESSION['rpassword'] = $_POST["rpassword"];
$_SESSION['type'] = $_POST["type"];

$required = array('first_name','last_name','username','password','rpassword','type');
$error = false;
	foreach($required as $field){
		if(empty($_POST[$field])){
			$error=true;
			echo "</br>" .$field . " is blank"; 
		}
	}
	if($error){
		echo"ERROR IS TRUE ERROR IS TRUE";
		header("Location: error.php?errorCode=Did not fill out form completely"); 
		exit; 	
	}
	if($_POST["rpassword"] != $_POST["password"]){
		echo"ERROR IS TRUE ERROR IS TRUE";
		header("Location: error.php?errorCode=Passwords do not match"); 
		exit; 	
	}

	/*can use this if we need to add email later
	 * $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';//$email_exp specifies correct email format
	if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'You email address is invalid.<br />';
  }
	 */
	$name_exp = "/^[A-Za-z .'-]+$/";//$name_exp specifies correct format
	$firstname = $_POST["first_name"];
	echo $firstname;
   if(!preg_match($name_exp,$firstname)) {
   	header("Location: error.php?errorCode=First Name is invalid");
   	exit;
   	}

  if(!preg_match($name_exp,$_POST["last_name"])) {
  	header("Location: error.php?errorCode=Last Name is invalid");
	exit;
  }


header('Location: manager.php')

?>