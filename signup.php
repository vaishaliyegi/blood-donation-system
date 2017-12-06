<?php

	$dbhost = 'localhost' ;
	$username = 'root' ;
	$password = '' ;
	$db = 'project' ;
    //open connection to mysql db	
	
	$d_name=$_POST['d_name'];
	$d_email=$_POST['d_email'];
	$d_pswd=$_POST['d_pswd'];
	$d_cno=$_POST['d_cno'];
	$d_dob=$_POST['d_dob'];
	$d_weight=$_POST['d_weight'];
	$d_gender=$_POST['d_gender'];
	$d_bloodgroup=$_POST['d_bloodgroup'];
	
	$connection = mysql_connect("localhost","root") or die("Error " . mysql_error($connection));
	mysql_select_db($db);
    //fetch table rows from mysql db

	
    $sql = "INSERT INTO donor
		       VALUES ('$d_name','$d_email','$d_pswd','$d_cno','$d_dob','$d_weight','$d_gender','$d_bloodgroup')";
   
    $result = mysql_query($sql) or die("Error in Selecting " . mysql_error($connection));
	
	if ($connection->mysql_query($sql) == true) {
   echo "New record created successfully";
     } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
     }
    mysql_close($connection);
?>
