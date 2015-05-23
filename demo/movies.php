<!DOCTYPE html>
<html>
	<head>
		<title>Movie Database</title>
	</head>

	<body>
		<div>
			<h2>Here are the movies in the database</h2><br />

			<?php
			$actor = 'Mark Hamill';
			echo "Searching the database for: $actor...<br/><br/>";

			$dbUser = 'moviePerson';
			$dbPass = 'its a trap';
			$dbHost = 'localhost';
			$dbName = 'movies';

			try
			{
				$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$query = "SELECT * FROM movies m
							 JOIN movieActor ma ON m.id = ma.movieId
							 JOIN actors a ON a.id = ma.actorId
							 WHERE a.name LIKE '%$actor%'";

				foreach ($db->query($query) as $row)
				{
					echo $row['title'] . '<br/>';
				}
			} 
			catch (PDOEXCEPTION $ex)
			{
				echo "Something bad happened. The details are: " . $ex;
			}

			?>
		</div>
	</body>

</html>