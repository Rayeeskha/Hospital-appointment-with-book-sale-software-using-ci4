<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<!-----Form Sectionn--->
<div class="row">
	<div class="col-xl-12 mx-auto">
		<h6 class="mb-0 text-uppercase">Add User</h6>
		<hr/>
		
		<div class="card border-top border-0 border-4 border-primary">
			<div class="card-body p-5">
				<div class="card-title d-flex align-items-center">
					<div><i class="breadcrumb-item active" aria-current="page"></i>
					</div>
					<h5 class="mb-0 text-primary">Add User</h5>
				</div>
				<hr>
				<form class="row g-3" action="<?= base_url('Admin/uploaduser'); ?>" method="post" enctype="multipart/form-data">
					<div class="col-md-6">
						<label for="inputFirstName" class="form-label">Username</label>
						<input type="text" class="form-control" id="inputFirstName" name="username" value="<?= set_value('username'); ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'username'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputFirstName" class="form-label">Email</label>
						<input type="text" class="form-control" id="inputFirstName" name="email" value="<?= set_value('email'); ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'email'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputFirstName" class="form-label">Phone</label>
						<input type="text" class="form-control" id="inputFirstName" name="phone" value="<?= set_value('phone'); ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'phone'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Image</label>
						<input type="file" class="form-control" id="inputLastName" name="avatar">
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Password</label>
						<input type="text" class="form-control" id="inputLastName" name="password" value="<?= set_value('password'); ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'password'); ?></span>
					</div>
					<div class="col-md-6">
						<label for="inputLastName" class="form-label">Confirm Password</label>
						<input type="text" class="form-control" id="inputLastName" name="confirmpassword" value="<?= set_value('confirmpassword'); ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'confirmpassword'); ?></span>
					</div>
					<div class="col-12">
						<label for="inputAddress" class="form-label">Address</label>
						<textarea class="form-control" id="inputAddress" name="desctiption" placeholder="Enter Address..." rows="3"></textarea>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary px-5">Add User</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>





<?= $this->endSection(); ?> 