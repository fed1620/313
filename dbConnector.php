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
      // echo "Using local credentials: ";
		try
		{
			$user     = 'php';
			$password = 'php-pass';
			$host     = 'localhost';
			$db = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
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
      // echo "Using openshift credentials: ";
		define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
		define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
		define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
		define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
		
		$dsn = 'mysql:dbname='.$dbName.';host='.DB_HOST.';port='.DB_PORT;
		$db = new PDO($dsn, DB_USER, DB_PASS);
	}

	return $db;
}

?>