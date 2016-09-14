<?php
include_once (dirname(__FILE__) . "/psl-config.php");   // Needed because functions.php is not include

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_error) {
    header("Location: ../error.php?err=Unable to connect to MySQL.");
    exit();
}
