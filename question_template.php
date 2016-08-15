<?php
	session_start();

	//used to check if user is logged in and if not, then relocate to login page.
	if(!isset($_SESSION['loggedIn'])){
		header("Location: login.php");
	}
	
	$id = 1 ;
	if (isset($_GET['question'])){
	 $id = $_GET['question'];
    }
	
	$error = false;
	if (isset($_GET['error'])){
		$error = $_GET['error'];
	}

	
	//echo "<p> questionNumber:" . $questionNumberCheck . "</p>";
	
	//Temoprarily holds the values for the question
	$questionResponse = $_POST['question'];
	
	//echo "<p> Response:" . $questionResponse . "</p>";

	//used to hold the value from the temp variable
	if($questionResponse != ""){

		$_SESSION['question' . ($id - 1)] = $questionResponse;
		//echo "<p> question:" . $_SESSION['question' . ($id -1)] . "</p>";
	}
	//echo "<p> Session Array:";
	//print_r ($_SESSION) ;
	//echo "</p>";
	
	//Used for checking if the previous questions have been answered or not.
	$questionNumberCheck = $id;
	include ('includes/emptyAnswerChecker.inc.php');
	
	include ('../dbConnection.php');
    
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
 <?php  include ('includes/header.inc.php');  ?>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-12">
				<!-- Action will go to next question unless on last question-->
				<form name="formQuestion<?= $id  ?>" action="
				<?php
					if ($id < count($questions) ){
						//while there is another question in the array, make next link to next question
						echo "question_template.php?question=" ;
						echo $id + 1 ;
					} else {
						//on last question in the array, make next link to open ended question
						echo "questionEnd.php";
					}
				
				?> " method="post">
					<!-- Question for Student from array -->
					<h1 class="question text-center">
						<?php echo $questions[$id]; ?>
					</h1>
					
					<div class="faces">
					<?php 
						if ($id !=2 ){
							include ('includes/ratings.inc.php');
						} else {
							//if question 2, display faces in reverse
							include ('includes/reverseRatings.inc.php');
						}
					?>
					</div><!-- /faces -->
					<div class="col-xs-10 col-xs-offset-1">
					<!-- Progress Bar -->
					<div class="progress">
					  <div class="progress-bar progress-bar-striped active' role='progressbar'aria-orientation=”horizontal”  aria-valuenow="<?=(($id -1)/(float) count($questions))*100  ?>" aria-valuemin="0" aria-valuemax="<?= count($questions) +1 ?>" style="width: <?= (($id -1)/(float) count($questions))*100 ?>%">
						<span class="sr-only"><?= (($id - 1)/(float) count($questions))*100 ?>% Complete</span>
						<?= (($id - 1)/(float) count($questions))*100 ?>%
					  </div><!-- /progress-bar -->
					</div><!-- /progress -->
					</div><!-- /col-xs-10 col-xs-offset-1 -->
					<div class="prevNext">
						<div class="row ">
							<div class="col-sm-3 hidden-xs text-center ">
								<!-- Link to previous question if not on Question 1-->
								<?php if ($id != 1){?>
								<h2 class="prevQuestion">
										<span class="hidden-sm">
											<a href="question_template.php?question=<?= $id - 1 ?>">
											<button class="arrowLeft" type="button" onclick="formQuestion<?= $id  ?> .action='question_template.php?question<?= $id - 1 ?> .php'">
												<span> Previous</span>
											</button>
											</a>
										</span>
								</h2>
								<?php } ?>
							</div><!-- /col-xs-3-->	
							<div class="col-xs-12 col-sm-6">
							<!-- Error Message if question not answered -->
								<?php if ($error): ?>
								<h2 class="error text-center">
									<span class="glyphicon glyphicon-warning-sign"></span>
									Please Select your emotion
								</h2>
								<?php endif ?>
							</div><!-- /col-sm-6-->
							<div class="col-xs-12 col-sm-3">
								<!-- Link to next question -->
								<h2 class="nextQuestion  text-center">
									<div class="next">
										<span class="hidden-sm">
											<?php if ($id < count($questions)){?>
												<a href="question_template.php?question=<?= $id+1 ?> " > 
											<?php } else{?>
												<a href="questionEnd.php" >
											<?php }?>
												<button id="nextn" class="rightButtonClosed" name="submitButton" type="submit">
													<span>Next </span>
												</button>
												</a>
										</span>
									</div><!-- /next-->	
								
								</h2>
							</div><!-- /col-xs-3-->	
						</div><!-- /row -->
					</div><!-- /prevNext -->	
				</form><!-- /form -->	
			</div><!-- /col-xs-12-->
		</div><!-- /row -->
	</div> <!-- /form-group -->
<?php  include ('includes/footer.inc.php'); ?>