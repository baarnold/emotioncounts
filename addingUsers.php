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
	$firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
	$studentId = mysqli_real_escape_string($connection, $_POST['studentId']);
	$parentContact = mysqli_real_escape_string($connection, $_POST['parentContact']);
	$contactNumber = mysqli_real_escape_string($connection, $_POST['contactNumber']);
	$contactEmail = mysqli_real_escape_string($connection, $_POST['contactEmail']);

	//set sql statement
	$sql_profile = "INSERT INTO student_profile (student_id, student_first_name, student_last_name, student_parent, student_contact_number, student_contact_email) VALUES ('$studentId', '$firstName', '$lastName', '$parentContact', '$contactNumber', '$contactEmail')";
	
	$sql_login = "INSERT INTO student (student_id, student_user_name) VALUES ('$studentId', '$firstName')";
	
	if (mysqli_query($connection, $sql_profile)) {
		echo "<h3>Student $firstName $lastName Profile Added Successfully</h3>";
	} else {
		echo "Error: " . $$sql_profile . "<br>" . mysqli_error($connection);
	}
	
	if (mysqli_query($connection, $sql_login)) {
		echo "<h3>Student $firstName Log In Added Successfully</h3>";
	} else {
		echo "Error: " . $$sql_profile . "<br>" . mysqli_error($connection);
	}
}

?>
<!-- Add Student Form -->
<form action="" method="POST">
	<!-- Student First Name -->
	<div class="form-group row">
		<label for="firstName" class="col-xs-2 col-xs-offset-1 col-form-label">Student First Name</label>
		<div class="col-xs-8">
			<input class="form-control" type="text" placeholder="EX: Jane/John C" id="firstName" name="firstName">
		</div>
	</div>
	
	<!-- Student Last Name -->
	<div class="form-group row">
		<label for="lastName" class="col-xs-2 col-xs-offset-1 col-form-label">Student Last Name</label>
		<div class="col-xs-8">
			<input class="form-control" type="text" placeholder="EX: Doe/Doe Jr" id="lastName" name="lastName">
		</div>
	</div>
	
	<!-- Student ID -->
	<div class="form-group row">
		<label for="studentId" class="col-xs-2 col-xs-offset-1 col-form-label">Student ID</label>
		<div class="col-xs-8">
			<input class="form-control" type="number" placeholder="880033" id="studentId" name="studentId">
		</div>
	</div>
	
	<!-- Parent Name -->
	<div class="form-group row">
		<label for="parentContact" class="col-xs-2 col-xs-offset-1 col-form-label">Parent Contact</label>
		<div class="col-xs-8">
			<input class="form-control" type="text" placeholder="EX: Mary Doe/Johnathan C Doe Sr" name="parentContact" id="parentContact">
		</div>
	</div>
	
	<!-- Contact Telephone Number -->
	<div class="form-group row">
		<label for="contactNumber" class="col-xs-2 col-xs-offset-1 col-form-label">Contact Number</label>
		<div class="col-xs-8">
			<input class="form-control" type="tel" placeholder="(555)-555-5555" id="contactNumber" name="contactNumber">
		</div>
	</div>
	
	<!-- Contact Email -->
	<div class="form-group row">
		<label for="contactEmail" class="col-xs-2 col-xs-offset-1 col-form-label">Email</label>
		<div class="col-xs-8">
			<input class="form-control" type="email" placeholder="contact@email.com" id="contactEmail" name="contactEmail">
		</div>
	</div>
	
	<br>
	<br>
	
	<!-- Teacher First Name
	<div class="form-group row">
		<label for="teacherFirst" class="col-xs-2 col-xs-offset-1 col-form-label">Teacher First Name</label>
		<div class="col-xs-8">
			<input class="form-control" type="text" placeholder="EX: Jane/John C" id="teacherFirst">
		</div>
	</div>
	
	<!-- Teacher Last Name
	<div class="form-group row">
		<label for="teacherLast" class="col-xs-2 col-xs-offset-1 col-form-label">Teacher Last Name</label>
		<div class="col-xs-8">
			<input class="form-control" type="text" placeholder="EX: Doe/Doe Jr" id="lastName">
		</div>
	</div>
	
	<!-- Teacher ID
	<div class="form-group row">
		<label for="teacherId" class="col-xs-2 col-xs-offset-1 col-form-label">Teacher ID</label>
		<div class="col-xs-8">
			<input class="form-control" type="number" placeholder="880033" id="teacherId">
		</div>
	</div>
	
	<!-- Submit Button -->
	<button type="submit" name="add" class="btn btn-primary">Add Student</button>
</form> <!-- /Add Student Form -->



<?php include('includes/footer.inc.php'); ?>
