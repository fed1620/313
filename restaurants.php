<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="restaurants.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title>Rexburg Appetite</title>
</head>

<body>        
	<h1>Rexburg Appetite</h1>
	<div class="container">
		<form action="reviews.php" method="POST">
			<?php
			// Load the database
			require("dbConnector.php");
			$db = loadDatabase();	

			// Set the proper time zone
			date_default_timezone_set('America/Denver');

			// An array to store each restaurant
			$array = array();

			// Output restaurant information
			foreach ($db->query('SELECT * FROM restaurants;') as $row)
			{
				echo "<div id=\"php\" class=\"jumbotron\">";
				echo "<div id=\"text\">";
				// Store the information for each restaurant
				$id      = $row['id'];
				$name    = $row['name'];
				$picture = "images/$id.png";
				$address = $row['address'];
				$open    = $row['hour_open'];
				$closed  = $row['hour_closed'];

				// Map each restaurant's id to its name
				$array[$name] = $id;									

				// Special case for restaurants that are open 24/7
				if (((strtotime($closed) - strtotime($open)) / 3600) == 24)
				{
					echo "<h3>$name - <span id=\"open\">Open</span></h3>";
					echo "<div class=\"info lead\">";
					echo "(Open 24 hours)<br/>";
				}
				else
				{	// Depending on the time of day, display whether the restaurant is open or closed
					if (time() > (strtotime($closed)) || (time() < (strtotime($open))))
					{
						echo "<h3>$name - <span id=\"closed\">Closed</span></h3>";
					}
					else
					{
						echo "<h3>$name - <span id=\"open\">Open</span></h3>";				
					}

					// Display the hours of operation for each restaurant
					echo "<div class=\"info lead\">";
					echo date('g:i A', strtotime($open)) . " - " . date('g:i A', strtotime($closed)) . "<br/>";
				}

				// Display the address of each restaurant
				echo $address . "<br/>";

				// Display the rating for each restaurant
				foreach ($db->query("SELECT AVG(rating_value) FROM ratings WHERE restaurant_id = $row[id];") as $rowTwo)
				{
					$rating = number_format($rowTwo[0],1);

					if ($rating != 0)
					{	
						echo "Average rating:<br/> <span class=\"rating\">$rating</span>"; 
						echo " out of <span class=\"rating\">5</span>";						
					}
					else
					{
						echo "Average rating: <br/>
						<span class=\"rating\">N/A</span>";
					} 
				}

				echo "</div>\n";

				// Display the image for each restaurant
				echo "<div class=\"image\">\n";
				echo "<img src=$picture alt=\"Street View\"><br/>";
				echo "</div>";

				// Button to view reviews
				echo "<div class=\"button\">";
				echo "<button type=\"submit\" class=\"btn btn-primary btn-large\" name=\"id\" value=\"$array[$name]\">Reviews</button>";
				echo "</div></div></div>";

			}
			?>
		</form>
	</div>
</body>
</html>