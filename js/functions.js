

function load(){
			//alert("Page is loaded");
			document.getElementById("alter").innerHTML = "";
}
			
function changeProfile(){
				var string = '<form class="forms" action="manager.php" method="post">'
			 	+ 'First Name:<input type="text" name="first_name" style="width:500px;height:45px;"></br>'
			 	+'Last Name:<input type="text" name="last_name" style="width:500px;height:45px;"></br>'
			 +'	User Name:<input type="text" name="username" style="width:495px;height:45px;"></br>'
			 +'	Password: <input type="password" name="password"style="width:500px;height:45px;"></br>'
			+'	Retype Psswrd: <input type="text" name="rpassword" style="width:400px;height:45px;"></br>'
			+'	What Are You?:<select name="type" style="width:400px;height:45px;">'
			+	'	<option value="Student">Student</option>'
			+	'	<option value="Business">Business</option>'
			+	'</select></br> '
			+	'<input type="submit" value="Login" style="width:800px;height:45"/>'
			+'</form>';
		//	alert(string);
			document.getElementById("alter").innerHTML= string;
}
		
function uploadResume(){
				//document.getElementById("alter").innerHTML = 'Upload File</br><form action=\"add_file.php\"' + 'enctype=\"multipart/form-data\" method=\"post\"> <input name=\"uploadedfile\" type=\"file\"/></br>'	+'<input type=\"submit\" name=\"submit\" value=\"Submit\"/></form>';
				document.getElementById("alter").innerHTML = "Upload File</br>" + 
				"<form action=\"add_file.php\" method=\"post\" enctype=\"multipart/form-data\">" +
        			"<input type=\"file\" name=\"uploaded_file\"><br>" +
        			"<input type=\"submit\" value=\"Upload file\">" +
    			"</form>" +
    			"<p>" +
        			"<a href=\"list_files.php\">See all files</a>" +
    			"</p>"
}
	
function uploadJob(){
		var string ='<form class="forms" action="manager.php" method="post">'
	+		'Description:<input type="text" style="width:400px;height:45px;"></br>'
	+		'Contact Info:<input type="text" style="width:400px;height:45px;"></br>'
	+		'Skills needed:<input type="text" style="width:400px;height:45px;"></br>'
	+		'<input type="submit" value="Login" style="width:800px;height:45"/>'
	+	'</form>';		
	//alert(string);
	document.getElementById("alter").innerHTML= string;
	
}