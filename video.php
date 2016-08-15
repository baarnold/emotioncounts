<?php include('includes/header.inc.php'); ?>

<!--contains the video about emotions count-->
<div class="container centering">
  <script language="JavaScript" type="text/javascript" src="http://vhss-d.oddcast.com/vhost_embed_functions_v2.php?acc=5903200&js=1"></script>
									<script language="JavaScript" type="text/javascript">AC_VHost_Embed(5903200,450,600,'',1,1, 2505061, 0,1,0,'ef6ca9113daa374a1ca096495a7ade95',9);</script>

									
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
</div><!-- /.centering-->

<?php include('includes/footer.inc.php'); ?>
