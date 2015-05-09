<?php
	session_start();

	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if (isset($_POST['submit']))
		{
				$_SESSION["voted"] = TRUE;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="survey.css"/>
		<title>Results</title>
	</head>

	<body>

	<?php

		// Get the survey answers from the form
		$answer1 = $_POST['1'];
		$answer2 = $_POST['2'];
		$answer3 = $_POST['3'];
		$answer4 = $_POST['4'];

		// Open a file with read permissions
		// Returns a file handler variable
		$file = fopen("results.txt", "r");

		if ($file)
		{
			// Assign each line in the file to the $line variable
			if ($line = fgets($file))
			{
				$countQ1A = (int)$line;
				$countQ1B = (int)fgets($file);

				$countQ2A = (int)fgets($file);
				$countQ2B = (int)fgets($file);
				$countQ2C = (int)fgets($file);
				$countQ2D = (int)fgets($file);

				$countQ3A = (int)fgets($file);
				$countQ3B = (int)fgets($file);
				$countQ3C = (int)fgets($file);
				$countQ3D = (int)fgets($file);

				$countQ4A = (int)fgets($file);
				$countQ4B = (int)fgets($file);
				$countQ4C = (int)fgets($file);
				$countQ4D = (int)fgets($file);
			}
		}
		fclose($file);

		// Count the number of votes for Question 1
		switch ($answer1) {
			case "A":
				$countQ1A++;
				break;
			case "B":
				$countQ1B++;
				break;
		}

		// Count the number of votes for Question 2
		switch ($answer2) {
			case "A":
				$countQ2A++;
				break;
			case "B":
				$countQ2B++;
				break;
			case "C":
				$countQ2C++;
				break;
			case "D":
				$countQ2D++;
				break;
		}

		// Count the number of votes for Question 3
		switch ($answer3) {
			case "A":
				$countQ3A++;
				break;
			case "B":
				$countQ3B++;
				break;
			case "C":
				$countQ3C++;
				break;
			case "D":
				$countQ3D++;
				break;
		}

		// Count the number of votes for Question 4
		switch ($answer4) {
			case "A":
				$countQ4A++;
				break;
			case "B":
				$countQ4B++;
				break;
			case "C":
				$countQ4C++;
				break;
			case "D":
				$countQ4D++;
				break;
		}

		// Write the file
		$file = fopen("results.txt", "w");

		if ($file)
		{
			// Question 1
			fwrite($file, "$countQ1A\n");
			fwrite($file, "$countQ1B\n");
			// fwrite($file, "$countQ1C\n");
			// fwrite($file, "$countQ1D\n");

			// Question 2
			fwrite($file, "$countQ2A\n");
			fwrite($file, "$countQ2B\n");
			fwrite($file, "$countQ2C\n");
			fwrite($file, "$countQ2D\n");

			// Question 3
			fwrite($file, "$countQ3A\n");
			fwrite($file, "$countQ3B\n");
			fwrite($file, "$countQ3C\n");
			fwrite($file, "$countQ3D\n");

			// Question 4
			fwrite($file, "$countQ4A\n");
			fwrite($file, "$countQ4B\n");
			fwrite($file, "$countQ4C\n");
			fwrite($file, "$countQ4D\n");

			fclose($file);
		}
		else
		{
			die("File did not exist and could not be created.");
		}

		// Output the HTML
		echo"<br/><br/><br/><br/>\n";
		echo "<div id=\"results\">\n";

		// Question 1
		echo "<div class=\"header\">Is the glass half-empty or half-full?</div>\n";
		echo"<table class=\"table\">\n";
		echo "<tr>\n";
		echo "<td>Half-empty</td>\n";
		echo "<td class=\"answer\">$countQ1A</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>Half-full</td>\n";
		echo "<td class=\"answer\">$countQ1B</td>\n";
		echo "</tr>\n";
		echo "<table>\n";
		echo "<br/>\n";

		// Question 2
		echo "<div class=\"header\">What kind of bear is best?</div>\n";
		echo"<table class=\"table\">\n";
		echo "<tr>\n";
		echo "<td>Black Bear</td>\n";
		echo "<td class=\"answer\">$countQ2A</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>Grizzly Bear</td>\n";
		echo "<td class=\"answer\">$countQ2B</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>Beets</td>\n";
		echo "<td class=\"answer\">$countQ2C</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>Battlestar Galactica</td>\n";
		echo "<td class=\"answer\">$countQ2D</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
		echo "<br/>\n";

		// Question 3
		echo "<div class=\"header\">Which is your preferred gaming platform?</div>\n";
		echo"<table class=\"table\">\n";
		echo "<tr>\n";
		echo "<td>Xbox</td>\n";
		echo "<td class=\"answer\">$countQ3A</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>Playstation</td>\n";
		echo "<td class=\"answer\">$countQ3B</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>Wii</td>\n";
		echo "<td class=\"answer\">$countQ3C</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>PC</td>\n";
		echo "<td class=\"answer\">$countQ3D</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
		echo "<br/>\n";

		// Question 4
		echo "<div class=\"header\">Who would you rather upset?</div>\n";
		echo"<table class=\"table\">\n";
		echo "<tr>\n";
		echo "<td>Liam Neeson</td>\n";
		echo "<td class=\"answer\">$countQ4A</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>Batman</td>\n";
		echo "<td class=\"answer\">$countQ4B</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>Jason Bourne</td>\n";
		echo "<td class=\"answer\">$countQ4C</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td>Bruce Banner</td>\n";
		echo "<td class=\"answer\">$countQ4D</td>\n";
		echo "</tr>\n";

		echo "</table>\n";
		echo "</div>\n";


		?>
	</body>
</html>