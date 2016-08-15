<?php session_start(); ?>
<?php  include ('includes/header.inc.php');  ?>

			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 text-center">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h1>Welcome to Emotions Count!!</h1>
							<?php
							if($_SESSION['notLoggedIn'] == true){
								$_SESSION['notLoggedIn'] = false;
								echo "<script type='text/javascript'> alert('That was not the correct login.'); </script>";
							}
							 ?>
						</div><!-- /.panel-heading -->


						<div class="panel-body" id="media-panel">
<div class="centering">
									<a href="video.php"><img class="img-responsive" src="img/ecLogo.png" alt="Emotions Count Video"></a>
						</div><!-- /.centering -->
</div><!-- /.media-panel -->


						<div class="panel-body">
							<p class="indexInfo">We all have good days, bad days & those that are somewhere in between. Your friends at Emotions Count want you to know that all your feelings are very important & each & every one counts!!
							</p>
						</div><!-- /.panel-body -->
					</div><!-- /.panel-default -->
				</div><!-- /.col-xs-10 -->
			</div><!-- /.row -->


			<!--Button that leads user to survey.-->
			<div class="row text-center">
				<div class="col-xs-12">

					<!-- Trigger the modal with a button -->
					<?php
					if (!isset($_SESSION["loggedIn"])) {
						echo "<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Enter</button>";
						include ('includes/modal.inc.php');
					}else{
						echo "<a href='question_template.php'><button type='button' class='btn btn-info btn-lg'>Enter</button></a>";
					}

					 ?>




				</div><!-- /.col-xs-12 -->
			</div><!-- /.row -->



<?php  include ('includes/footer.inc.php');  ?>