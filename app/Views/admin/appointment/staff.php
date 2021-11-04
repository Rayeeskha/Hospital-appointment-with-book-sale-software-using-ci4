<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<!-----Form Sectionn--->
<div class="row">
	<div class="col-xl-12 mx-auto">
		<h6 class="mb-0 text-uppercase">Add Doctor</h6>
		<hr/>
		
		<div class="card border-top border-0 border-4 border-primary">
			<div class="card-body p-5">
				<div class="card-title d-flex align-items-center">
					<div><i class="breadcrumb-item active" aria-current="page"></i>
					</div>
					<h5 class="mb-0 text-primary">Add Staff Member</h5>
				</div>
				<hr>
				<form class="row g-3" action="<?= base_url('Admin/uploadstaff'); ?>" method="post" enctype="multipart/form-data">
				    <div class="col-md-6">
    					<label for="inputFirstName" class="form-label">Staff Department</label>
						<select class="single-select" name="department" >
						    <option selected disabled>Select Category</option>
						    <?php if($department):
						        foreach($department as $dept):
						    ?>
						    <option value="<?= $dept->id; ?>"><?= $dept->departmentname; ?></option>
						    <?php endforeach; else: ?>
						        <h6 style="color:red">Records Not Found</h6>
						    <?php endif; ?>
						</select>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'department'); ?></span>
					</div>
					<div class="col-md-6">
    					<label for="inputFirstName" class="form-label">Name</label>
						<input type="text" class="form-control" id="inputFirstName" name="name" value="<?= set_value('name'); ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'name'); ?></span>
					</div>
					<div class="col-md-6">
    					<label for="inputFirstName" class="form-label">Mobile</label>
						<input type="text" class="form-control" id="inputFirstName" name="mobile" value="<?= set_value('mobile'); ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'mobile'); ?></span>
					</div>
					<div class="col-md-6">
    					<label for="inputFirstName" class="form-label">Email</label>
						<input type="text" class="form-control" id="inputFirstName" name="email" value="<?= set_value('email'); ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'email'); ?></span>
					</div>
					
					
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Photo</label>
						<input type="file" class="form-control" id="inputLastName" name="avatar">
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Doctor Fee</label>
						<input type="number" class="form-control" id="inputLastName" name="fee" required value="<?= set_value('fee'); ?>">
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Speciality</label>
						<textarea class="form-control" id="inputAddress" name="Speciality" placeholder="Speciality..." rows="3"><?= set_value('Speciality'); ?></textarea>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary px-5">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>





<?= $this->endSection(); ?> 