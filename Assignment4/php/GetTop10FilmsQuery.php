<?php
include_once '../includes/filmtipsDB_connect.php';

// Using prepared statements means that SQL injection is not possible. 
if ($stmt = $mysqli->prepare("SELECT title, grade, year FROM movies ORDER BY grade DESC")) {
   $stmt->execute();    // Execute the prepared query.

   // get variables from result.
	$stmt->bind_result($title, $grade, $year);
	while ( $stmt->fetch() ) {
		printf ("%s;%s;%s\n", $title, $grade, $year);
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
