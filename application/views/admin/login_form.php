<form action="<?= site_url('admin/signin') ?>" method="post">
	<div class="form-group">
		<input class="form-control" type="text" name="admin_id" placeholder="Admin ID">
	</div>
	<div class="form-group">
		<input class="form-control" type="password" name="admin_pwd" placeholder="Password">
	</div>
	<input type="submit" name="signin" value="Sign In">
</form>