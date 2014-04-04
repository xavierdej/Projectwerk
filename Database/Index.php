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

			$database = new Database();
			$database->openDatabaseConnection();
			$database->retrieveSong(1);
			$database->closeDatabaseConnection();
			echo "last line";
		?>
	</body>
</html>