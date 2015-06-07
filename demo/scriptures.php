<!DOCTYPE html>
<html>
<head>
	<title>Scripture Resources</title>
</head>
<!--need php_readonly somewhere -->
<body>        
	<h1>Scripture Resources</h1>
	<?php
	try
	{
		$user     = 'php';
		$password = 'php-pass';
		$db = new PDO("mysql:host=localhost; dbname=scriptures",$user,$password); 
	}
	catch (PDOException $ex)
	{
		echo 'Error!: ' . $ex->getMessage();
		die();
	}
	$db = new PDO("mysql:host=localhost; dbname=scriptures",$user,$password); 

	foreach ($db->query('SELECT * from scriptures') as $row)
	{
		echo "<h3>" . $row['book'] . "&nbsp" . $row[chapter] . ":" . $row[verse] . "</h3>" . "<p>" . "\"" . $row['content'] . "\"" . "</p>";		
	}
	?>
</body>
</html>