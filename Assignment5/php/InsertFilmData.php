<?php
include_once '../includes/db_connect.php';

$filmTitle = $_POST['title'];
$filmRank = $_POST['rankValue'];
$idbm = $_POST['idbmValue'];
$link = $_POST['linkValue'];
$filmHandling = $_POST['filmInfo'];

    //start an output var
    $output = array();
    $output['message'] = "Success!";

        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO films (title, rank, idbm, link, description) VALUES (?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssss', $filmTitle, $filmRank, $idbm, $link, $filmHandling);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Insertion failure: INSERT');
            }else{
		echo json_encode($output);
	    }
 	
	/* Завершить запрос */
	$stmt->close();

    } else {
        // Could not create a prepared statement
        header("Location: ../error.php?err=Database error: cannot prepare statement");
        exit();
    }
	
/* Закрыть соединение */
$mysqli->close();
?>
