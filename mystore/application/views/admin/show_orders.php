<div class="main">
	<table class="show-orders">

		<tr class="row">
			<th class="col">
				Customer Name		
			</th>
			<th class="col">
				Product Id
			</th>
			<th class="col">
				Address (1)
			</th>
			<th class="col">
				Contact no. (1)
			</th>
			<th class="col">
				City (1)		
			</th>
			<th class="col">
				Zip Code		
			</th>
			<th class="col">
				Order Time
			</th>
			<th class="col">
				More
			</th>
		</tr>

		<?php foreach($orders as $order): ?>
		<tr class="order row bg-warning">
			<td class="col">
				<?= $order['name'] ?>
			</td>
			<td class="col">
				<?= $order['product_id'] ?>
			</td>	
			<td class="col">
				<?= $order['address'] ?>
			</td>
			<td class="col">
				<?= $order['contact_no'] ?>
			</td>
			<td class="col">
				<?= $order['city'] ?>
			</td>
			<td class="col">
				<?= $order['zip_code'] ?>
			</td>
			<td class="col">
				<?= $order['time'] ?>
			</td>
			<td class="col">
				more
			</td>
		</tr>	
		<?php endforeach; ?>

	</table>
</div>
