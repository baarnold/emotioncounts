<?php
	//Connect to the database(my root directory is one level up from the public_html directory)
    require '../dbConnection.php';

    //used to check if the user is logged in.
    include('includes/isUserLoggedInChecker.php');

    //used to check if the user is a student and if so, then redirect them to the index page.
    if($_SESSION['userType'] == 'student'){
      header("Location: index.php");
    }

	include ('includes/header.inc.php');
?>

    <!-- Main content area -->
    <div class="container">

      <h3 class="text-muted">All Test Results</h3>



      <table id="resultsTable" class="display" >
        <thead>
            <tr>
				<th>Last Name</th>
				<th>First Name</th>
                <th>Student ID</th>
                <th>Question One</th>
				<th>Question Two</th>
				<th>Question Three</th>
				<th>Question Four</th>
				<th>Question Five</th>
				<th>Question Six</th>
				<th>Question Seven</th>
				<th>Question Eight</th>
				<th>Question Nine</th>
                <th>Date/Time</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
				<th>Last Name</th>
				<th>First Name</th>
                <th>Student ID</th>
                <th>Question One</th>
				<th>Question Two</th>
				<th>Question Three</th>
				<th>Question Four</th>
				<th>Question Five</th>
				<th>Question Six</th>
				<th>Question Seven</th>
				<th>Question Eight</th>
				<th>Question Nine</th>
                <th>Date/Time</th>
            </tr>
        </tfoot>

        <tbody>
    <?php

        //Turn on error reporting
         ini_set('Display_errors',1);
         error_reporting(E_ALL);


         // Set query;
         $sql= "SELECT student_profile.student_last_name, student_profile.student_first_name, student_profile.student_id, survey_answer.* FROM student_profile INNER JOIN survey_answer ON student_profile.student_id=survey_answer.student_id";

         // Send the query to the database
         $ec = @mysqli_query($connection, $sql)
         or die ("Error executing query: $sql");


        //Process the rows
        while ($row = mysqli_fetch_assoc($ec)) {
			$studentFirst = $row['student_first_name'];
			$studentLast = $row['student_last_name'];
            $studentId = $row['student_id'];
            $answerOne = $row['answer1'];
			$answerTwo = $row['answer2'];
			$answerThree = $row['answer3'];
			$answerFour = $row['answer4'];
			$answerFive = $row['answer5'];
			$answerSix = $row['answer6'];
			$answerSeven = $row['answer7'];
			$answerEight = $row['answer8'];
			$answerNine = $row['answer9'];
            $timestamp = $row['date'];

            echo "<tr><td>" . $studentLast . "</td><td>"  . $studentFirst . "</td><td>"  . $studentId . "</td><td>" . $answerOne . "</td><td>" . $answerTwo . "</td><td>" . $answerThree . "</td><td>" . $answerFour . "</td><td>" . $answerFive . "</td><td>" . $answerSix . "</td><td>" . $answerSeven . "</td><td>" . $answerEight . "</td><td>" . $answerNine . "</td><td>" . $timestamp . "</td>";
        }
    ?>

        </tbody>
    </table>

    </div>

  <!-- Regular jQuery and Bootstrap scripts -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <!-- jQuery Data Tables Plugin -->
  <script src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>

  <script>
    $('#resultsTable').DataTable();
  </script>


<?php  include ('includes/footer.inc.php');  ?>
