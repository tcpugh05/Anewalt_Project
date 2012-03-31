<?php
include "dbconnect.php";
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$username = $_POST["username"];
$password = $_POST["password"];
$rpassword = $_POST["rpassword"];
$type = $_SESSION['type']; 


//Cleansing data from my injection attacks and XSS attacks
$first_name = mysql_real_escape_string(strip_tags($first_name));
$last_name = mysql_real_escape_string(strip_tags($last_name));
$username = mysql_real_escape_string(strip_tags($username));
$password = mysql_real_escape_string(strip_tags($password));
$rpassword = mysql_real_escape_string(strip_tags($rpassword));

//Checking for blank or invalid data
$required = array('first_name','last_name','username','password','rpassword');
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
   if(!preg_match($name_exp,$first_name)) {
   	header("Location: error.php?errorCode=First Name is invalid");
   	exit;
   	}

  if(!preg_match($name_exp,$last_name)) {
  	header("Location: error.php?errorCode=Last Name is invalid");
	exit;
  }
  if ($type == "Student"){
  $query = "SELECT * FROM students where user_name='".$username."'"; 
	$result = mysql_query($query,$con) or die('</br>Could not insert into table '.mysql_error());; 
	$number_of_rows = mysql_num_rows($result);
	if($number_of_rows != 0 && $_SESSION['username'] != $username){
	header('Location: error.php?errorCode=Student User name is already taken');
	exit;		
	}
}
else{
	$query = "SELECT * FROM employers where user_name='".$username."'"; 
	$result = mysql_query($query,$con) or die('</br>Could not insert into table '.mysql_error());; 
	$number_of_rows = mysql_num_rows($result);
	if($number_of_rows != 0 && $_SESSION['username'] != $username){
	header('Location: error.php?errorCode=Student User name is already taken');
	exit;
}
}
  
  
  
  
  
//UPDating Session Variables
		$old_username= $_SESSION['username'];
		$old_password= $_SESSION['password']; 
		$_SESSION['first_name']= $first_name;
		$_SESSION['last_name']=$last_name;
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		

//UPDATING RECORDS
	$sql ="SELECT * FROM students WHERE user_name='".$old_username."' AND password='".$old_password."';";
	$result = mysql_query($sql,$con) or die('</br>Could not select from table '.mysql_error());
	$number_of_rows = mysql_num_rows($result);
	if($number_of_rows == 1){
		$row = mysql_fetch_array($result);
		$sql ="UPDATE students SET
		first_name='".$first_name."', 
		last_name='".$last_name."',
		user_name='".$username."',
		password='".$password."'
		WHERE
		user_name='".$old_username."';";
	//	echo $sql; 
		$result = mysql_query($sql,$con) or die('</br>Could not select from table '.mysql_error());
		header("Location: manager.php"); 
		exit; 
	}
	
	
	$sql ="SELECT * FROM employers WHERE user_name='".$old_username."' AND password='".$old_password."';";
	echo $sql; 
	$result = mysql_query($sql,$con) or die('</br>Could not select from table '.mysql_error());
	$number_of_rows = mysql_num_rows($result);
	if($number_of_rows == 1){
		$row = mysql_fetch_array($result);
		$sql ="UPDATE employers SET
		first_name='".$first_name."', 
		last_name='".$last_name."',
		user_name='".$username."',
		password='".$password."'
		WHERE
		user_name='".$old_username."';";
		$result = mysql_query($sql,$con) or die('</br>Could not select from table '.mysql_error());
 		header("Location: manager.php"); 
		//echo "busy";
		exit; 
	}
	else{
	//	header("Location: error.php?errorCode=That user does not exist");
	}



?>