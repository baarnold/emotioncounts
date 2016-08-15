<?php  include ('includes/header.inc.php');  ?>
<div class="row">
	<div class="col-xs-12 text-center">
		<h1><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>&nbsp;</h1>
		<h1>Thank you for completing this survey!!</h1>
		<p><a href="resources.php">Links</a> to more support. </p>
	</div>
</div>

		
	

<!--Div for the text to indicate to the user what to do.-->
<div class="row">
	<div class="col-xs-6 col-sm-offset-3">
		<p class="centering">
			Click the button when you are done.
		</p>
	</div>
</div> <!--end of div for text-->

<!--Div that holds the button that links to the logout page.-->
<div class="row centering">
	<div class="col-xs-6 col-sm-offset-3">
		<form action="logout.php">
      <button type="submit" class="btn btn-default" name="button">Finished</button>
    </form>

		<!--Button sends the user back to the index page.-->

	</div>
</div> <!--End of div for the row with the button-->

 <?php  include ('includes/footer.inc.php');  ?>
