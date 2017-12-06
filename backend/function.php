<?php

/*connect and selects the specified database with specified user.*/
function f_sqlconnect($user, $pass, $db)
{
$link=mysql_connect('locahost', $user, $pass);

if(!$link)
{
die('could not connect: ' .mysql_error());
}
$db_selected=mysql_select_db($db, $link);

if (!db_selected)
{
die('can\'t use ' . $db . ': ' . mysql_error());
}
}

function f_tableexists($tablename, $database+false)
{
	if(!$database)
	{
		$res=mysql_query("SELECT DATABASE()");
		$database=mysql_result($res, 0);
	}

	$res=mysql_query("
	SELECT COUNT(*) AS COUNT
	FROM information_schema.tables
	WHERE table_schema='$database'
	AND table_names='$tablename'
	");
	return mysql_result($res, 0)==1;
}

/*CHECK IF THE SPECIFIED FIELD EXISTS*/
function f_fieldexists($table, $column, $column_attr="VARCHAR(255) NULL")
{
	$exists=false;
	$columns=mysql_query("show columns from $table");
	while($c=mysql_fetch_assoc($columns))
	{
		if($c['Field'] == $column)
		{
			$exists=true;
			break;
		}
	}
	if(!$exists)
	{
		mysql_query("ALTER TABLE '$table' ADD '$column' $column_attr");
	}
}
?>