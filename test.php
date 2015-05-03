<!DOCTYPE html>
<html>
	<body>
		<?php
			$list[] = 1;
			$list[] = 2;
			$list[] = 3;
			$list["favorite"] = 4;

			foreach($list as $key => $thing) 
			{
				echo "key: " . $key . ", value: " . $thing . "<br / >";
			}

			$text = "The cat in the hat knows a lot about that.";
			$parts = explode(" ", $text);

			foreach ($parts as $part)
			{
				echo $part . "<br />";
			}
		?>
	</body>
</html>
