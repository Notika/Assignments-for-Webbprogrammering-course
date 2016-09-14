<?php
//include 'ChromePhp.php';

$path = "https://ddwap.mah.se/AC9496/Lab3/movies.txt";

$msg = $_GET['title'];

$handle = @fopen($path, "r");

if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {

	if (strpos($buffer, $msg, 0) !== false) {
	     echo $buffer;
	}

    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

?>
