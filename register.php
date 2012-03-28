<html>
<head>
	<?php 
	include 'header.php'; ?>
</head>
	
	<div id="parent">
	<div id="floater"></div>	
		<div id="content">
			<div id="register_form"><form class="forms" action="register_controller.php" method="post">
			 	First Name:<input type="text" name="first_name" style="width:500px;height:45px;"></br>
			 	Last Name:<input type="text" name="last_name" style="width:500px;height:45px;"></br>
			 	User Name:<input type="text" name="username" style="width:495px;height:45px;"></br>
			 	Password: <input type="password" name="password"style="width:500px;height:45px;"></br>
				Retype Psswrd: <input type="text" name="rpassword" style="width:400px;height:45px;"></br>
				What Are You?:<select name="type" style="width:400px;height:45px;">
					<option value="Student">Student</option>
					<option value="Business">Business</option>
				</select></br> 
				<input type="submit" value="Login" style="width:800px;height:45"/>
			</form></div>
		</div>
	</div>
	
		
</html>