<!DOCTYPE html>
<html>

<body>
	<div>
		<?php
			$username = htmlspecialchars($_POST['username']);
			echo "Your username is: $username";
		?>
	</div>
</body>

</html>