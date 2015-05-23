<?php

function loadDatabase()
{

	$host = "";
	$user = "";
	$password = "";

	$dbName = "project";

	$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

	if ($openShiftVar === null || $openShiftVar == "")
	{
      // Not in the openshift environment
      //echo "Using local credentials: ";
		try
		{
			$user     = 'php';
			$password = 'php-pass';
			$host     = 'localhost';
		}
		catch (PDOException $ex)
		{
			echo 'Error!: ' . $ex->getMessage();
			die();
		}
	}
	else
	{
      // In the openshift environment
      //echo "Using openshift credentials: ";
		$host     = getenv('OPENSHIFT_MYSQL_DB_HOST');
		$user     = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
		$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
	}
   // echo "host:$host;dbName=$dbName user:$user password:$password<br >\n";
	$db = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);

	return $db;
}

?>