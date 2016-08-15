<?php
session_start();
 ?>
<!--A basic login page-->
<?php  include ('includes/header.inc.php');  ?>

    <h1>Login</h1>
    <br>

    <!--Sends form information to the login page-->
    <form action="login.php" method="post">
      <input type="text" name="username" placeholder="user name">
      <br>
      <br>
      <input type="password" name="password" placeholder="password">
      <br>
      <br>
      <button type="submit" name="button">Login</button>

    </form>
    <!--End of form for login-->

    <br>

<?php  include ('includes/footer.inc.php');  ?>
