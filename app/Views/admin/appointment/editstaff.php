<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<!-----Form Sectionn--->
<div class="row">
	<div class="col-xl-12 mx-auto">
		<h6 class="mb-0 text-uppercase">Edit Doctor</h6>
		<hr/>
		
		<div class="card border-top border-0 border-4 border-primary">
			<div class="card-body p-5">
				<div class="card-title d-flex align-items-center">
					<div><i class="breadcrumb-item active" aria-current="page"></i>
					</div>
					<h5 class="mb-0 text-primary">Edit Doctor</h5>
				</div>
				<hr>
				<form class="row g-3" action="<?= base_url('Admin/updatestaff/'.$editstaff[0]->id); ?>" method="post" enctype="multipart/form-data">
				    <div class="col-md-6">
    					<label for="inputFirstName" class="form-label">Staff Department</label>
						<select class="single-select" name="department">
						    <option selected disabled>Select Category</option>
						    <?php if($department):
						        foreach($department as $dept):
						            if($editstaff[0]->department_id == $dept->id):
						    ?>
						    <option value="<?= $dept->id; ?>" selected><?= $dept->departmentname; ?></option>
						    <?php else: ?>
						    <option value="<?= $dept->id; ?>"><?= $dept->departmentname; ?></option>
						    <?php endif; ?>
						    <?php endforeach; else: ?>
						        <h6 style="color:red">Records Not Found</h6>
						    <?php endif; ?>
						</select>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'department'); ?></span>
					</div>
					<div class="col-md-6">
    					<label for="inputFirstName" class="form-label">Name</label>
						<input type="text" class="form-control" id="inputFirstName" name="name" value="<?= $editstaff[0]->name; ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'name'); ?></span>
					</div>
					<div class="col-md-6">
    					<label for="inputFirstName" class="form-label">Mobile</label>
						<input type="text" class="form-control" id="inputFirstName" name="mobile" value="<?= $editstaff[0]->mobile; ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'mobile'); ?></span>
					</div>
					<div class="col-md-6">
    					<label for="inputFirstName" class="form-label">Email</label>
						<input type="text" class="form-control" id="inputFirstName" name="email" value="<?= $editstaff[0]->email; ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'email'); ?></span>
					</div>
					
					
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Photo</label>
						<input type="file" class="form-control" id="inputLastName" name="avatar">
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Doctor Fee</label>
						<input type="number" class="form-control" id="inputLastName" name="fee" value="<?= $editstaff[0]->fee; ?>" required>
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Speciality</label>
						<textarea class="form-control" id="inputAddress" name="Speciality" placeholder="Speciality..." rows="3">
						    <?= $editstaff[0]->Speciality; ?>
						</textarea>
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