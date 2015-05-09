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
	</head>

	<body>
		<h1>Welcome to the Undefined Survey!</h1>
		<br/>

		<div class="center">
			<button type="button" onclick="location.href='results.php'">
				View Results
			</button>
		</div>
		<br/>
		<br/>

		<div id="questions">
			<form action="results.php" method="POST">

				<span class="question">Is the glass half-empty or half-full?</span><br/>
				<input name="1" type="radio" value="A">Half-empty</input><br/>
				<input name="1" type="radio" value="B">Half-full</input>
				<br/>
				<br/>

				<span class="question">What kind of bear is best?</span><br/>
				<input name="2" type="radio" value="A">Black Bear</input><br/>
				<input name="2" type="radio" value="B">Grizzly Bear</input><br/>
				<input name="2" type="radio" value="C">Beets</input><br/>
				<input name="2" type="radio" value="D">Battlestar Galactica</input>
				<br/>
				<br/>

				<span class="question">Which is your preferred gaming platform?</span><br/>
				<input name="3" type="radio" value="A">Xbox</input><br/>
				<input name="3" type="radio" value="B">Playstation</input><br/>
				<input name="3" type="radio" value="C">Wii</input><br/>
				<input name="3" type="radio" value="D">PC</input>
				<br/>
				<br/>

				<span class="question">Who would you rather upset?</span><br/>
				<input name="4" type="radio" value="A">Liam Neeson</input><br/>
				<input name="4" type="radio" value="B">Batman</input><br/>
				<input name="4" type="radio" value="C">Jason Bourne</input><br/>
				<input name="4" type="radio" value="D">Bruce Banner</input>
				<br/>
				<br/>

				<div class="center">
					<input type="submit" name="submit" value="Submit"/>
				</div>
			</form>
		</div id="questions">						
	</body>

</html>