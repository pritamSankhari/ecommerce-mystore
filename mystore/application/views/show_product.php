<div class="main">
	<div class="product-to-buy">

		<div>
			<div class="product-image-div">
				<img src="<?= base_url($product['image']) ?>" style="width: 500px;height: 500px">
			</div>
			<div class="product-info">
				
				<form class="place-order-form" action="<?= site_url('product/confirm_order')?>" method="post">
					<input type="hidden" name="p_id" value="<?= $product['id'] ?>">
					<div class="place-order-btn btn btn-dark"> Place order</div>
				</form>
				
				<?php if(!isset($_SESSION['user'])||empty($_SESSION['user'])):?>

				
				<script type="text/javascript">
					
					// IF USER IS NOT LOGGED IN
					// -------------------------
					// SET PRODUCT ID AS AN ORDER FLAG IN SIGN_IN FORM
					// -------------------------
					$('#_order_flag').val("<?= $product['id']?>")
					// -------------------------
					
					// MODIFY PLACE ORDER BUTTON FUNCTIONALITY
					// -------------------------
					$('.place-order-btn').text('Sign in to Order')
					$('.place-order-btn').click(
						function(){

							$('.sign-in-form').show();
						})
					// -------------------------

				</script>
				<!-- ------------------ -->

				<?php else: ?>

				<!-- DEFAULT SETTINGS FOR PLACE ORDER FORM  -->
				<!-- ------------------ -->
				<script type="text/javascript">

					$('.place-order-btn').click(
						function(){

							$('.place-order-form').submit();
						})
					
				</script>
				<!-- ------------------ -->
				
				<?php endif; ?>

			
				<div class="row">
					<div class="col attr-name-col">
						Name:
					</div>
					<div>
						<?= $product['name']?>
					</div>
				</div>
				<div class="text-dark row">
					<div class="col attr-name-col">
						Details:
					</div>
					<div class="col">
						<?= $product['details']?>
					</div>
				</div>
				<div class="row product-price-row">
					<div class="col attr-name-col">
						Price:
					</div>
					<div class="col">
						Rs <?= $product['price']?> /-
					</div>
				</div>
				
				
			</div>
		</div>
		
	</div>
</div>