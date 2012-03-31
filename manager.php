<html>
	<head>
		<script type="text/javascript" src="js/functions.js"></script>
	</head>
<body onload="load()">
<?php
	include "header.php"
?>
<div class="my_wrapper" id="error">
	<?php echo "Hi there ". $_SESSION['first_name']?>
</div>
<div class="my_wrapper">
	<div class="my_left_box">
   	 	<?php
   		 echo "<div style=\"text-align:center\"> Your info</div>";
		echo "First Name: " .$_SESSION['first_name']."</br>";
		echo "Last Name: " .$_SESSION['last_name']."</br>";
		echo "User Name: ".$_SESSION['username']."</br>";
    	 ?>
	</div>

	<div class="my_right_box">
    	<div style="text-align:center">Your options</div>
    	<a href="#" onClick="changeProfile()">Change Profile</a></br>
    	<?php
    	if($_SESSION['type']=="Business"){
    		echo "<a href=\"#\" onClick=\"uploadJob()\">Add Job</a>";
		}
		else{
			echo "<a href=\"#\" onClick=\"uploadResume()\">Upload Resume</a>";
		}
		?>
	</div>
	<div id="alter">Enable javascript</div>
	
</div>
	
</body>

</html>