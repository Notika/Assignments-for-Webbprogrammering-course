<?php
$path = "../movies.txt";
//$path = "/tmp/myFilms.txt";

$handle = @fopen($path, "r");

if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
       echo $buffer;
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}

?>
