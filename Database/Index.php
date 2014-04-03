<!doctype HTML>
<html>
	<head>
		<title>Oefening met PDO objecten</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	<body>
		<h1>Database entries</h1>
		<?php
			include "Database.php";
			$query = "SELECT firstname, lastname, username, email, age FROM users WHERE 1";
			$db = Database::getInstance()->prepare($query);
			if($db->execute())
			{
				$fetch = $db->fetchAll();
				echo "<div>";
				foreach($fetch as $row)
				{
					echo "<p>Name: {$row['firstname']} {$row['lastname']}, Username: {$row['username']}, Email: {$row['email']}, {$row['age']} years old</p>";
				}
				echo "</div>";
			}
		?>
	</body>
</html>