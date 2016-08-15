<?php
/*used to clear out the variables in the session, destroy the current session,
and relocate the user back to the index page.*/
session_start();
session_unset();
session_destroy();
header("Location: index.php");

 ?>
