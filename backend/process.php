<?php
require_once('config.php');
require_once('function.php');

$domain = $_SERVER('HTTP_HOST');
$uri=parse_url($_SERVER['HTTP_REFERER']);
$r_domain=substr($uri['host'],strpos($uri['host'],"."), strlen($uri['host']));

if ($domain == $r_domain)
{
$link=f_sqlconnect(DB_USER, DB_PASSWORD, DB_NAME);

/*these are the main variables we use to process the form.*/
$table=$_POST['FormID'];
$keys=implode(", ", (array_keys($_POST)));
$values=implode ("', '", (array_values($_POST)));

/*these are for redirect.*/
$redirect=$_POST['redirect_to'];
$referred=$_SERVER['HTTP_REFERER'];
$query=arse_url($referred, PHP_URL_QUERY);
$referred=str_replace(array('?', $query), '',$referred);

/*check to see if table exists and if it does not create it.*/

if (!f_tableexists($table, DB_NAME) )
{
	$sql="CREATE TABLE $table (
	ID int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(ID),
	)";

	$result=mysql_query($sql);
	if (!$result) {
		die('INVALID query: ' . mysql_error());
	}
}

/*check to see if the field in the form exist */

foreach ($_POST as $key => $value)
{
	$column=mysql_real_escape_string($key);
	$alter=f_fieldexists($table, $column, $column_attr="VARCHAR(255) NULL";

	if(!alter){
		echo 'Unable to add column: ' . $column;
	}
}
/*insert values to table*/
$sql="INSERT INTO $table ($keys) BALUES ('$values)";
if(!mysql_query($sql))
{
	die('ERROR: ' . mysql_error());
}

/*close our connection*/
mysql_close();

/*redirect the user after a sucessful form submision*/

if(!empty ($redirect))
{
	header("Location: $redirect?msg=1");
}
else{
	header("Location: $referred?msg=1");
}
}
else {
	die('You are not allowed to submit data to this form');
}
?>
