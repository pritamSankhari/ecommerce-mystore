<div class="main">

	<div>
		<form class="confirm-order-form bg-success" action="<?= site_url('order') ?>" method="post">
			<div class="form-group">
				<label>Name:</label>
				<input class="form-control" type="text" name="name" value="<?= $user['name'] ?>" >
			</div>
			<div class="form-group">
				<label>Address:</label>
				<input class="form-control" type="text" name="address" value="<?= $user['address'] ?>" >
			</div>
			<div class="form-group">
				<label>City:</label>
				<input class="form-control" type="text" name="city" value="<?= $user['city'] ?>" >
			</div>
			<div class="form-group">
				<label>Zip code:</label>
				<input class="form-control" type="text" name="zip_code" value="<?= $user['zip_code'] ?>" >
			</div>
			<div class="form-group">
				<label>Contact no. :</label>
				<input class="form-control" type="text" name="contact_no" value="<?= $user['contact_no'] ?>" >
			</div>
			<input type="hidden" name="u_id" value="<?= $_SESSION['user']['id'] ?>">
			<input type="hidden" name="p_id" value="<?= $p_id ?>">
			<input class="order-time" type="hidden" name="order_time">
			<input type="hidden" name="from_ip" value="<?= $_SERVER['REMOTE_ADDR'] ?>">

			<input type="submit" class="btn btn-light" name="confirm_order" value="Confirm order">
		</form>	
	</div>
	
	
</div>

<script type="text/javascript">
	
	

	let countTime = function(){
		t = new Date();
		time = t.getFullYear()+'-'+(t.getMonth()+1)+'-'+t.getDate()+' '+t.getHours()+':'+t.getMinutes()+':'+t.getSeconds();
		
		$('.order-time').val(time);
		
		setTimeout(countTime,1000);
	}

	countTime();
</script>