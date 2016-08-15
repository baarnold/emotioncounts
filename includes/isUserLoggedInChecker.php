<?php
 //used to check if user is logged in and if not, then relocate to login page.
 if(!isset($_SESSION['loggedIn'])){
 	header("Location: index.php");
 }
  ?>