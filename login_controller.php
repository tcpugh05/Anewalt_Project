<?php
session_start();
$student =  array( 
	"first_name" => "Joe",
	"last_name" => "McStudent",
	"username" => "student",
	"password" => "password",
	"type" => "Student"
	);
$employers = array(
	"first_name" => "Sam",
	"last_name" => "Walton",
	"username" => "busy",
	"password" => "12345",
	"type" => "Business"
	);
	
if($_POST['username'] == $student["username"] && $_POST['password'] == $student['password'])
{
	echo "signed in as student";
	$_SESSION['first_name'] = $student["first_name"];
	$_SESSION['last_name'] = $student["last_name"];
	$_SESSION['username'] = $student["username"];
	$_SESSION['password'] = $student["password"];
	$_SESSION['type'] = $student["type"];
	print_r($student);
	header('Location: manager.php');
}	elseif($_POST['username'] == $employers["username"] && $_POST['password'] == $employers['password']){
	echo "signed in as business";
	$_SESSION['first_name'] = $employers["first_name"];
	$_SESSION['last_name'] = $employers["last_name"];
	$_SESSION['username'] = $employers["username"];
	$_SESSION['password'] = $employers["password"];
	$_SESSION['type'] = $employers["type"];
	header('Location: manager.php');
}
else{
	header('Location: login.php?error=Wrong Username or password');
}

//header('Location: manager.php')
?>