<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<center><h6 class="mb-0 text-uppercase">Edit Appointment</h6></center>
<hr/>
<div class="card">
	<div class="card-body">
	    <form class="row g-3" action="<?= base_url('Admin/updateappointment/'.$appointment[0]->id); ?>" method="post" enctype="multipart/form-data">
				<div class="mb-3">
                <div class="row">
                <div class="col-xl-6 mx-auto">
			       <label class="form-label">Doctor Name</label>
					<select class="single-select" id="doctor" name="doctor">
					    <option value="" selected disabled>Select Doctor</option>
						<?php if($doctor):
						    count($doctor);
						    foreach($doctor as $doc):
						        if($doc->id == $appointment[0]->doctor_id):
						?>
						<option value="<?= $doc->id; ?>" selected><?= $doc->name; ?></option>
						<?php else: ?>
						<option value="<?= $doc->id; ?>" ><?= $doc->name; ?></option>
						<?php endif; ?>
						<?php endforeach; else: ?>
						<h6 style="color:red">Records Not Found</h6>
						<?php endif; ?>
					</select>
					<input type="hidden" id="edit_doctor_id" value="">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'doctor'); ?></span>
				</div>
			    <div class="col-xl-6 mx-auto">
			       <label class="form-label">Department</label>
					<select class="single-select" id="department_slct">
					    <?php $dept =  fetch_cate_rec('department',$doctor[0]->department_id); ?>
						<option value="<?= $dept[0]->departmentname; ?>" selected><?= $dept[0]->departmentname; ?></option>
					</select>
				</div>
				<div class="col-xl-6">
				    <label class="form-label">Name</label>
					<input class="result form-control" type="text" name="name"  value="<?= $appointment[0]->username; ?>">
					<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'name'); ?></span>
				</div>
				<div class="col-xl-6">
				    <label class="form-label">Mobile Number</label>
				    <input class="result form-control" type="number" name="mobile" value="<?= $appointment[0]->phone; ?>">
				    <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'mobile'); ?></span>
				</div>
				<div class="col-xl-6">
				    <label class="form-label">Email</label>
				    <input class="result form-control" type="email" name="email"  value="<?= $appointment[0]->email; ?>">
				</div>
				
				
				<div class="col-xl-6">
				    <label class="form-label">Book date</label>
				    <input class="result form-control" type="date" id="editbookdate" name="bookdate" required value="<?= $appointment[0]->book_date; ?>">
				</div>
			    <div class="col-sm-6"  id="shcdatebox">
				    <label class="form-label">Book Time</label>
                  <div class="form-group mb-20">
                    <select id="editschdatethrowshow" name="scheduletime" class="form-control" required >
                        <option value="<?= $appointment[0]->book_time; ?>" selected><?= $appointment[0]->book_time; ?></option>
                    </select>
                  </div>
                </div>
				
				
				
				<div class="col-xl-6">
				    <label class="form-label">Document file</label>
				    <input class="result form-control" type="file" name="avatar">
				</div>
				
				<div class="col-xl-12">
				    <label class="form-label">Consultancy Fee</label>
				    <input class="result form-control" type="text" name="cashamount" id="cashamount" readonly value="Consultancy Fee :<?= $doctor[0]->fee;  ?>">
				 </div>
				<div class="col-xl-12">
				    <label class="form-label">Message</label>
				    <textarea class="form-control" placeholder="Enter Message" name="message"><?= $appointment[0]->message; ?></textarea>
				</div>
			</div>
			<br/>
			<button type="submit" class="btn btn-primary">Update Appointment</button>
		</div>
		</form>
	</div>
</div>
<?= $this->endSection(); ?>