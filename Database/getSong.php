<?php
include "Database.php";

if (!empty($_POST['songID'])) 
{
        $database = new Database();
		$database->openDatabaseConnection();
		$database->retrieveSong($_POST['songID']);
		$database->closeDatabaseConnection();
}
else 
{
    echo "No values submitted";
}
 ?>