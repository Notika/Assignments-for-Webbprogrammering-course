<?php
include_once(dirname(__FILE__) . "\..\includes\db_connect.php");
include_once(dirname(__FILE__) . "/../includes/functions.php");

sec_session_start();

if (login_check($mysqli) == true) {
	$logged = 'in';
} else {
	$logged = 'out';
}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="https://ddwap.mah.se/AC9496/Assignment4/mystyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://ddwap.mah.se/AC9496/Assignment4/js/navigation.js"></script>
	<script src="../js/ChkLogin.js"></script>
	<title>Min filmsamling</title>
</head>
<body>
<div class="wrapper">
	<div id="container">
		<header>
			<h1>Min filmsamling</h1>

			<ul id="navmenu">
				<li class="button" id="1"><a href="https://ddwap.mah.se/AC9496/Assignment4/index.php">Start</a></li>
				<li class="button" id="2"><a href="https://ddwap.mah.se/AC9496/Assignment4/php/Filmer_page.php">Filmer</a></li>
				<li class="button" id="3"><a href="https://ddwap.mah.se/AC9496/Assignment4/php/Filmtips_page.php">Filmtips</a></li>
				<li class="button" id="4"><a href="https://ddwap.mah.se/AC9496/Assignment4/php/Webbplatsen_page.php">Om webbplatsen</a></li>
				<li class="button" id="5"><a href="https://ddwap.mah.se/AC9496/Assignment4/php/Kontakt_page.php">Kontakt</a></li>
<?php
 if($logged == 'in'){
	echo'<li class="button" id="6"><a href="https://ddwap.mah.se/AC9496/Assignment4/php/Admin_page.php">Admin</a></li>';
	}
 if($logged == 'out'){
	echo'<li class="button" id="6"><a href="https://ddwap.mah.se/AC9496/Assignment4/php/Login_page.php">Login</a></li>';
	}
?>
				
			</ul>

		</header>

		<!-- end header -->
