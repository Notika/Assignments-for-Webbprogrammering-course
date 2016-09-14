<?php
define("COMM_HOST", "localhost"); 		// The host you want to connect to. 
define("COMM_USER", "AC9496"); 		// The database username. 
define("COMM_PASSWORD", "valeria"); 	// The database password. 
define("COMM_DATABASE", "ac9496");           // The database name.

$mysqli = new mysqli(COMM_HOST, COMM_USER, COMM_PASSWORD, COMM_DATABASE);
if ($mysqli->connect_error) {
    header("Location: ../error.php?err=Unable to connect to MySQL.");
    exit();
}
