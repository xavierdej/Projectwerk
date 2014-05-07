<?php
include "Database.php";

if (!empty($_POST['songID'])) 
{
        $database = new Database();
		$database->openDatabaseConnection();
		$database->writeSong($_POST['songID'], $_POST['songName'], $_POST['songData']);
		$database->closeDatabaseConnection();
		echo "Added 1 song to the database";
}
else 
{
    echo "No values submitted";
}
 ?>