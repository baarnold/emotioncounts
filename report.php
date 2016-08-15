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


	//Getting Questions from Database
	//Define the Question Query

    $sql1= "SELECT * FROM `emotionsquestions` WHERE `survey_id` = 1";

    //Send the question query to the database
    $result = @mysqli_query($connection,$sql1);


   //process the question rows
    while ($row = mysqli_fetch_assoc($result))
    {
        $questions =
		array (
		 1 => htmlentities($row['question1']),
         2 => htmlentities($row['question2']),
         3 => htmlentities($row['question3']),
         4 => htmlentities($row['question4']),
         5 => htmlentities($row['question5']),
         6 => htmlentities($row['question6']),
         7 => htmlentities($row['question7']),
         8 => htmlentities($row['question8']) );

    }
	?>
	<!-- Javascript to make hover work -->
	<script>
		$( function() {
			$( document ).tooltip();
		} );
	</script>

    <!-- Main content area -->
    <div class="print">


			<h3 class="text-muted">Report of Results</h3>



		  <table class="table-bordered">
			<thead>
				 <!-- Build table header with questions that display when hovered over -->
				<tr>
					<th>Date</th>
					<th>Name</th>
					<?php

						for ($i =1; $i <= count($questions); $i++ ) {
							echo "<th><a href=\"#\" title=\"";
							echo $questions[$i];
							echo "\">Question ";
							echo $i;
							echo "</a></th>";
						}
					?>
					<th>Question 9</th>
				</tr>
			</thead>



			<tbody>
		<?php

			//Turn on error reporting
			 ini_set('Display_errors',1);
			 error_reporting(E_ALL);


			 // Set query;
			 $sql= "SELECT student_profile.student_last_name, student_profile.student_first_name, student_profile.student_id, survey_answer.* FROM student_profile INNER JOIN survey_answer ON student_profile.student_id=survey_answer.student_id ORDER BY date DESC";

			 // Send the query to the database
			 $ec = @mysqli_query($connection, $sql)
			 or die ("Error executing query: $sql");


			//Process the rows
			while ($row = mysqli_fetch_assoc($ec)) {
				$studentName = $row['student_first_name'] . " " . $row['student_last_name'];
				$quiz_id = $row['quiz_id'];
				$date = date('n/j', strtotime(htmlentities($row['date'])));
				$ans1 = htmlentities(strtoupper($row['answer1']));
				$ans2 = htmlentities(strtoupper($row['answer2']));
				$ans3 = htmlentities(strtoupper($row['answer3']));
				$ans4 = htmlentities(strtoupper($row['answer4']));
				$ans5 = htmlentities(strtoupper($row['answer5']));
				$ans6 = htmlentities(strtoupper($row['answer6']));
				$ans7 = htmlentities(strtoupper($row['answer7']));
				$ans8 = htmlentities(strtoupper($row['answer8']));
				$ans9 = htmlentities($row['answer9']);

			//when you click on the date it will take you to the print page for that survey result
			echo "<tr><td class=\"text-center \"><a href=\"print.php?quiz_id=". $quiz_id. "\">". $date ."</a></td>";

			echo "<td>" . $studentName . "</td>";

			//build label in span tag to display response with color emphasis
			for ($i =1; $i <= count($questions)+1; $i++ ) {
				$answer = ("ans" . $i);
				$answer = $$answer;
				echo "<td class=\"text-center \">";
				//Question 2 has meaning statements reveresed so should set reversed to true
				if($answer == "SOMETIMES" ) {
					//change background to orange
					echo "<span class=\"label label-warning\">";
				} else if ($i != 2){
					if($answer == "ALWAYS" || $answer == "OFTEN") {
					//change background to green
						echo "<span class=\"label label-success\">";
					} else if($answer == "NEVER" || $answer == "RARELY") {
					//change background to red
						echo "<span class=\"label label-danger\">";
					}
				} else if($answer == "ALWAYS" || $answer == "OFTEN"){
					//change background to green on question 2
					echo "<span class=\"label label-danger\">";
				} else if($answer == "NEVER" || $answer == "RARELY") {
					//change background to red on question 2
					echo "<span class=\"label label-success\">";
				} else {
					echo "<span class=\"label label-default\">";
				}

				echo $answer ;
				if ($i !=9){
					//question 9 is open answer and doens't need span closed
					echo "</span>";
				}
				echo "</td>";
		   }
		   }



		?>

			</tbody>


		</table>


	</div><!-- /print -->



<?php  include ('includes/footer.inc.php');  ?>
