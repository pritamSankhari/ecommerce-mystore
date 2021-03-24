<!-- PRODUCTS -->
	<!-- ------------------------------- -->
	<div class="products">

		<?php if(!$products):?>
		
		<div>
			
		</div>

		<?php else: ?>
		<?php foreach($products as $product): ?>
		
		<div class="product">
			<a>
				
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
			<div class="operation">
				<div class="edit-btn">
					<a href="<?= site_url('admin/edit/'.$product['id']) ?>" class="btn btn-dark">Edit</a>	
				</div>	
				
				<form action="<?= site_url('product/delete') ?>" method="post">

					<input type="hidden" name="p_id" value="<?= $product['id'] ?>">
					<input class="btn btn-danger" type="submit" name="delete" value="Delete">
				
				</form>	
			</div>
			
		</div>
		
		
		<?php endforeach;?>
		<?php endif?>

	</div>
	<!-- ------------------------------- -->