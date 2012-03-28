<?php
	include "header.php";
			$job1 = array("09/01/11",
								 "Entry-Level Java Developer",
								 "cpsc_easy@gmail.com",
								 "Java"
								 ,-1
								);
				 $job2 = array("10/12/11",
				 				"Senior-Level Web Developer",
				 				"web-dev@gmail.com",
				 				"PHP,mySQL,HTML,AJAX",
				 				-1
				 				);
				 $job3 = array("11/25/11",
				 				"Junior-Level .NET Developer",
				 				"microsoft@yahoo.com",
				 				"ASP,.NET,C#",
				 				-1
				 			);
	echo "</br>";
	if(isset($_GET['query'])){
		$input = $_GET['query'];
	}
	else{
		echo "<table width=100% border=1px;>";
			echo "<tr><td>Date Posted</td><td>Description</td><td>Contact Info</td><td>Skills Needed</td></tr>";
		
		echo "<tr>"; 
		for($i = 0; $i <4 ;$i++){
			$word = $job1[$i];
			echo "<td>".$word."</td>";
		}
		echo "</tr>"; 
		
		echo "<tr>"; 
		for($i = 0; $i <4 ;$i++){
			$word = $job2[$i];
			echo "<td>".$word."</td>";
		}
		echo "</tr>"; 
		
		echo "<tr>"; 
		for($i = 0; $i <4 ;$i++){
			$word = $job3[$i];
			echo "<td>".$word."</td>";
		}
		echo "</tr>"; 
		
		echo "</table>";
		die();
	}

	for($i = 0; $i <4 ;$i++){
		$word = $job1[$i];
		$lev = levenshtein($input, $word);
		if($lev == 0){
			$job1[4] = 0; 
			break; //break out we have found an exact match
		}
		if($lev <= $job1[4] || $job1[4] < 0){
			//set the closest match and shortest distance
			$job1[4] = $lev; 
		}
	//	echo print_r($job1)."</br>";
	}
	
	
	for($i = 0; $i < 4;$i++){
		$word = $job2[$i];
		$lev = levenshtein($input, $word);
		if($lev == 0){
			$job2[4] = 0; 
			break; //break out we have found an exact match
		}
		if($lev <= $job2[4] || $job2[4] < 0){
			//set the closest match and shortest distance
			$job2[4] = $lev; 
		}
	//	echo print_r($job2)."</br>";
	}
	
	
	for($i = 0; $i < 4; $i++){
		$word = $job3[$i]; 
		$lev = levenshtein($input, $word);
		if($lev == 0){
			$job3[4] = 0; 
			break; //break out we have found an exact match
		}
		if($lev <= $job3[4] || $job3[4] < 0){
			//set the closest match and shortest distance
			$job3[4] = $lev; 
		}
	//	echo print_r($job3)."</br>";
	}	
	 
	 for($i = 0; $i <4 ;$i++){
		$word = $job1[$i];
		$lev = levenshtein($input, $word);
		if($lev == 0){
			$job1[4] = 0; 
			break; //break out we have found an exact match
		}
		if($lev <= $job1[4] || $job1[4] < 0){
			//set the closest match and shortest distance
			$job1[4] = $lev; 
		}
	 }
		//Just print the thing 
		echo "<table width=100% border=1px;>";
			echo "<tr><td>Date Posted</td><td>Description</td><td>Contact Info</td><td>Skills Needed</td></tr>";
		
		echo "<tr>"; 
		for($i = 0; $i <4 ;$i++){
			$word = $job1[$i];
			echo "<td>".$word."</td>";
		}
		echo "</tr>"; 
		echo "</table>"; 
	 

?> 
	
	

