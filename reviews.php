<!DOCTYPE html>
<html>
<head>
	<script src="reviews.js"></script>
	<link rel="stylesheet" type="text/css" href="stars.css">
	<link rel="stylesheet" type="text/css" href="reviews.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title>Ratings and Reviews</title>

</head>
<body onload="loadPage()">
		<?php
		// Access the database
		require("dbConnector.php");
		$db = loadDatabase();

		// The id of the selected restaurant
		$id   = $_POST['id'];

		// Get the name of the restaurant
		foreach ($db->query("SELECT * FROM restaurants WHERE id=$id;") as $row)
		{
			$name = $row['name'];
		}
		echo "<h2>Reviews for $name</h2>";
		?>			
		<div class="container">
			<div id="page" class="jumbotron">
				<div id="stars">		
					<form action="insertReviews.php" method="POST">
						<input type="hidden" name="id" value=<?php print "$_POST[id]"?>>
						<span class="lead choice">Choose a rating</span>		
						<span class="star-rating">
							<input type="radio" name="rating" onclick="checkReview()" value="1"><i></i>
							<input type="radio" name="rating" onclick="checkReview()" value="2"><i></i>
							<input type="radio" name="rating" onclick="checkReview()" value="3"><i></i>
							<input type="radio" name="rating" onclick="checkReview()" value="4"><i></i>
							<input type="radio" name="rating" onclick="checkReview()" value="5"><i></i>
						</span>
					</div>
					<br/>
					<div class="button">
						<button class="btn btn-warning" name="ratebutton" type="submit" id="rate" value="">Rate Without Reviewing</button>
					</div>

					<br/>

					<div id="input">
						<input type="text" oninput="checkReview()" name="author" id="authortext" placeholder="Your name (Required)">
						<br/>
						<br/>
						<textarea id="writereview" oninput="checkReview()" name="review" placeholder="Write your review here..."></textarea>
					</div>
					<br/>
					<div class="button">
						<button class="btn btn-warning" name="reviewbutton" type="submit" id="reviewbutton" value="">Rate And Review</button>
					</div>
				</form>

			</div>
 	 	</div>
 	 	<?php
 	 		// Reviews are displayed according to the order in which they were written,
 	 		// with the most recent reviews being displayed first.
 	 		foreach ($db->query("SELECT * FROM reviews WHERE restaurant_id=$id ORDER BY date_written DESC;") as $row)
 	 		{
 	 			$date = date('M j, Y', strtotime($row['date_written']));
 	 			echo "<div class=\"container\"><div id=\"reviewbackground\" class=\"jumbotron\">";
 	 			echo "<p class=\"jumbotron\" id=\"review\">";
 	 			echo "<span id=\"author\">$row[author]<br/>$date<br/><br/></span>";
 	 			echo $row['content'];
 	 			echo "</p>";
 	 			echo "</div></div>";
 	 		}
 	 	?>
</body>
</html>