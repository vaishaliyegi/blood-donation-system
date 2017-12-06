<?php

	$dbhost = 'localhost' ;
	$username = 'root' ;
	$password = '' ;
	$db = 'project' ;
    //open connection to mysql db
	
	$username=$_POST['username'];
    $password=$_POST['password'];
	
	$connection = mysql_connect("localhost","root") or die("Error " . mysql_error($connection));
	mysql_select_db($db);
    //fetch table rows from mysql db
    $sql = "INSERT INTO login
		       VALUES ('$username','$password')";
   
    $result = mysql_query($sql) or die("Error in Selecting " . mysql_error($connection));

   echo "New record created successfully";
   mysql_close($connection);
?>
