<?php include (dirname(__FILE__) . "/header.php"); ?>

<div id= "content">
		<h2>Logga in</h2>
		
		<?php if (isset($_GET['error'])) { 
			echo '<p class="error">Error Logging In!</p>'; }?>		

		<form action="../includes/process_login.php" method="post" name="login_form"> 
		     <div id="login">                
			Användanamn: <input name="login" type="text"/>
			Lösenord:	<input name="password" type="password"/>
			<input id="button" type="submit" value="Login" /> 
			</div> 
</div>
<?php include (dirname(__FILE__) . "/footer.php"); ?>
