<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Login</h4>
			</div><!-- /.modal-header -->
			<form action="login.php" method="post">
				<div class="modal-body">
			

					<!--used to type in the user name-->
					<input type="text" name="username" placeholder="user name">
					<br>
					<br>

					<!--used to type in the password-->
					<input type="password" name="password" placeholder="password">
					<br>
					<br>
					<select class="btn btn-default" name="userType">
						<option value="student">student</option>
						<option value="teacher">teacher</option>
						<option value="counselor">counselor</option>
					</select>
				
				</div><!-- /.modal-body -->

				<!--used to submit the information to login-->
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" name="button">Login</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div><!-- /.modal-footer -->
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->	
</div><!-- /.modal fade -->	