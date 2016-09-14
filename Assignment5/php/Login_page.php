<?php include (dirname(__FILE__) . "/header.php"); ?>

<script type="text/JavaScript" src="../js/sha512.js"></script> 
<script type="text/JavaScript" src="../js/forms.js"></script> 

	<div id="content">
		<h2>Logga in</h2>
		
		<?php if (isset($_GET['error'])) { echo '<p class="error">Error Logging In!</p>'; }?>		

		<form action="../includes/process_login.php" method="post" name="login_form"> 
		<div id="login">                    
			<p>Användanamn: <input name="login" type="text"/></p>
			<p> Lösenord:	<input name="password" type="password"/></p>
			<p><input id="button" type="submit" value="Login" onclick="formhash(this.form, this.form.password);"/> </p>
		</div> 
</div>
<?php include (dirname(__FILE__) . "/footer.php"); ?>
