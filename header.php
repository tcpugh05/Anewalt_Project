<?php
session_start();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/page_template.css"/>
		<link rel="stylesheet" type="text/css" href="CSS/header_styles.css"/>
		
	</head>
	<div id="links">
		<?php
		 if(!isset($_SESSION['username']) ||$_SESSION['first_name'] == ''){
		echo "<a href=\"register.php\">Register</a>
		<a href=\"login.php\">Login</a>";
		 }
		 else{
		echo "<a href=\"manager.php\">Manage Profile</a> |
		<a href=\"search.php\">Search for Listings</a> |
		<a href=\"logout.php\">Logout</a></br>";
		 }
		?>
	</div>
</html>