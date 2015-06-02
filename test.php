<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>

<body>
	<?php
		// Set the proper time zone
		date_default_timezone_set('America/Denver');

		switch (date('N'))
		{
			case 1:
				echo "<h3>Today is Monday!</h3>";
				break;
			case 2:
				echo "<h3>Today is Tuesday!</h3>";
				break;
			case 3:
				echo "<h3>Today is Wednesday!</h3>";
				break;
			case 4:
				echo "<h3>Today is Thursday!</h3>";
				break;
			case 5:
				echo "<h3>Today is Friday!</h3>";
				break;
			case 6:
				echo "<h3>Today is Saturday!</h3>";
				break;
			case 7:
				echo "<h3>Today is Sunday!</h3>";
				break;
			default:
				echo "Invalid date";
				break;
		}

	?>
</body>
</html>