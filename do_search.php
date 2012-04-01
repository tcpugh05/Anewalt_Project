<?php
	include "header.php";
echo "hi there"; 
$query ="SELECT * FROM careers WHERE 1=1;";
$result = mysql_query($query,$con) or die('</br> Could not grab powers' . mysql_error());
echo "<table>"; 
echo "<table border='1'>";
echo "<tr><td>Date</td><td>Opportunity</td><td>Contact</td><td>Skills</td></tr>"; 
while($row = mysql_fetch_array($result)){
echo "<tr><td>";
echo  $row['a_datetime']; 
echo "</td><td>";
echo $row['description'];
echo "</td><td>";
echo $row['contact_info'];
echo "</td><td>";
echo $row['skills_needed'];
echo "</td></tr>"; 
}
echo "</table>";
	

?> 
	
	

