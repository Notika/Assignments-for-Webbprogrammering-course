<?php
include_once ("./db_connect.php");
include_once ("./functions.php");

sec_session_start(); // Our custom secure way of starting a PHP session.

$login = $_POST['login'];
$password = $_POST['p'];
if (isset($login, $password)) {
    if (login($login, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../php/Admin_page.php');
    } else {
        // Login failed 
       header('Location: ../php/Login_page.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: ../error.php?err=Could not process login');
    exit();
}
