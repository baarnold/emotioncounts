<?php

//Below are the if statements that check if a question hasn't been answered.

if($questionNumberCheck > 1){
  if($_SESSION['question1'] == "")
  {
  	header("Location: question_template.php?question=1&error=true");
  }
}

if($questionNumberCheck > 2){
  
  if($_SESSION['question2'] == "")
  {
  	header("Location: question_template.php?question=2&error=true");
  }
}

if($questionNumberCheck > 3){
 
  if($_SESSION['question3'] == "")
  {
  	header("Location: question_template.php?question=3&error=true");
  }
}

if($questionNumberCheck > 4){

  if($_SESSION['question4'] == "")
  {
  	header("Location: question_template.php?question=4&error=true");
  }
}

if($questionNumberCheck > 5){
  
  if($_SESSION['question5'] == "")
  {
  	header("Location: question_template.php?question=5&error=true");
  }
}

if($questionNumberCheck > 6){
 
  if($_SESSION['question6'] == "")
  {
  	header("Location: question_template.php?question=6&error=true");
  }
}

if($questionNumberCheck > 7){

  if($_SESSION['question7'] == "")
  {
  	header("Location: question_template.php?question=7&error=true");
  }
}

if($questionNumberCheck > 8){
 
  if($_SESSION['question8'] == "")
  {
  	header("Location: question_template.php?question=8&error=true");
  }
}

 ?>
