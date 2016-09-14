 <?php
 // code will run if request through ajax
if (isset( $_SERVER['HTTP_X_REQUESTED_WITH'] )):
include ("../includes/comments_db_connect.php");

  if (!empty($_POST['name']) AND !empty($_POST['comment'])) {
    // preventing sql injection
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $comment = mysqli_real_escape_string($mysqli, $_POST['comment']);
    $dt = mysqli_real_escape_string($mysqli, date("j, n, Y"));

        // insert new comment into comment table
		if ($insert_stmt = $mysqli->prepare("INSERT INTO comments (user_name, dt, comment) VALUES (?, ?, ?)")) {
			$insert_stmt->bind_param('sss', $name, $dt, $comment);

			// Execute the prepared query.
			if (!$insert_stmt->execute()) {
				header('Location: ../error.php?err=Insertion failure: INSERT');
			} else {
			echo '<div class="comment-post">
			    <h3>'.$name.'<span> said....</span></h3>
			    <p>'.$comment.'</p>
			  </div>';
			}
		}
	// close connection
	  $insert_stmt->close();
	}
endif?>
