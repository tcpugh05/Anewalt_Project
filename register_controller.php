<?php
session_start(); 
$_SESSION['first_name'] = $_POST["first_name"];
$_SESSION['last_name'] = $_POST["last_name"];
$_SESSION['username'] = $_POST["username"];
$_SESSION['password'] = $_POST["password"];
$_SESSION['rpassword'] = $_POST["rpassword"];
$_SESSION['type'] = $_POST["type"];
header('Location: manager.php')
?>