<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Emotions Count</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css"
          rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">

		<!-- Custom styles -->
		<link rel="stylesheet" href="css/style.css" >

	</head>
	<body>
		<div class="mainBody centering">
			<div class="container-fluid">
				<nav class="navbar navbar-default">
			
					<div class="text-center" id="navContainer">
					
						<!-- Mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>

							</button>

						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Home</a></li>
								<li><a href="why.php">About Us</a></li>
								<li><a href="resources.php">Resources</a></li>
								<!-- <li><a href="survey.php">Student Survey</a></li> -->
								<!-- <li><a href="survey_congratulations.php">Survey End</a></li> -->

						<?php
									if(isset($_SESSION['loggedIn']) && $_SESSION['userType'] == 'teacher' || $_SESSION['userType'] == 'counselor'){
										echo "<li><a href='report.php'>Student Report</a></li>";
										echo "<li><a href='admin.php'>Results (Temp)</a></li>";
										echo "<li><a href='addStudent.php'>Add Student</a></li>";
										echo "<li><a href='addTeacher.php'>Add Teacher</a></li>";
									}
									 ?>
								</ul>

								<!--used to display a logout link for teachers and counselors-->
								<?php
								if(isset($_SESSION['loggedIn']) && $_SESSION['userType'] == 'teacher' || $_SESSION['userType'] == 'counselor'){
									echo "<ul class='nav navbar-nav navbar-right'>";
									echo "<li><a href='logout.php'><span><i class='fa fa-sign-out' aria-hidden='true'></i></span> Logout</a></li>";
									echo "</ul>";
								}
								 ?>


							</div><!-- /.navbar-collapse -->
					</div> <!-- /.navContainer -->
				
				</nav>