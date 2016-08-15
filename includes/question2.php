<?php  include ('includes/header.inc.php');  ?>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-12">
				<!-- Question for Student -->
				<h1 class="question">
				  How often do you feel bullied at school? (includes the bus, classroom, and playground)
				</h1>
			</div><!-- /col-xs-12-->
		</div><!-- /row -->
		<div class="faces">
			<?php  include ('includes/reverseRatings.inc.php'); ?>
				</div><!-- /faces -->
		<div class="prevNext">
			<div class="row ">
				<div class="col-sm-3 hidden-xs">
					<!-- Link to previous question -->
					<h2 class="prevQuestion">
						<a href="question1.php">
							<span class="glyphicon glyphicon-circle-arrow-left"></span> 
							<span class="hidden-xs hidden-sm">Previous</span> 
						</a>
					</h2>
				</div><!-- /col-xs-3-->	
				<?php  include ('includes/isAnswered.php'); ?>
						<a href="question3.php"> <!-- link is gray by default -->
								<span class="hidden-sm">Next</span> 
								<span class="glyphicon glyphicon-circle-arrow-right"></span>
							</div>
						</a>
					</h2>
				</div><!-- /col-xs-3-->	
			</div><!-- /row -->
		</div><!-- /prevNext -->	
	</div> <!-- /form-group -->
<?php  include ('includes/footer.inc.php'); ?>