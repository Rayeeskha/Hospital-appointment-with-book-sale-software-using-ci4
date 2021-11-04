<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>

<h6 class="mb-0 text-uppercase">Manage Users</h6>
	<hr/>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Username</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Photo</th>
							<th>Address</th>
							<th>Password</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					    <?php if($users):
					        count($users);
					        foreach($users as $cate):
					    ?>
						<tr>
							<td><?= $cate->username; ?></td>
							<td><a href="mailto:<?= $cate->email; ?>"><?= $cate->email; ?></td>
							<td><a href="tel:<?= $cate->phone; ?>"><?= $cate->phone; ?></td>
							<td>
							     <?php if($cate->photo !== "NotUploded"): ?>
                                <img src="<?= base_url('public/uploads/users/'.$cate->photo); ?>" alt="Avatar" style="width:50px;height:50px">
                            <?php else: ?>
                                <h6 style="color: red;font-size: 12px;font-weight: 500">Not Uploded</h6>
                            <?php endif; ?>
							        
							</td>
							<td><?= $cate->address; ?></td>
							<td><?= $cate->dummypass; ?></td>
							<td>
							    <?php if($cate->status == 'Active'): ?>
							    <span class="badge badge-success" style="background:green"><a href="<?= base_url('Admin/changeuserstatus/'.$cate->id.'/DeActivate') ?>" style="color:white">Active</a>
							    </span>
							    <?php else: ?>
							    <span class="badge badge-danger" style="background:red"><a href="<?= base_url('Admin/changeuserstatus/'.$cate->id.'/Active') ?>" style="color:white">DeActivate</a>
							    </span>
							    <?php endif; ?>
							</td>
							<td>
							    <a href="<?= base_url('Admin/editusers/'.$cate->id); ?>" class="btn btn-primary"><span class="fa fa-edit"></a></a>
							    
							    <a href="<?= base_url('Admin/deleteusers/'.$cate->id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to  delete this  Records?.');">
							        <span class="fa fa-trash"></span>
							    </a>
							</td>
						</tr>
						<?php endforeach; else: ?>
						<h6 style="color:red">Records Not Found</h6>
						<?php endif; ?>
						
					</tbody>
					
				</table>
			</div>
		</div>
	</div>



<?= $this->endSection(); ?> 