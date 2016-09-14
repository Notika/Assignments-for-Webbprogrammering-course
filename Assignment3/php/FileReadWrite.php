<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!empty($_POST['value']))
{
	$msg = $_POST['value'];
	//$path = "/tmp/myFilms.txt";
$path = "../movies.txt";
	$f = (file_exists($path)) ? fopen($path, "a+") : fopen($path, "w+");
	fwrite($f, $msg);
	fclose($f);
	chmod($path, 0777);

    //start an output var
    $output = array();

    //do any processing here.
    $output['message'] = "Success!";

    //send the output back to the client
    echo json_encode($output);
}
?>
