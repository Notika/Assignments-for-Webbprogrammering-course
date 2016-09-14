<?php
include_once (dirname(__FILE__) ."\psl-config.php");

function sec_session_start() {
	$session_name = 'sec_session_id'; // Set a custom session name
	$secure = SECURE;

	// This stops JavaScript being able to access the session id.
	$httponly = true;

	// Forces sessions to only use cookies.
	if (ini_set('session.use_only_cookies', 1) === FALSE) {
		header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
		exit();
	}

	// Gets current cookies params.
	$cookieParams = session_get_cookie_params();
	session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

	// Sets the session name to the one set above.
	session_name($session_name);

	session_start(); // Start the PHP session
	session_regenerate_id(); // regenerated the session, delete the old one.
}

function login($login, $password, $mysqli) {

	// Using prepared statements means that SQL injection is not possible.
	if ($stmt = $mysqli->prepare("SELECT id, username, password FROM members WHERE username = ? LIMIT 1")) {
		$stmt->bind_param('s', $login); // Bind "$username" to parameter.
		$stmt->execute(); // Execute the prepared query.
		$stmt->store_result();

		// get variables from result.
		$stmt->bind_result($user_id, $username, $db_password);
		$stmt->fetch();

		if ($stmt->num_rows != 0) {
			// Check if the password in the database matches the password the user submitted.
			if ($db_password == $password) {
				// Password is correct! Get the user-agent string of the user.
				$user_browser = $_SERVER['HTTP_USER_AGENT'];
				$_SESSION['user_id'] = $user_id;
				$_SESSION['username'] = $username;
				$_SESSION['login_string'] = $password;

				// Login successful.
				return true;
			} else {
				// Password is not correct
				return false;
			}
		} else {
			// No user exists.
			return false;
		}
	} else {
		// Could not create a prepared statement
		header("Location: ../error.php?err=Database error: cannot prepare statement");
		exit();
	}
}

function login_check($mysqli) {
	// Check if all session variables are set
	if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
		$user_id = $_SESSION['user_id'];
		$login_string = $_SESSION['login_string'];
		$username = $_SESSION['username'];

		// Get the user-agent string of the user.
		$user_browser = $_SERVER['HTTP_USER_AGENT'];

		if ($stmt = $mysqli->prepare("SELECT password FROM members WHERE id = ? LIMIT 1")) {
			// Bind "$user_id" to parameter.
			$stmt->bind_param('i', $user_id);
			$stmt->execute(); // Execute the prepared query.
			$stmt->store_result();

			if ($stmt->num_rows == 1) {
				// If the user exists get variables from result.
				$stmt->bind_result($password);
				$stmt->fetch();
				$login_check = $password;

				if ($login_check == $login_string) {
					// Logged In!!!!
					return true;
				} else {
					// Not logged in
					return false;
				}
			} else {
				// Not logged in
				return false;
			}
		} else {
			// Could not prepare statement
			header("Location: ../error.php?err=Database error: cannot prepare statement");
			exit();
		}
	} else {
		// Not logged in
		return false;
	}
}
