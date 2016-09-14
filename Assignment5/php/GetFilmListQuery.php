<?php include_once ("../includes/db_connect.php");

// Using prepared statements means that SQL injection is not possible. 
if ($stmt = $mysqli->prepare("SELECT title, rank, idbm, link, description FROM films")) {
   $stmt->execute();    // Execute the prepared query.

   // get variables from result.
	$stmt->bind_result($title, $rank, $idbm, $link, $filmHandling);
	while ( $stmt->fetch() ) {
		printf ("%s;%s;%s;%s;%s\n", $title, $rank, $idbm, $link, $filmHandling);
	}

	/* Завершить запрос */
	$stmt->close();

} else {
    // Could not create a prepared statement
    header("Location: ../error.php?err=Database error: cannot prepare statement");
    exit();
}
	
/* Закрыть соединение */
//$mysqli->close();
?>
