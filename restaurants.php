<?php
// Set the proper time zone
date_default_timezone_set('America/Denver');

// Get the necessary files and load the database;
require("dbConnector.php");
require("search.php");
$db = loadDatabase();	
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="restaurants.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="restaurants.js"></script>
	<title>Rexburg Bites</title>
</head>

<body onload="checkSearchBar()">
	<div class="container">
		<div id="header" class="jumbotron">        
			<span>Rexburg Bites</span>
		</div>
	</div>
	<br/>

	<div id="searchForm">
		<form action="restaurants.php" method="POST">
			<div id="search" class="form-group">
				<input type="text" id="searchinput" name="search" class="form-control" placeholder="Search" oninput="checkSearchBar()">
			</div>
			<div id="searchButton">
				<button type="submit" id="searchbutton" name="searchButton" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</form>
	</div>
	<br/>
	<div class="container">
		<form action="reviews.php" method="POST">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	if (isset($_POST['searchButton'])) 
	{
		// Clean up user input by eliminating leading/trailing whitespace
		$searchString = trim($_POST['search']);

		// See if the database contains any matches					
		$query = search($db, $searchString, "restaurants");

		// If it doesn't, let the user know
		if ($query == FALSE)
		{
			echo "<p>Your search <span class=\"rating\">'" . stripslashes($searchString) . "'</span> did not match any restaurants</p>";
			echo "<div id=\"main\">";
			echo "<button type=\"button\" onclick=\"location.href='restaurants.php'\" class=\"button btn btn-large btn-primary\">Back to Main Page</button>";
			echo "</div>";
		}
	} 
}
else 
{
	$query = "SELECT * FROM restaurants ORDER BY name;";
}

// Opening and closing times are dependent on the day of the week
$day   = strtolower(date('D'));
$open  = $day . "_open";
$close = $day . "_close";

// Get the opening and closing times for yesterday as well
$date = date_create(date());
date_sub($date, date_interval_create_from_date_string('1 days'));
$yestClose = strtolower(date_format($date, 'D')) . "_close";
$yestOpen  = strtolower(date_format($date, 'D')) . "_open";

// An array that will store each restaurant
$array = array();

// Output restaurant information
foreach ($db->query($query) as $row)
{
	// Store the information for each restaurant
	$id          = $row['id'];
	$name        = $row['name'];
	$picture     = "images/$id.png";
	$address     = $row['address'];
	$phone       = $row['phone'];
	$hourOpen    = $row[$open];
	$hourClosed  = $row[$close];
	$prevClose   = $row[$yestClose];
	$prevOpen    = $row[$yestOpen];

	// Map each restaurant's id to its name
	$array[$name] = $id;			

	echo "<div id=\"php\" class=\"jumbotron\">\n";
	echo "<div id=\"text\">\n";						

	// Special case for restaurants that are open 24/7
	if (((strtotime($hourClosed) - strtotime($hourOpen)) / 3600) == 24)
	{
		echo "<h3>$name - <span id=\"open\">Open</span></h3>\n";
		echo "<div class=\"info lead\">\n";
		echo "(Open 24 hours)<br/>\n";
	}
	else if (((strtotime($hourClosed) - strtotime($hourOpen)) / 3600) == 0)
	{  // Special case for restaurants that are closed on a given day
		echo "<h3>$name - <span id=\"closed\">Closed</span></h3>\n";
		echo "<div class=\"info lead\">\n";
		echo "(Closed on " . date('l', time()) . "s)<br/>\n";
	}
	else
	{	// Display whether or not a restaurant is currently open
		// Special case for restaurants that stay open through the next day
		if (time() > strtotime($hourOpen) && (date('g', strtotime($hourClosed)) == 1) || date('g', strtotime($prevClose)) == 1 && date('G') < 1)
			echo "<h3>$name - <span id=\"late\">Open Late</span></h3>\n";
		else if (time() > (strtotime($hourClosed)) || (time() < (strtotime($hourOpen))))
			echo "<h3>$name - <span id=\"closed\">Closed</span></h3>\n";
		else
			echo "<h3>$name - <span id=\"open\">Open</span></h3>\n";		

		// Display last night's hours if it is not past 1 am yet
		if (date('g', strtotime($prevClose)) == 1 && date('G') < 1)
		{
			echo "<div class=\"info lead\">\n";
			echo date('g:i A', strtotime($prevOpen)) . " - " . date('g:i A', strtotime($prevClose)) . "<br/>\n";
		}
		else
		{
			echo "<div class=\"info lead\">\n";
			echo date('g:i A', strtotime($hourOpen)) . " - " . date('g:i A', strtotime($hourClosed)) . "<br/>\n";
		}
	}

	// Display the address and phone number of each restaurant
	echo "$address<br/>$phone<br/>\n";

	// Display the average rating for each restaurant
	foreach ($db->query("SELECT AVG(rating_value) FROM ratings WHERE restaurant_id = $row[id];") as $rowTwo)
	{
		$rating = number_format($rowTwo[0],1);

		if ($rating != 0)
		{	
			echo "Average rating:<br/> <span class=\"rating\">$rating</span>\n"; 
			echo " out of <span class=\"rating\">5</span>\n";						
		}
		else
		{  // Special case for restaurants that haven't been rated yet
			echo "Average rating: <br/>\n";
			echo "<span class=\"rating\">(No ratings)</span>\n";
		} 
	}

	// Display the image for each restaurant
	echo "</div>\n";
	echo "<div class=\"image\">\n";
	echo "<img src=$picture alt=\"Street View\"><br/>\n";
	echo "</div>";

	// Button to view reviews
	echo "<div class=\"button\">\n";
	echo "<button type=\"submit\" class=\"btn btn-info btn-large\" name=\"id\" value=\"$array[$name]\">Reviews</button>\n";
	echo "</div>\n";
	echo "</div>\n";
	echo "</div>\n";
}
?>

		</form>
	</div>
</body>
</html>