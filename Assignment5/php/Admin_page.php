<?php
include ("./header.php");

if ($logged == 'in') {
	$logged = 'in';
} else {
	$logged = 'out';
	header('Location: ./Login_page.php');
}
?>

<script src="../js/SubmitFilmscript.js"></script>

<div id= "content">
	<h4> Logout: Push <a href="../includes/logout.php">here</a> to logout...</h4>
	<div id="response"></div>
	<div class = leftbar>
		<div id=lagg>
			<h3>Lägg till en film</h3>
			<p>Titelt:</p> 
			<p><input id=formFilmTitle type=text class="required"></p>

			<p>Betyg:</p>
			<p><select id="formFilmRank">
				<option value="0">Valj betyg här...</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select></p>

			<p>Länk till imdb:</p> 
			<p><input id=formFilmIMDB type=text class="required"></p>

			<p>Länk till bild:</p> 
			<p><input id=formFilmBild type=text class="required"></p>

			<p>Filmens handling:</p> 
			<p><input id=formFilmHandling type=text class="required"></p>

			

			<p><input type="button" id="btnSubmit" Value=" Spara film "></p>
		</div>
	</div>
</div>

<?php include ("./footer.php"); ?>
