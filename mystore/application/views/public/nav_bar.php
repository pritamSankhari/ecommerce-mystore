 <nav class="navbar public-navbar navbar-expand-md bg-dark navbar-dark sticky-top">
   
    <!-- Brand -->
    <a class="navbar-brand" href="<?= site_url('main') ?>">My Store</a>
    <ul class="navbar-nav">
	    <li class="nav-item">
	      <button class="sign-in-btn btn btn-success">Sign In</button>
	    </li>
	    <li class="nav-item">
	      <a class="btn btn-success text-light" href="<?= site_url('main/signup') ?>">Sign Up</a>
	    </li>
	</ul>
    
	
	<div class="search-bar">
	  <form class="form-inline" action="">
      <input id="_search_input" class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  	</div>
</nav> 

<div class="sign-in-form bg-success">
	
	<form action="<?= site_url('user/signin') ?>" method="post">
		
		<!-- REDIRECTION CODE -->
		<!-- ------------------- -->
		<input id="_order_flag" type="hidden" name="order_flag" value="0">
		<!-- ------------------- -->
		
		<?php if(isset($_SESSION['login_error'])&&!empty($_SESSION['login_error'])):  ?>
		<div class="form-group login-error bg-danger" style="padding: 10px;">
			<label>
				<?= $_SESSION['login_error']['msg'] ?>
			</label>
		</div>

		<script type="text/javascript">
			$('.sign-in-form').show();
		</script>

		<?php endif;?>

		

		<div class="form-group email">
			<label>Email:</label>
			<input class="form-control" type="email" name="email">
		</div>
		
		<div class="form-group password">
			<label>Password:</label>
			<input class="form-control" type="password" name="password">
		</div>
		
		<input class="btn btn-dark sign-in-form-btn" type="submit" name="signin" value='Sign in'>
		
		<div class="btn btn-dark close-btn">Cancel</div>
	</form>
</div>

<script type="text/javascript">
	$('.sign-in-btn').click(
		function(){

			$('.sign-in-form').show();
		});
	
	$('.sign-in-form>form>.close-btn').click(
		function(){

			location.reload()
			$('.sign-in-form').hide();
			
		})

</script>

<?php unset($_SESSION['login_error']['msg']); ?>