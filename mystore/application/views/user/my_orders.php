<div class="main">
	
	<?php if($orders):?>
	<table class="show-orders">

		<tr class="row">
			<th class="col">
				Product
			</th>
			<th class="col">
				Details
			</th>
			<th class="col">
				Price
			</th>
			
			<th class="col">
				Order Time
			</th>
			<th class="col">
				
			</th>
		</tr>

		<?php foreach($orders as $order): ?>
		<tr class="order row bg-success text-light">
			<td class="col">
				<?= $order['name'] ?>
			</td>
			<td class="col">
				<?= $order['details'] ?>
			</td>	
			<td class="col">
				<span>Rs. </span><?= $order['price'] ?>
			</td>
			<td class="col">
				<?= $order['time'] ?>
			</td>
			<td class="col">
				<form>
					<input class="btn btn-warning disabled" type="submit" name="cancel_order" value="Cancel Order">	
				</form>
				
			</td>
		</tr>	
		<?php endforeach; ?>

	</table>
	<?php else:?>
	<div>
		No Orders recently yet!
	</div>	
<?php endif; ?>
</div>