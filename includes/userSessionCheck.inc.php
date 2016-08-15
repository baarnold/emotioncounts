<?php
/*
This is always necessary when running sessions.
If this is not present, then your sessions will not function correctly.
*/
session_start();

/*
This takes the session variable $_SESSION['loggedIn'] and check to see if
it contains a value. If there are no values, then the statement uses the
header() function to relocate the user to the userLoginPage.php page so that they
be logged in.
*/
if(!isset($_SESSION['loggedIn'])){
	header("Location: userLoginPage.php");
}

 ?>
