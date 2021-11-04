<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<!-----Form Sectionn--->
<div class="row">
	<div class="col-xl-12 mx-auto">
		<h6 class="mb-0 text-uppercase">Add Products</h6>
		<hr/>
		
		<div class="card border-top border-0 border-4 border-primary">
			<div class="card-body p-5">
				<div class="card-title d-flex align-items-center">
					<div><i class="breadcrumb-item active" aria-current="page"></i>
					</div>
					<h5 class="mb-0 text-primary">Add Products</h5>
				</div>
				<hr>
				<form class="row g-3" action="<?= base_url('Admin/uploadproduct'); ?>" method="post" enctype="multipart/form-data">
					<div class="col-md-6">
						<label for="inputFirstName" class="form-label">Category Name</label>
						
						<select class="single-select" name="categoryname">
						    <option selected disabled>Select Category</option>
						    <?php if($category):
						        foreach($category as $cate):
						    ?>
						    <option value="<?= $cate->id; ?>"><?= $cate->categoryname; ?></option>
						    <?php endforeach; else: ?>
						        <h6 style="color:red">Records Not Found</h6>
						    <?php endif; ?>
						</select>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'categoryname'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Product Name</label>
						<input type="text" class="form-control" id="inputLastName" name="productname" >
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'productname'); ?></span>
					</div>
					
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Regular Price</label>
						<input type="text" class="form-control" id="inputLastName" name="mrpprice">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'mrpprice'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Sale Price</label>
						<input type="text" class="form-control" id="inputLastName" name="price">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'price'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">SKU</label>
						<input type="text" class="form-control" id="inputLastName" name="SKU" required>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'SKU'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Stock</label>
						<input type="text" class="form-control" id="inputLastName" name="stock">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'stock'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Product Thumbnail</label>
						<input type="file" class="form-control" id="inputLastName" name="avatar" required>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Product Image</label>
						<input type="file" class="form-control" id="inputLastName" name="productimage[]" multiple="multiple" required>
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Short Description</label>
						<textarea class="form-control" id="inputAddress" name="desctiption" placeholder="Short Description..." rows="3"></textarea>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'desctiption'); ?></span>
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Long Description</label>
						<textarea class="form-control" id="inputAddress" name="longdesc" placeholder="Long Description..." rows="3"></textarea>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'longdesc'); ?></span>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary px-5">AddProducts</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>





<?= $this->endSection(); ?> 