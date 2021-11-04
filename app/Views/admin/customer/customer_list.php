<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>

<h6 class="mb-0 text-uppercase">Manage Customer</h6>
	<hr/>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
						    <th>Customer id</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>Country</th>
							<th>Address</th>
							<th>Status</th>
							
						</tr>
					</thead>
					<tbody>
					    <?php if($customer):
					        count($customer);
					        foreach($customer as $cate):
					    ?>
						<tr>
						    <td>
							    <?= $cate['user_id']; ?>
							</td>
							<td><?= $cate['name']; ?></td>
							<td><?= $cate['username']; ?></td>
							
							<td><a href="tel:<?= $cate['mobile']; ?>"><?= $cate['mobile']; ?>
							</td>
							<td><a href="mailto:<?= $cate['email']; ?>"><?= $cate['email']; ?>
							</td>
							<td>
							    <?php 
							        if($cate['country']){
							          echo $cate['country'];  
							        }
							    ?>
							</td>
							<td>
							    <?php 
							        if($cate['address']){
							          echo word_limiter($cate['address'], 5);  
							        }
							    ?>
							</td>
							
							<td>
							    <?php if($cate['status'] == 'Active'): ?>
							    <span class="badge badge-success" style="background:green"><a href="<?= base_url('Admin/changecustomer/'.$cate['id'].'/Deactive') ?>" style="color:white">Active</a>
							    </span>
							    <?php else: ?>
							    <span class="badge badge-danger" style="background:red"><a href="<?= base_url('Admin/changecustomer/'.$cate['id'].'/Active') ?>" style="color:white">DeActivate</a>
							    </span>
							    <?php endif; ?>
							</td>
							
						</tr>
						<?php endforeach; ?> 
						<?php else: ?>
						<h6 style="color:red">Records Not Found</h6>
						<?php endif; ?>
						<tr>
						    
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td colspan="4">
        						<div id="pagination" style="color: white;">
        							<?= $pager->links() ?>
        						</div>
        					</td>
        				</tr>
						
					</tbody>
					
				</table>
			</div>
		</div>
	</div>



<?= $this->endSection(); ?> 