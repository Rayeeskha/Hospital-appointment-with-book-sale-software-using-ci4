<?= $this->extend('admin/layout/layout'); ?>
<style type="text/css">
  .markholiday .ui-state-default{color: red}
</style>
<?= $this->section('content'); ?>
<center><h6 class="mb-0 text-uppercase">Appointment List</h6></center>

	<hr/>
	<div class="card">
		<div class="card-body">
		   <div class="card-header">
		        
		        
		         <?= form_open('Admin/searchappointment'); ?>
		            <div class="row">
    		            <div class="col-md-4">
    		                <input type="search" name="appointmentid" value="<?= set_value('appointmentid'); ?>" class="form-control" placeholder="Enter Appointment Id">
    		            </div>
    		            <div class="col-md-2">
    		                <button type="submit" class="btn btn-primary">Search</button>
    		            </div>
    		            <div class="col-md-6">
    		                <!-- Button trigger modal -->
                        	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleScrollableModal">Add Appointment</button>
                        <!-- Modal -->
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
							<th>Book Date</th>
							<th>Book Time</th>
							<th>Book Doctor</th>
							<th>file</th>
							<th>Doctor Fee</th>
							<th>Payment Status</th>
							<th>Transiction Status</th>
							<th>Message</th>
							<th>Appointment Status</th>
							<th>Action</th>
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
							<td><?= date('d M Y', strtotime($list['book_date'])); ?></td>
							<td><?= $list['book_time']; ?></td>
							<td>
							    <?php $doc =  fetch_cate_rec('staff_member', $list['doctor_id']);
							        if($doc){
							          echo $doc[0]->name; 
							        }else{
							            echo "N/A";
							        }
							        
							    ?>
							</td>
							
							<td>
							     <?php if($list['photo'] !== "NotUploded" && $list['photo'] !== null): ?>
                                <a href="<?= base_url('public/uploads/appointment/'.$list['photo']); ?>" download>
                                    <span class="fa fa-download"></span>
                                    </a>
                            <?php else: ?>
                                <h6 style="color: red;font-size: 12px;font-weight: 500">Not Uploded</h6>
                            <?php endif; ?>
							        
							</td>
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
							<td><?= word_limiter($list['message'], 4); ?></td>
							<td>
                                <!-- Example single danger button -->
							    <?php if($list['status'] == 'Pending'): ?>
                                <div class="btn-group">
                                 <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $list['status']; ?>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= base_url('Admin/appointmentstatus/'.$list['id'].'/Booked') ?>">Booked</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= base_url('Admin/appointmentstatus/'.$list['id'].'/Cancel') ?>">Cancel</a>
                                  </div>
                                </div>
                                <?php elseif($list['status'] == 'Booked'): ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $list['status']; ?>&nbsp;
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url('Admin/appointmentstatus/'.$list['id'].'/Cancel') ?>">Cancel</a>
                                     </div>
                                    
                                </div>
                                <?php else: ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $list['status']; ?>&nbsp;&nbsp;
                                    </button>
                                </div>  
                                <?php endif; ?>
                            </td>
							<td>
							    <a href="<?= base_url('Admin/editappoinement/'.$list['id']); ?>" class="btn btn-primary"><span class="fa fa-edit"></a></a>
							    
							    <a href="<?= base_url('Admin/deleteappointment/'.$list['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to  delete this Appointment Records?.');">
							        <span class="fa fa-trash"></span>
							    </a>
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

<!------Book New Appointment Modal ------>
<!-- Modal -->
<div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add New Appointment</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			  <form class="row g-3" action="<?= base_url('Admin/addappointment'); ?>" id="" method="post" enctype="multipart/form-data">
			<div class="mb-3">
            <div class="row">
              <div class="col-xl-6">
				    <label class="form-label">First Name</label>
					<input class="result form-control" type="text" name="name" id="name" value="<?= set_value('name'); ?>"  placeholder="Enter Name..." required>
				</div>
				<div class="col-xl-6">
				    <label class="form-label">Last Name</label>
					<input class="result form-control" type="text" name="lname" id="lname" value="<?= set_value('lname'); ?>" placeholder="Enter Name..." required>
				</div>
				<div class="col-xl-6">
				    <label class="form-label">Mobile Number</label>
				    <input class="result form-control" type="number" name="mobile" value="<?= set_value('mobile'); ?>" id="mobile" placeholder="Enter Phone Mobile..." required onkeyup="check_mobile()">
				    <h6 id="mobile_error" style="color:red;font-size:12px;padding-top:5px;display:none">Mobile number should be 8 Digit</h6>
				</div>
				<div class="col-xl-6">
				    <label class="form-label">Email</label>
				    <input class="result form-control" type="email" name="email" value="<?= set_value('email'); ?>" id="email" placeholder="Enter Email..."required>
				</div>
				  <div class="col-xl-6 mx-auto">
			       <label class="form-label">Doctor Name</label>
					<select class="single-select" id="doctor" name="doctor" required>
					    <option value="" selected disabled>Select Doctor</option>
						<?php if($doctor):
						    count($doctor);
						    foreach($doctor as $doc):
						?>
						<option value="<?= $doc->id; ?>"><?= $doc->name; ?></option>
						<?php endforeach; else: ?>
						<h6 style="color:red">Records Not Found</h6>
						<?php endif; ?>
					</select>
				</div>
			    <div class="col-xl-6 mx-auto">
			       <label class="form-label">Department</label>
					<select class="single-select" id="department_slct">
						
					</select>
				</div>
				
				<div class="col-xl-6">
				    <label class="form-label">Book date</label>
				    <input class="result form-control" type="text" id="bookdate" name="bookdate" required>
				</div>
			    <div class="col-sm-6"  id="shcdatebox">
				    <label class="form-label">Book Time</label>
                  <div class="form-group mb-20">
                    <select id="schdatethrowshow" name="scheduletime" class="form-control" required>
                    </select>
                  </div>
                </div>
				<div class="col-xl-12">
				    <label class="form-label">Amount</label>
				    <input class="result form-control" type="text" name="cashamount" value="<?= set_value('cashamount'); ?>" id="cashamount" readonly>
				 </div>
				
				 <div class="col-xl-12">
				    <label class="form-label">Document file</label>
				    <input class="result form-control" type="file" id="documentfile" name="avatar">
				</div>
				<div class="col-xl-12">
				    <label class="form-label">Reference Link</label>
				    <input class="result form-control" type="text" name="referencelink" id="referencelink">
				 </div>
				<div class="col-xl-12">
				    <label class="form-label">Message</label>
				    <textarea class="form-control" placeholder="Enter Message" name="message" id="message"></textarea>
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id="admin_btn_book_apmnt">Book Appointment</button>
			</div>
		</div>
		</form>
	</div>
</div>
<input type="hidden" id="doctorschid" value="">  
<!------Book New Appointment Modal ------>	


<?= $this->endSection(); ?> 