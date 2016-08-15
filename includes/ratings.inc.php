<div class="row">
	<div class="col-sm-offset-1 text-center col-xs-6 col-sm-2">
		<label class="radio-inline">
			<h3 class="hidden-sm">NEVER</h3>
			<input type="radio" value="never" id="never" name="question" <?php echo ($question == 'never') ? 'checked' : '' ?> <?php if($_SESSION['question' . $id ] == 'never') {echo "checked=\"checked\"";}?>>

			<img src="img/never.png" alt="NEVER" class="img-responsive" onclick="myFunction()">
		</label>
	</div><!-- /text-center col-xs-6 col-sm-2-->
	<div class="text-center col-xs-6 col-sm-2">
		<label class="radio-inline">
			<h3 class="hidden-sm">RARELY</h3>
			<input type="radio" value="rarely" id="rarely" name="question" <?php echo ($question == 'rarely') ? 'checked' : '' ?> <?php if($_SESSION['question' . $id ] == 'rarely') {echo "checked=\"checked\"";}?>>

			<img src="img/rarely.png" alt="RARELY" class="img-responsive" onclick="myFunction()">
		</label>
	</div><!-- /text-center col-xs-6 col-sm-2-->
	<div class="text-center col-xs-6 col-sm-2">
		<label class="radio-inline">
			<h3 class="hidden-sm">SOMETIMES</h3>
			<input type="radio" value="sometimes" id="sometimes" name="question" <?php echo ($question == 'sometimes') ? 'checked' : '' ?> <?php if($_SESSION['question' . $id ] == 'sometimes') {echo "checked=\"checked\"";}?>>

			<img src="img/sometimes.png" alt="SOMETIMES" class="img-responsive" onclick="myFunction()">
		</label>
	</div><!-- /text-center col-xs-6 col-sm-2-->
	<div class="text-center col-xs-6 col-sm-2">
		<label class="radio-inline">
			<h3 class="hidden-sm">OFTEN</h3>
			<input type="radio" value="often" id="often" name="question" <?php echo ($question == 'often') ? 'checked' : '' ?> <?php if($_SESSION['question' . $id ] == 'often') {echo "checked=\"checked\"";}?>>

			<img src="img/mostly.png" alt="OFTEN" class="img-responsive" onclick="myFunction()">
		</label>
	</div><!-- /text-center col-xs-6 col-sm-2-->
	<div class="text-center col-xs-6 col-sm-2">
		<label class="radio-inline">
			<h3 class="hidden-sm">ALWAYS</h3>
			<input type="radio" value="always" id="always" name="question" <?php echo ($question == 'always') ? 'checked' : '' ?> <?php if($_SESSION['question' . $id ] == 'always') {echo "checked=\"checked\"";}?>>

			<img src="img/always.png" alt="ALWAYS" class="img-responsive" onclick="myFunction()">
		</label>
	</div><!-- /text-center col-xs-6 col-sm-2-->
</div><!-- /row -->
