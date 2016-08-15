<?php
session_start();

//used to check if user is logged in and if not, then relocate to login page.
if(!isset($_SESSION['loggedIn'])){
	header("Location: login.php");
}

//Temoprarily holds the values for the question
$questionResponse = $_POST['question'];
		
//used to hold the value from the temp variable
if($questionResponse != ""){

	$_SESSION['question8'] = $questionResponse;
	//echo "<p> question:" . $_SESSION['question' . ($id -1)] . "</p>";
}
//Used for checking if the previous questions have been answered or not.
$questionNumberCheck = 9;
include ('includes/emptyAnswerChecker.inc.php');

$LastResponse = $_POST['message'];

//used to hold the value from the temp variable

$processed = false;

if (isset($_POST['submit'])) {
	
	if($LastResponse != ""){

		$_SESSION['question9'] = $LastResponse;
	}
	
	//echo "<p> Session Array:";
	//print_r ($_SESSION) ;
	//echo "</p>";

	require '../dbConnection.php';
		//query strings for Columns and Values
		$allquestions = "";
		$allAnswers ="";
		
		
		//if question is stored in session, add it to query string

		for ($i = 1; $i < count($_SESSION); $i++){
			if (isset($_SESSION['question'. $i])) {
				$allquestions .= "answer" . $i . ", ";
				$allAnswers .= "\"" . $_SESSION['question'. $i] . "\", ";
			}
		}
		

		//add student_id to query sting
		$allquestions .= "student_id";
		$allAnswers .= "\"" . $_SESSION['userId'] . "\"";
		
		// Set query;
         $sql= "INSERT INTO `survey_answer` ($allquestions) VALUES ($allAnswers)";
         
         // Send the query to the database
         $ec = @mysqli_query($connection, $sql)
         or die ("Error executing query: $sql");
         
		if ($ec){
				header("Location: survey_congratulations.php");
			}

}

	
 ?>
<?php  include ('includes/header.inc.php');  ?>
	<div class="form-group">

		<form name="LastQuestion" action="questionEnd.php" method="post">
			<div class="row">
				<div class=" col-xs-offset-1 col-xs-10">

					<!-- Question for Student -->
					<h3 class="question text-center">
					  Is there anything that has happened on the playground, in the classroom, on the bus, at home, or anywhere that you want to share that has been bothering you? <br />Please share below.
					</h3>
				</div><!-- /col-xs-10-->

				<div class=" col-xs-offset-1 col-xs-10">
					<textarea name="message" rows="8" class="form-control"></textarea>
				</div><!-- /col-xs-10-->
			</div><!-- /row -->
			<div class="prevNext">
				<div class="row ">
					<div class="col-sm-3 hidden-xs">
						<!-- Link to previous question -->
						
					</div><!-- /col-xs-3-->

					
						<span class="hidden-sm">
							<button class="rightButton" type="submit" name="submit">
								<span>Submit </span>
							</button>
						</span>
					
					
				</div><!-- /row -->
			</div><!-- /prevNext -->
			</form>
		</div> <!-- /form-group -->
				


<?php  include ('includes/footer.inc.php'); ?>
