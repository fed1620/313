<!DOCTYPE html>
<html>
<body>

Name: <?php  echo $_POST["name"];?><br/>
Email: <?php echo $_POST["email"];?><br/>
Major: <?php echo $_POST["major"];?><br/>


Places Visited:
<?php
	if(!empty($_POST['visit'])) 
	{
		foreach($_POST['visit'] as $place)
		{
			echo "$place".", ";
		}
	}
?>

<br/>
Comments:
<?php
	echo htmlspecialchars($_POST['comments']);
?>

</body>
</html>