<!DOCTYPE html>
<html>

	<head>
		<title>Testing files</title>
	</head>

	<body>
		<div>

			<?php
				echo "This is from PHP...<br/>";

				// Open a file with read permissions
				// Returns a file handler variable
				$file = fopen("myFile.txt", "r");

				if ($file)
				{
					echo "The file is open<br/>";

					// Assign each line in the file to the $line variable
					while ($line = fgets($file))
					{
						echo "This is from the file: $line<br/>\n";
					}

				}

				// Let's create the file
				$file = fopen("myFile.txt", "a");

				if ($file)
				{
					fwrite($file, "Hello World\n");
					fclose($file);
				}
				else
				{
					die("File did not exist and could not be created.");
				}


				echo "Doing the rest of the things on the page...<br/>";

				$content = file_get_contents("myFile.txt");

				echo "The content is: $content<br/>\n";

				$phpVar = "Something from PHP";

			?>
		</div>

		<script>
			var content = "<?php echo $phpVar; ?>";
			alert ("hello I am javascript. The file had " + content);
		</script>

	</body>

</html>