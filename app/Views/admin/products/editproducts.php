<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<!-----Form Sectionn--->
<div class="row">
	<div class="col-xl-12 mx-auto">
		<h6 class="mb-0 text-uppercase">Edit Products</h6>
		<hr/>
		
		<div class="card border-top border-0 border-4 border-primary">
			<div class="card-body p-5">
				<div class="card-title d-flex align-items-center">
					<div><i class="breadcrumb-item active" aria-current="page"></i>
					</div>
					<h5 class="mb-0 text-primary">Edit Products</h5>
				</div>
				<hr>
				<form class="row g-3" action="<?= base_url('Admin/updateproducts/'.$editpro[0]->id); ?>" method="post" enctype="multipart/form-data">
					<div class="col-md-6">
						<label for="inputFirstName" class="form-label">Category Name</label>
						
						<select class="single-select" name="categoryname">
						    <option selected disabled>Select Category</option>
						    <?php if($category):
						        foreach($category as $cate):
						            if($editpro[0]->category_id == $cate->id):
						    ?>
						    <option value="<?= $cate->id; ?>" selected><?= $cate->categoryname; ?></option>
						    <?php else: ?>
						    <option value="<?= $cate->id; ?>"><?= $cate->categoryname; ?></option>
						    <?php endif; ?>
						    <?php endforeach; else: ?>
						        <h6 style="color:red">Records Not Found</h6>
						    <?php endif; ?>
						</select>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'categoryname'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Product Name</label>
						<input type="text" class="form-control" id="inputLastName" name="productname" value="<?= $editpro[0]->productname; ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'productname'); ?></span>
					</div>
					
					<div class="col-md-4">
						<label for="inputLastName" class="form-label">Regular Price</label>
						<input type="text" class="form-control" id="inputLastName" name="mrpprice" value="<?= $editpro[0]->mrpprice; ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'mrpprice'); ?></span>
					</div>
					<div class="col-md-4">
						<label for="inputLastName" class="form-label">Sale Price</label>
						<input type="text" class="form-control" id="inputLastName" name="price" value="<?= $editpro[0]->price; ?>">
					</div>
					<div class="col-md-4">
						<label for="inputLastName" class="form-label">Stock</label>
						<input type="text" class="form-control" id="inputLastName" name="stock" value="<?= $editpro[0]->stock; ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'stock'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Product Image</label><br>
						<img src="<?= base_url('public/uploads/productimg/'.$editpro[0]->photo); ?>" alt="Avatar" style="width:100px;height:100px">
						<input type="file" class="form-control" id="inputLastName" name="avatar">
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">SKU</label><br>
						<input type="text" class="form-control" id="inputLastName" name="SKU" value="<?= $editpro[0]->SKU; ?>" required>
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Short Description</label>
						<textarea class="form-control" id="inputAddress" name="desctiption" placeholder="Short Description..." rows="3"><?= $editpro[0]->desctiption; ?></textarea>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'desctiption'); ?></span>
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Long Description</label>
						<textarea class="form-control" id="inputAddress" name="longdesc" placeholder="Long Description..." rows="3"><?= $editpro[0]->longdesc; ?></textarea>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'longdesc'); ?></span>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary px-5">UpdateProducts</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>





<?= $this->endSection(); ?> 