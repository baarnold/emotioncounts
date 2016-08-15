<?php

session_start();

//used to check if the user is logged in.
include('includes/isUserLoggedInChecker.php');

//used to check if the user is a student and if so, then redirect them to the index page.
if($_SESSION['userType'] == 'student'){
	header("Location: index.php");
}

//include header
include('includes/header.inc.php');

//require database connection
require('../dbConnection.php');

//if submit is clicked
if(isset($_POST['add'])) {
	
	//set variables to escaped strings of post fields
	$teacherFirst = mysqli_real_escape_string($connection, $_POST['teacherFirst']);
	$teacherLast = mysqli_real_escape_string($connection, $_POST['teacherLast']);
	$teacherId = mysqli_real_escape_string($connection, $_POST['teacherId']);
	$teacherUser = mysqli_real_escape_string($connection, $_POST['teacherUser']);
	$teacherPass = mysqli_real_escape_string($connection, $_POST['teacherPass']);

	
	//set sql statement
	$sql_profile = "INSERT INTO teacher_profile (teacher_id, first_name, last_name) VALUES ('$teacherId', '$teacherFirst', '$teacherLast')";
	
	$sql_login = "INSERT INTO teacher (teacher_id, teacher_user_name, teacher_user_password) VALUES ('$teacherId', '$teacherUser', '$teacherPass')";
	
	if (mysqli_query($connection, $sql_profile) && mysqli_query($connection, $sql_login) {
		echo "<h3>$teacherFirst $teacherLast Profile Added Successfully</h3>";
		echo "<p>Remember your username and password! USER: $teacherUser; PASS: $teacherPass";
	} else {
		echo "Error: " . $$sql_profile . "<br>" . mysqli_error($connection);
	}

}

?>
<!-- Add Teacher Form -->
<form action="" method="POST">

	<!-- Teacher First Name -->
	<div class="form-group row">
		<label for="teacherFirst" class="col-xs-2 col-xs-offset-1 col-form-label">Teacher First Name</label>
		<div class="col-xs-8">
			<input class="form-control" type="text" placeholder="EX: Jane/John C" id="teacherFirst" name="teacherFirst">
		</div>
	</div>
	
	<!-- Teacher Last Name -->
	<div class="form-group row">
		<label for="teacherLast" class="col-xs-2 col-xs-offset-1 col-form-label">Teacher Last Name</label>
		<div class="col-xs-8">
			<input class="form-control" type="text" placeholder="EX: Doe/Doe Jr" id="teacherLast" name="teacherLast">
		</div>
	</div>
	
	<!-- Teacher ID -->
	<div class="form-group row">
		<label for="teacherId" class="col-xs-2 col-xs-offset-1 col-form-label">Teacher ID</label>
		<div class="col-xs-8">
			<input class="form-control" type="number" placeholder="880033" id="teacherId" name="teacherId">
		</div>
	</div>
	
	<br>
	<br>
	
	<!-- Teacher Username -->
	<div class="form-group row">
		<label for="teacherUser" class="col-xs-2 col-xs-offset-1 col-form-label">Teacher Username</label>
		<div class="col-xs-8">
			<input class="form-control" type="text" placeholder="EX: Doe/Doe Jr" id="teacherUser" name="teacherUser">
		</div>
	</div>
	
	<!-- Teacher Password -->
	<div class="form-group row">
		<label for="teacherPass" class="col-xs-2 col-xs-offset-1 col-form-label">Teacher Password</label>
		<div class="col-xs-8">
			<input class="form-control" type="text" placeholder="EX: Doe/Doe Jr" id="teacherPass" name="teacherPass">
		</div>
	</div>
	
	<!-- Submit Button -->
	<button type="submit" name="add" class="btn btn-primary">Add Student</button>
</form> <!-- /Add Teacher Form -->



<?php include('includes/footer.inc.php'); ?>
