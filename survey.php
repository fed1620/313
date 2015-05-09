<?php
	session_start();

	if ($_SESSION["voted"] == TRUE)
	{
		header("Location: results.php");
	}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Survey</title>
		<link rel="stylesheet" type="text/css" href="survey.css"/>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>

	<body>
		<h1>Welcome to the Survey!</h1>

		<div class="container">
			<div class="jumbotron" id="resultsBackground">

				<div class="center">
					<button type="button" id="resultButton" class="btn btn-default btn-large" onclick="location.href='results.php'">
						View Results
					</button>
				</div>
				<br/>
				<br/>

				<div class="container">
					<div id="questions" class="jumbotron">
					<form class="form-inline" role="form" action="results.php" method="POST">
						<span class="question">Is the glass half-empty or half-full?</span><br/>
						<input name="1" type="radio" value="A"> Half-empty</input><br/>
						<input name="1" type="radio" value="B"> Half-full</input>
						<br/>
						<br/>

						<span class="question">What kind of bear is best?</span><br/>
						<input name="2" type="radio" value="A"> Black Bear</input><br/>
						<input name="2" type="radio" value="B"> Grizzly Bear</input><br/>
						<input name="2" type="radio" value="C"> Beets</input><br/>
						<input name="2" type="radio" value="D"> Battlestar Galactica</input>
						<br/>
						<br/>

						<span class="question">Which is your preferred gaming platform?</span><br/>
						<input name="3" type="radio" value="A"> Xbox</input><br/>
						<input name="3" type="radio" value="B"> Playstation</input><br/>
						<input name="3" type="radio" value="C"> Wii</input><br/>
						<input name="3" type="radio" value="D"> PC</input>
						<br/>
						<br/>

						<span class="question">Who would you rather upset?</span><br/>
						<input name="4" type="radio" value="A"> Liam Neeson</input><br/>
						<input name="4" type="radio" value="B"> Batman</input><br/>
						<input name="4" type="radio" value="C"> Jason Bourne</input><br/>
						<input name="4" type="radio" value="D"> Bruce Banner</input>
						<br/>
						<br/>

					</div>
				</div>
					<div class="center">
						<input type="submit" name="submit" id="submit" class="btn btn-success btn-large" value="Submit"/>
					</div>
				</form>
			</div>		
		</div>				
	</body>
</html>