<?php
session_start();

//used to check if the user is logged in.
include('includes/isUserLoggedInChecker.php');

//used to check if the user is a student and if so, then redirect them to the index page.
if($_SESSION['userType'] == 'student'){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Emotions Count</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

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

        <!-- Custom styles -->
        <link rel="stylesheet" href="css/style.css" >

    </head>
    <body>

<?php

    include ('../dbConnection.php');

    $id = $_GET['quiz_id'];



    //Define the Question Query

    $sql1= "SELECT * FROM `emotionsquestions` WHERE `survey_id` = 1";

    //Send the question query to the database
    $result = @mysqli_query($connection,$sql1);

    //process the question rows
    while ($row = mysqli_fetch_assoc($result))
    {
        $qus1 = htmlentities($row['question1']);
        $qus2 = htmlentities($row['question2']);
        $qus3 = htmlentities($row['question3']);
        $qus4 = htmlentities($row['question4']);
        $qus5 = htmlentities($row['question5']);
        $qus6 = htmlentities($row['question6']);
        $qus7 = htmlentities($row['question7']);
        $qus8 = htmlentities($row['question8']);


    }

    //Define the Answer Query
    $sql = "SELECT * FROM `survey_answer` WHERE `quiz_id` = '$id';";

    //Send the answer query to the database
    $result = @mysqli_query($connection, $sql);
    // Process the rows


    while ($row = mysqli_fetch_assoc($result))
    {
        $date = date('l F j, Y', strtotime(htmlentities($row['date'])));
        $ans1 = htmlentities(strtoupper($row['answer1']));
        $ans2 = htmlentities(strtoupper($row['answer2']));
        $ans3 = htmlentities(strtoupper($row['answer3']));
        $ans4 = htmlentities(strtoupper($row['answer4']));
        $ans5 = htmlentities(strtoupper($row['answer5']));
        $ans6 = htmlentities(strtoupper($row['answer6']));
        $ans7 = htmlentities(strtoupper($row['answer7']));
        $ans8 = htmlentities(strtoupper($row['answer8']));
        $ans9 = htmlentities($row['answer9']);

     $sid= htmlentities($row['student_id']);
    }

    // For the student name
    $sql2= "SELECT student_first_name, student_last_name FROM student_profile JOIN survey_answer ON (student_profile.student_id = $sid)";

    $result = @mysqli_query($connection, $sql2);

    while ($row = mysqli_fetch_assoc($result))
    {
        $fname = htmlentities($row['student_first_name']);
        $lname = htmlentities($row['student_last_name']);

    }
    echo "<div class = 'print'>";
    echo "<h1> Emotions Count Parent Report</h1>";
	
	//Message from Teacher (Client) to Parents introducing Emotions Count Survey.
	echo "<p> Dear Parent/Guardian:</p>";

	echo "<p>Recently, your child completed the screener for Emotions Count. This report shares both the screener questions as well as your child's current responses. This data will be used to help facilitate tiers of social &amp; emotional support as well as address any specific questions or concerns your child may have at this time. </p>";

	echo "<p>Please contact your child's classroom teacher or the building counselor if you have any questions or would like additional information. </p>";
	echo "<hr>";
	echo "<div class=\"row\">";
	echo "<div class=\"col-xs-12 col-sm-6\">";
    echo "<h3> Student Name: ";

		echo $fname;
		echo " ";
		echo $lname;
		echo "</h3>";
		echo "</div><div class=\"col-xs-12 col-sm-6\">";
		echo "<h3>";
		echo "Date of the Survey: ";
		echo $date;
		echo "</h3>";
		echo "</div>";
		echo "</div>";
    echo "<table class = 'table table-striped'>";
	//print out question text and answer for all but last question
	for ($i =1; $i <= 8; $i++ ) {
		$answer = ("ans" . $i);
		$answer = $$answer;
		$question = ("qus" . $i);
		$question = $$question;

        echo "<tr>";
			echo "<td>";
				echo $question ;
			echo "</td>";
			echo "<td>";
				echo $answer;
			echo "</td>";
		echo "</tr>";
	}
		//display open ended response across two columns

		echo "<tr>";
			echo "<td colspan='2'> <strong>Additional Comments:</strong> ";
				echo $ans9;
			echo "</td>";
		echo "</tr>";
	echo"</table>";
	echo "<div class='print'>
			<form><input type='button' value ='Print' onClick='window.print();return false;'></form>
		</div>";
	echo "</div>";
?>
 

    </body>
</html>
