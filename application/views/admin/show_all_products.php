<div class="main">
	<!-- PRODUCTS -->
	<!-- ------------------------------- -->
	<div class="products">

		<?php if(isset($no_product_msg)&&!empty($no_product_msg)):?>
		
		<div>
			<?= $no_product_msg ?>
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

	<!-- PAGINATION -->
	<!-- ------------------------------- -->
	<div class="more-pages">
		
		<ul class="pagination">

			<?php if($page_no==1): ?>
			
			<li class="page-item disabled">
				<a class="page-link" href="#">Previous</a>
			</li>

			<?php else:?>
				<?php $j = $page_no-1; ?>

			<li class="page-item">
				<a class="page-link" href="<?= site_url("admin/index/$j")?>">Previous</a>
			</li>	

			<?php endif; ?>
			

			<?php for($i=1;$i<=$total_pages;$i++): ?>
			<?php if($page_no==$i): ?>

			<li class="page-item active">
				<a class="page-link" href="<?= site_url("admin/index/$i")?>">
					<?= $i ?>
				</a>
			</li>
			
			<?php else: ?>	

			<li class="page-item ">					
				<a class="page-link" href="<?= site_url("admin/index/$i")?>">
					<?= $i ?>
				</a>
			</li>	

			<?php endif; ?>
			
			<?php endfor;?>
		  
			<?php if($page_no<$total_pages): ?>
				<?php $j = $page_no+1; ?>

			<li class="page-item">
				<a class="page-link" href="<?= site_url("admin/index/$j")?>">Next</a>
			</li>

			<?php else:?>

			<li class="page-item disabled">
				<a class="page-link" href="#">Next</a>
			</li>	

			<?php endif;?>

		</ul>
	</div>
	<!-- ------------------------------- -->
</div>

