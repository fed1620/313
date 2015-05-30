<?php
try
{
	// Start by connecting to the database
	require("dbConnector.php");
	$db = loadDatabase();
	// PDO exception for debugging purposes
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	// Get the data from POST
	$id      = $_POST['id'];
	$rating  = $_POST['rating'];
	$author  = $_POST['author'];
	$review  = htmlspecialchars($_POST['review']);

	// Start by inserting the rating
	$ratingQuery = 'INSERT INTO ratings(restaurant_id, rating_value) VALUES (:id, :rating);';
	$statement   = $db->prepare($ratingQuery);

	$statement->bindParam(':id', $id);
	$statement->bindParam(':rating', $rating);
	$statement->execute();

	// Insert the review if applicable
	if (isset($_POST['reviewbutton'])) {
		$reviewQuery = 'INSERT INTO reviews(restaurant_id, author, content, date_written) VALUES (:id, :author, :content, SYSDATE());';
		$statement   = $db->prepare($reviewQuery);

		$statement->bindParam(':id', $id);
		$statement->bindParam(':author', $author);
		$statement->bindParam(':content', $review);

		$statement->execute();
	}
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: restaurants.php");
die(); 
?>