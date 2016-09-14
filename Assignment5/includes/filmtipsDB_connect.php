<?php
define("HOST", "localhost"); 		// The host you want to connect to. 
define("USER", "cs2013"); 		// The database username. 
define("PASSWORD", "abc123"); 	        // The database password. 
define("DATABASE", "cs2013");           // The database name.

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_error) {
    header("Location: ../error.php?err=Unable to connect to MySQL");
    exit();
}
