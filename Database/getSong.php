<?php
include "Database.php";

$database = new Database();
$database->openDatabaseConnection();
$database->retrieveSong(1);
$database->closeDatabaseConnection();
 ?>