<html>
<head>
	<?php 
	include 'header.php'; ?>
</head>
	
	<div id="parent">
	<div id="floater"></div>	
		<div id="content">
			<div id="login_form">
				<form class="forms" action="login_controller.php" method="post">
					<?php
					if(isset($_GET['error'])){
						echo "Error: ".$_GET['error'] . "</br>";
					}
				?>
			 	User Name:<input type="text" name="username" style="width:500px;height:45px;"></br>
			 	Password: <input type="password" name="password"style="width:500px;height:45px;"></br>
			 	<input type="submit" value="Login" style="width:800px;height:45"/>
			</form></div>
		</div>
	</div>
	
		
</html>