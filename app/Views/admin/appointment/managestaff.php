<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>

<h6 class="mb-0 text-uppercase">Manage Doctors</h6>
	<hr/>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Department Name</th>
							<th>Photo</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>Speciality</th>
							<th>Fee</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					    <?php if($staff):
					        count($staff);
					        foreach($staff as $cate):
					    ?>
						<tr>
							<td><?= $cate->departmentname; ?></td>
							<td>
							     <?php if($cate->photo !== "NotUploded"): ?>
                                <img src="<?= base_url('public/uploads/staff/'.$cate->photo); ?>" alt="Avatar" style="width:50px;height:50px">
                            <?php else: ?>
                                <h6 style="color: red;font-size: 12px;font-weight: 500">Not Uploded</h6>
                            <?php endif; ?>
							        
							</td>
							<td><?= $cate->name; ?></td>
							<td><a href="tel:<?= $cate->mobile; ?>"><?= $cate->mobile; ?></td>
							<td><a href="mailto:<?= $cate->email; ?>"><?= $cate->email; ?></td>
							<td><?= word_limiter($cate->Speciality, 6); ?></td>
							<td>KWD&nbsp;<?= $cate->fee; ?></td>
							<td>
							    <?php if($cate->staff_status == 'Active'): ?>
							    <span class="badge badge-success" style="background:green"><a href="<?= base_url('Admin/changestaffstatus/'.$cate->id.'/InActive'.'/1') ?>" style="color:white">Active</a>
							    </span>
							    <?php else: ?>
							    <span class="badge badge-danger" style="background:red"><a href="<?= base_url('Admin/changestaffstatus/'.$cate->id.'/Active'.'/0') ?>" style="color:white">DeActivate</a>
							    </span>
							    <?php endif; ?>
							</td>
							<td>
							    <a href="<?= base_url('Admin/editstaff/'.$cate->id); ?>" class="btn btn-primary"><span class="fa fa-edit"></a></a>
							    
							    <a href="<?= base_url('Admin/deletestaff/'.$cate->id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to  delete this  Record?.');">
							        <span class="fa fa-trash"></span>
							    </a>
							</td>
						</tr>
						<?php endforeach; else: ?>
						<h6 style="color:red">Records Not Found</h6>
						<?php endif; ?>
						
					</tbody>
				</table>
				<center>
				   <a href="<?= base_url('Admin/leavealldoctros'); ?>" class="btn btn-danger">Leave All Doctors </a>
				    <a href="<?= base_url('Admin/activealldoctors'); ?>" class="btn btn-success">Active All Doctors </a>
				</center>
			</div>
		</div>
	</div>



<?= $this->endSection(); ?> 