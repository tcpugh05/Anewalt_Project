<html>
<head>
	<?php 
	include 'header.php'; ?>
</head>

<div id="parent">
	<div id="floater"></div>	
		<div id="content">
			<div id="search_form">
			 	You want something specific?</br>
			 	<form class="forms" action="do_search.php" method="get">
			 		<input type="text" name="query" style="width:900px;height:50px;"></br>
			 		<input type="submit"  value="Go!" style="width:900px;height:45px;"/>
			 	</form>
			 	</br></br><div style="text-align:center;">OR..</div></br></br></br></br></br>
			 	Show me everything!
				<form class="forms" action="do_search.php" method="post">
			 		<input type="submit"  value="Go!" style="width:900px;height:45px;"/>
			 	</form>
			</div>
		</div>
	</div>