<form method="post" action="<?= site_url('product/add') ?>" enctype="multipart/form-data">
	
	<div class="form-group">
		<input class="form-control" type="text" name="p_title" placeholder="Product title">	
	</div>
	<div class="form-group">
		<input class="form-control" type="text" name="p_details" placeholder="Product details">	
	</div>
	<div class="form-group">
		<input class="form-control" type="number" name="p_price" placeholder="Price">	
	</div>
	<div class="form-group">
		<select class="form-control">
			<?php foreach($categories as $category): ?>
			<option name="p_category" value="<?= $category['id'] ?>">
				<?= $category['name'] ?>		
			</option>
			<?php endforeach; ?>
		</select>
		
	</div>
	
	<div class="form-group">
		<input class="form-control" type="text" name="p_tags" placeholder="Tags">	
	</div>

	<div class="form-group">
		<input class="form-control" type="number" name="p_stock" placeholder="Stock">	
	</div>
	
	<div class="form-group">
		<input class="form-control" type="text" name="p_image_name" placeholder="Image file name">	
	</div>

	<div class="form-group">
		<input class="form-control" type="file" name="image">
	</div>
	
	<input class="btn btn-warning" type="submit" name="add" value="Add">
	
</form>