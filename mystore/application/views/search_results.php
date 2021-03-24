<!-- PRODUCTS -->
	<!-- ------------------------------- -->
	<div class="products">

		<?php if(!$products):?>
		
		<div>
			
		</div>

		<?php else: ?>
		<?php foreach($products as $product): ?>
		
		<div class="product">
			<a href="<?= site_url('main/product/'.$product['id']) ?>">
				
				<!-- PRODUCT NAME -->
				<!-- ------------------------------- -->
				<div class="text-success">
					<?= $product['name'] ?>
				</div>	
				<!-- ------------------------------- -->

				<img src="<?= base_url($product['image']) ?>" style="width:300px;height:300px;">
			</a>

			<div class="attr">
				<table>
					<tr>
						<th>
							Price:
						</th>
						<td>
							Rs <?= $product['price'] ?>	/-
						</td>
					</tr>
				</table>
			</div>

			<div class="buy-btn">
				<a href="<?= site_url('main/product/'.$product['id']) ?>" class="btn btn-success">Buy</a>	
			</div>
		</div>
		
		
		<?php endforeach;?>
		<?php endif?>

	</div>
	<!-- ------------------------------- -->