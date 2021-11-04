<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>

<h6 class="mb-0 text-uppercase">Manage Orders</h6>
	<hr/>
	<div class="card">
		<div class="card-body">
		    <div class="card-header">
		        <?= form_open('Admin/searchorder'); ?>
		        <div class="row">
		            <div class="col-md-4">
		                <input type="search" name="order_id" value="<?= set_value('order_id'); ?>" class="form-control" placeholder="Enter Order Id">
		            </div>
		            <div class="col-md-2">
		                <button type="submit" class="btn btn-primary">Search</button>
		            </div>
		            
		            <div class="col-md-6"></div>
		        </div>
		        <?= form_close(); ?>
		     </div>
			<div class="table-responsive">
				<table id="" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Username</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>Address</th>
							<th>Total Qty</th>
							<th>Total Amount</th>
							<th>Payment Type</th>
							<th>Payment Status</th>
							<th>Order Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					    <?php if($orders):
					        count($orders);
					        foreach($orders as $ord):
					    ?>
						<tr>
							<td><?= $ord['order_id']; ?></td>
							<td><?= $ord['firstname']; ?>&nbsp;<?= $ord['lastname']; ?>
							</td>
							<td><a href="tel:<?= $ord['mobile']; ?>"><?= $ord['mobile']; ?></td>
							<td><a href="mailto:<?= $ord['email']; ?>"><?= $ord['email']; ?></td>
							<td><?= $ord['address']; ?></td>
							<td><?= $ord['total_quantity']; ?></td>
							<td>KWD&nbsp;<?= number_format($ord['total_amount']); ?></td>
							<td>
                                <?php if($ord['Payment_type'] == "Gatway"): ?>
                                <span class="badge badge-success" style="background:green">ONLINE</span>
                                
                                <?php else: ?>
                                <span class="badge badge-warning" style="background:orange"><?= $ord['Payment_type']; ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($ord['Payment_status'] == "SUCCESS"): ?>
                                <span class="badge badge-success" style="background:green"><?= $ord['Payment_status']; ?></span>
                                <h6 style="color:green">Txn Id: <?= $ord['Transiction_id']; ?></h6>
                                <?php elseif($ord['Payment_status'] == "FAILED"): ?>
                                <span class="badge badge-danger" style="background:red"><?= $ord['Payment_status']; ?></span>
                                <h6 style="color:red">Txn Id: <?= $ord['Transiction_id']; ?></h6>
                                <?php else: ?>
                                <span class="badge badge-warning" style="background:orange"><?= $ord['Payment_status']; ?></span>
                                <?php endif; ?>
                            </td>
							<td>
							    <?php if($ord['order_status'] == 'Pending'): ?>
							    <span class="badge badge-danger" style="background:red"><?= $ord['order_status']; ?>
							    </span>
							    <?php elseif($ord['order_status'] == 'Cancel'): ?>
							    <span class="badge badge-danger" style="background:red"><?= $ord['order_status']; ?>
							    </span>
							    <?php else: ?>
							    <span class="badge badge-success" style="background:green"><?= $ord['order_status']; ?></span>
							    </span>
							    <?php endif; ?>
							</td>
							<td>
							   <a href="<?= base_url('Admin/vieworder/'.$ord['order_id']); ?>">View</a>
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