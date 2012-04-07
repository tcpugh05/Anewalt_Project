<?php
include "dbconnect.php"; 
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$username = $_POST["username"];
$password = $_POST["password"];
$rpassword = $_POST["rpassword"];
$type = $_POST["type"] ;
$email = $_POST["email"];

//Cleansing data from my injection attacks and XSS attacks
$first_name = mysql_real_escape_string(strip_tags($first_name));
$last_name = mysql_real_escape_string(strip_tags($last_name));
$username = mysql_real_escape_string(strip_tags($username));
$rpassword = mysql_real_escape_string(strip_tags($rpassword));
$type = mysql_real_escape_string(strip_tags($type));
$email = mysql_real_escape_string(strip_tags($email));



$_SESSION['first_name'] =$first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['rpassword'] = $rpassword;
$_SESSION['email'] = $email; 
$_SESSION['type'] = $type;

$required = array('first_name','last_name','username','password','rpassword','type','email');
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

	 $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';//$email_exp specifies correct email format
	if(!preg_match($email_exp,$email)) {
    header("Location: error.php?errorCode=email");
  }
	 
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
	if($number_of_rows != 0){
	header('Location: error.php?errorCode=Student User name is already taken');
	exit;		
	}
$sql ="INSERT INTO students(first_name,last_name,user_name,password,email)
			VALUES('".$first_name."','".$last_name."','".$username."','" .$password."','" .$email."');"; 
	//echo $sql; 
	mysql_query($sql,$con) or die('</br>Could not insert into table '.mysql_error());
}


else{
  $query = "SELECT * FROM employers where user_name='".$username."'"; 
	$result = mysql_query($query,$con) or die('</br>Could not insert into table '.mysql_error());
	$number_of_rows = mysql_num_rows($result);
	if($number_of_rows != 0){
		header('Location: error.php?errorCode=Employeer User name is already taken');
		exit;
	}
	$sql ="INSERT INTO employers(first_name,last_name,user_name,password,email)
			VALUES('".$first_name."','".$last_name."','".$username."','" .$password."','" .$email."');"; 
	echo $sql; 
	mysql_query($sql,$con) or die('</br>Could not insert into table '.mysql_error());
}

header('Location: manager.php');

?>