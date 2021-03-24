<div class="main">

	<div>
		<form action="<?= site_url('user/signup')?>" method="post">
			<div class="form-group">
				<label>Full name:</label>
				<input class="form-control" type="text" name="name" placeholder="Full Name">
			</div>

			<div class="form-group">
				<label>Email:</label>
				<input class="form-control" type="eamil" name="email" placeholder="Eamil Address">
			</div>

			<div class="form-group">
				<label>Contact No.:</label>
				<input class="form-control" type="text" name="contact_no" placeholder="Contact No.">
			</div>

			<div class="form-group">
				<label>Address:</label>
				<input class="form-control" type="text" name="address" placeholder="Address">
			</div>			

			<div class="form-group">
				<label>City:</label>
				<input class="form-control" type="text" name="city" placeholder="City">
			</div>

			<div class="form-group">
				<label>Pin Code:</label>
				<input class="form-control" type="text" name="pin_code" placeholder="Pin Code">
			</div>

			<div class="form-group">
				<label>Password:</label>
				<input class="form-control" type="password" name="pwd" placeholder="Password">
			</div>

			<div class="form-group">
				<label>Confirm password:</label>
				<input class="form-control" type="password" name="cpwd" placeholder="Confirm Password">
			</div>
			<input type="submit" name="signup" value="Sign Up">
		</form>
	</div>
	
</div>