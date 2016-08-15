<?php
session_start();

include '../dbConnection.php';

//Holds the values from the form that posted the user login credentials.
$user = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);
$userType = $_SESSION['userType'] = $_POST["userType"];


if($userType == "student"){
  //A query used to get the user credentials from the database.
  $sql = "SELECT * FROM student WHERE student_user_name='$user' AND student_id='$password'";
  // $result = $connection->query($sql);
  $result = @mysqli_query($connection, $sql);


  //Used to provide the user with a message that notifies the user that they used the wrong login.
  if(!($row = mysqli_fetch_assoc($result))){
     // unset($_SESSION['loggedIn']);
	 echo $sql;
	 header("Location: index.php");

		

  }else {
    //used to go to the survey and store a session value that assists the survey to know if a user is logged in.
    $_SESSION['loggedIn'] = true;
   	$_SESSION['userId'] = $row['student_id']; 
	// print_r($_SESSION);
    header("Location: question_template.php");
  }
}


if($userType == "teacher"){
  //A query used to get the user credentials from the database.
  $sql = "SELECT * FROM teacher WHERE teacher_user_name='$user' AND teacher_user_password='$password'";
  $result = $connection->query($sql);

  //Used to provide the user with a message that notifies the user that they used the wrong login.
  if(!$row = mysqli_fetch_assoc($result)){
   $_SESSION['loggedIn'] = false;
		header("Location: index.php");

  }else {
    //used to go to the survey and store a session value that assists the survey to know if a user is logged in.
    $_SESSION['loggedIn'] = true;
    header("Location: admin.php");
  }
}

if($userType == "counselor"){
  //A query used to get the user credentials from the database.
  $sql = "SELECT * FROM counselor WHERE counselor_user_name='$user' AND counselor_user_password='$password'";
  $result = $connection->query($sql);

  //Used to provide the user with a message that notifies the user that they used the wrong login.
  if(!$row = mysqli_fetch_assoc($result)){
    $_SESSION['loggedIn'] = false;
		header("Location: index.php");
  }else {
    //used to go to the survey and store a session value that assists the survey to know if a user is logged in.
    $_SESSION['loggedIn'] = true;
    header("Location: admin.php");
  }
}




  ?>

