<?php

	$dbhost = 'localhost' ;
	$username = 'root' ;
	$password = '' ;
	$db = 'project' ;
    //open connection to mysql db
	
	
	$h_name=$_POST['h_name'];
	$p_bloodgroup=$_POST['p_bloodgroup'];
	$p_city=$_POST['p_city'];
	$p_medical=$_POST['p_medical'];
	$doc_name=$_POST['doc_name'];
	$p_name=$_POST['p_name'];
	$p_email=$_POST['p_email'];
	$p_cno=$_POST['p_cno'];
	

    $connection = mysql_connect("localhost","root") or die("Error " . mysql_error($connection));
	mysql_select_db($db);
    //fetch table rows from mysql db
	
	$sql = "INSERT INTO patient
		       VALUES ('$h_name','$p_bloodgroup','$p_city','$p_medical','$doc_name','$p_name','$p_email','$p_cno')";
   
    $result = mysql_query($sql) or die("Error in Selecting " . mysql_error($connection));
   
   
   echo "New record created successfully";
    mysql_close($connection);
?>
