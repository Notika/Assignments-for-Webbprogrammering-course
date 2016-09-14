<?php include_once ("../includes/comments_db_connect.php");

// Select all the comments and populate the $comments array with objects
$comments = array();

$query = "SELECT user_name, dt, comment FROM comments ORDER BY id ASC";

if ($result = $mysqli->query($query)) {

	while($row = $result->fetch_assoc())
	{
		$comments[] = $row;
	}
	
	$result->free();
} else { die('Invalid query: ' . mysqli_error()); }
?>

<?php include ("./header.php"); ?>

<div id= "content">

    <h2>Gästbok</h2>
    <hr>

  <div class="comment-block">
  <!-- comment will be apped here from db-->
  
<?php  // Output the comments one by one:
foreach($comments as $c){
  echo  '<div class="comment-post">
    <h3>'.$c['user_name'].'<span> said:</span></h3>
    <p>'.$c['comment'].'</p>
    <br>
  </div>';
}
?>
  </div>

  <div id="addCommentContainer">
	<h4>Add your Comment</h4>
		<form id="addCommentForm" method="post">
			<div>
				<p><label for="name">Your Name</label>
				<input type="text" name="name" id="name"></p>

				<p><label for="comment">Comment: </label></p>
				<p><textarea name="comment" id="comment" cols="20" rows="5"></textarea></p>

				<p><input type="submit" id="submitcomment" value="Submit Comment" /></p>
			</div>
		</form>
    </div>
</div>
<script src="../js/Guestbookscript.js"></script>
<?php include ("./footer.php"); ?>
