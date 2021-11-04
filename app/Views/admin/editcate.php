<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<!-----Form Sectionn--->
<div class="row">
	<div class="col-xl-12 mx-auto">
		<h6 class="mb-0 text-uppercase">Edit Category</h6>
		<hr/>
		
		<div class="card border-top border-0 border-4 border-primary">
			<div class="card-body p-5">
				<div class="card-title d-flex align-items-center">
					<div><i class="breadcrumb-item active" aria-current="page"></i>
					</div>
					<h5 class="mb-0 text-primary">Edit Category</h5>
				</div>
				<hr>
				<form class="row g-3" action="<?= base_url('Admin/updatecate/'.$editcate[0]->id); ?>" method="post" enctype="multipart/form-data">
					<div class="col-md-12">
						<label for="inputFirstName" class="form-label">Category Name</label>
						<input type="text" class="form-control" id="inputFirstName" name="categoryname" value="<?= $editcate[0]->categoryname; ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'categoryname'); ?></span>
					</div>
					<!--<div class="col-md-6">-->
					<!--	<label for="inputLastName" class="form-label">Category Image</label>-->
					<!--	<input type="file" class="form-control" id="inputLastName" name="avatar">-->
					<!--</div>-->
					<div class="col-12">
						<label for="inputAddress" class="form-label">Category Description</label>
						<textarea class="form-control" id="inputAddress" name="desctiption" placeholder="Category Description..." rows="3"><?= $editcate[0]->desctiption; ?></textarea>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary px-5">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>





<?= $this->endSection(); ?> 