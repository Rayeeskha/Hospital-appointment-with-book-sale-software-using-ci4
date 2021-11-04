<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<center><h6 class="mb-0 text-uppercase">Payment List</h6></center>

	<hr/>
	<div class="card">
		<div class="card-body">
		   <div class="card-header">
		        <?= form_open('Admin/searchpayment'); ?>
		            <div class="row">
    		            <div class="col-md-4">
    		                <input type="search" name="appointmentid" value="<?= set_value('appointmentid'); ?>" class="form-control" placeholder="Enter Appointment Id">
    		            </div>
    		            <div class="col-md-2">
    		                <button type="submit" class="btn btn-primary">Search</button>
    		            </div>
    		            
		            </div>
		        <?= form_close(); ?>
		        
		        
		     </div>
			<div class="table-responsive">
				<table id="" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Appointment Id</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Phone</th>
							<th>Email</th>
						    <th>Doctor Fee</th>
							<th>Payment Status</th>
							<th>Transiction Status</th>
							
						</tr>
					</thead>
					<tbody>
					    <?php if($appointment):
					        count($appointment);
					        foreach($appointment as $list):
					            $doctorfee = fetch_cate_rec('staff_member', $list['doctor_id']);
					    ?>
						<tr>
							<td><?= $list['appoint_uid']; ?></td>
							<td><?= $list['username']; ?></td>
							<td><?= $list['lastname']; ?></td>
							<td><a href="tel:<?= $list['phone']; ?>"><?= $list['phone']; ?></td>
							<td><a href="mailto:<?= $list['email']; ?>"><?= $list['email']; ?></td>
							
							<td>KWD &nbsp;
							<?php 
    							if($doctorfee){
    							    echo number_format($doctorfee[0]->fee, 1);
    							}else{
    							    echo "0";
    							}
							 ?>
							</td>
							<td>
                                <?php if($list['Payment_status'] == "SUCCESS"): ?>
                                <span class="badge badge-success" style="background:green"><?= $list['Payment_status']; ?></span>
                                <?php elseif($list['Payment_status'] == "Pending"): ?>
                                <span class="badge badge-warning" style="background:orange"><?= $list['Payment_status']; ?></span>
                                <?php else: ?>
                                <span class="badge badge-danger" style="background:red"><?= $list['Payment_status']; ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($list['Payment_status'] == "SUCCESS"): ?>
                                <span class="badge badge-success" style="background:green">Transiction Id: <?= $list['transiction_id']; ?></span>
                                <?php elseif($list['Payment_status'] == "Pending"): ?>
                                <?php else: ?>
                                <span class="badge badge-danger" style="background:red">Transiction Id: <?= $list['transiction_id']; ?></span>
                                <?php endif; ?>
                            </td>
						
						</tr>
						<?php endforeach; else: ?>
						<h6 style="color:red">Records Not Found</h6>
						<?php endif; ?>
						<tr>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td></td>
						    <td colspan="9">
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