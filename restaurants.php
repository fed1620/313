<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="restaurants.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script src="restaurants.js"></script>
		<title>Restaurants</title>
	</head>

	<body>        
		<h1>Rexburg's Restaurants</h1>
		<div class="container">
			<div class="jumbotron" id="page">
				<div id="container" class = "container">
					<div id="php" class="jumbotron">
						<div id="text">
							<?php
							// DB Connector page
							require("dbConnector.php");

							// Set the proper time zone
							date_default_timezone_set('America/Denver');

							$db = loadDatabase();	

							// A number!
							$i = 1;

							// Output restaurant information
							foreach ($db->query('SELECT * FROM restaurants;') as $row)
							{
								// Store the restaurant's name and image file location
								$name    = $row['name'];
								$picture = "\"images/$row[id]" . ".png\"";

								// Special case for restaurants that are open 24/7
								if (((strtotime($row[hour_closed]) - strtotime($row[hour_open])) / 3600) == 24)
								{
									echo "<h3>$name - <span id=\"open\">Open</span></h3>";
									echo "<div id=\"info\" class=\"lead image\">";
									echo "(Open 24 hours)<br/>";
								}
								else
								{	// Depending on the time of day, display whether the restaurant is open or closed
									if (time() > (strtotime($row[hour_closed])) || (time() < (strtotime($row[hour_open]))))
									{
										echo "<h3>$name - <span id=\"closed\">Closed</span></h3>";
									}
									else
									{
										echo "<h3>$name - <span id=\"open\">Open</span></h3>";				
									}
									echo "<div id=\"info\" class=\"lead\">";
									echo date('g:i A', strtotime($row[hour_open])) . " - " . date('g:i A', strtotime($row[hour_closed])) . "<br/>";
								}

								echo $row['address'] . "<br/>";

								// Display the rating for each restaurant
								foreach ($db->query("SELECT * FROM ratings WHERE restaurant_id = $row[id];") as $rowTwo)
								{
									echo "Average rating: <span id=\"rating\">$rowTwo[rating_value]/5</span>";
								}
								echo "</div>\n";

								// Display the restaurant image
								echo "<div class=\"image\">\n";
								echo "<img src=$picture alt=\"Street View\"><br/>";
								echo "</div>";

								// Button to view reviews
								echo "<div id=\"flip" . $i . "\" class=\"button\">";
								echo "<buttton class=\"btn btn-success btn-large\">Reviews</button>";
								echo "</div>";

								// Drop the reviews down
								foreach ($db->query("SELECT * FROM reviews WHERE restaurant_id = $row[id];") as $rowThree)
								{
									// Make a date object for the date that each review was written
									$date = date_create($rowThree[date_written]);

									echo "<br/>";
									echo "<div class=\"panel container\" id=\"panel" . $i . "\">";
									echo "<span class=\"author\">$rowThree[author]<br/>";
									echo date_format($date, 'M j, Y') . "</span><br/><br/>";
									echo "$rowThree[content]";
									echo "</div>";
									$i++;
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>