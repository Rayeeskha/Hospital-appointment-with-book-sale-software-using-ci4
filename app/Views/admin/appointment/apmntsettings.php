<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<center><h6 class="mb-0 text-uppercase">Doctor Appointment Timing Settings</h6></center>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Add Appointment Timing</button>
	<hr/>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Doctor Photo</th>
							<th>Doctor Name</th>
							<th>Department</th>
							<th>Doctor Mobile</th>
							<th>Appointment Slot</th>
							<th>Doctor Speciality</th>
							<th>Total Schedule</th>
							<th>Start Time</th>
							<th>Break Time</th>
							<th>End Time</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					    <?php if($staff):
					        count($staff);
					        foreach($staff as $cate):
					           $schedul =  getscheduledata('doc_schedule_list',$cate->id);
					    ?>
					    <?php 
					    	if ($schedul) {
					    		$schid  = $schedul[0]->schedule_id;
					    	}else{
					    		$schid ="";
					    	}
					    ?>
						<tr>
							<td>
							     <?php if($cate->photo !== "NotUploded"): ?>
                                <img src="<?= base_url('public/uploads/staff/'.$cate->photo); ?>" alt="Avatar" style="width:50px;height:50px">
                            <?php else: ?>
                                <h6 style="color: red;font-size: 12px;font-weight: 500">Not Uploded</h6>
                            <?php endif; ?>
							        
							</td>
							<td><a href="javascript:void(0)"><?= $cate->name; ?></a></td>
							<td><?= $cate->departmentname; ?></td>
							<td><a href="tel:<?= $cate->mobile; ?>"><?= $cate->mobile; ?></td>
							<td><?= $cate->givenperiod; ?></td>
							<td><?= word_limiter($cate->Speciality, 4); ?></td>
							<td>
							    <?php $total_sch =  getdoctordetails('doc_schedule_list', $cate->doctor_id); ?>
							    <span class="badge badge-info" style="background:blue">
							        <?php 
							            if($schedul){
							                echo count($schedul);
							            }else{
							                echo "0";
							            }
							        ?>
							</span>
							</td>
							<td>
							    <?php 
							        if($schedul){
							            echo date('h:i', strtotime($schedul[0]->giventime));
							        }
							    ?>
							</td>
							<td><?= date('h:i', strtotime($cate->break_time)); ?></td>
							<td>
							    <?php 
							        if($schedul){
							            echo date('h:i', strtotime($schedul[0]->endtime));
							        }
							    ?>
							</td>
							
							<td>
							    
							    <?php if($cate->status == 'Active'): ?>
							    <span class="badge badge-success" style="background:green">
							        <a href="<?= base_url('Admin/deactiveallschedule/'.$schid.'/InActive') ?>" onclick="return confirm('Confirmation ! Are You Sure You want to Deactive All Schedule Records in this Doctor ?')" style="color:white">Active</a>
							    </span>
							    <?php else: ?>
							    <span class="badge badge-danger" style="background:red">
							        <a href="<?= base_url('Admin/deactiveallschedule/'.$schid.'/Active') ?>" style="color:white">DeActivate</a>
							    </span>
							    <?php endif; ?>
							    
							</td>
							<td><a href="<?= base_url('Admin/view_doc_sch_details/'.$schid); ?>" class="fa fa-eye"></a>
							<a href="<?= base_url('Admin/editschedule/'.$schid); ?>" class="fa fa-edit" style="padding:15px;"></a>
							<a onclick="return confirm('Confirmation ! Are You Sure You want to Delete All Schedule Records in this Doctor ?')" href="<?= base_url('Admin/deleteallschdtl/'.$schid); ?>"  class="fa fa-trash" style="padding:5px; color:red"></a>
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
	
	
	<!-------Appointment Modal Section ----->
	<div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
    	<div class="modal-dialog modal-dialog-scrollable modal-lg">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title">Add Doctor Appointment Timing</h5>
    				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    			</div>
    			<div class="modal-body">
    			    <div class="border p-3 rounded">
    			        <form class="row g-3" id="AppointmentSettingFrm"  method="post" enctype="multipart/form-data">
					
    			        <div class="mb-3">
    			        <div class="row">
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
    								<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'doctor'); ?></span>
    							</div>
    						    <div class="col-xl-6 mx-auto">
    						       <label class="form-label">Department</label>
    								<select class="single-select" id="department_slct">
    									
    								</select>
    							</div>
    							<div class="col-xl-12">
    							    <label class="form-label">Appointment Slot</label>
									<input class="result form-control" type="text" name="period"  placeholder="Appointment Slot..." required>
									<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'period'); ?></span>
    							</div>
    							
    							<div class="col-xl-6">
    							    <lable>Break Time</lable>
    							    <input type="time" name="breaktime" class="result form-control" required>
    							 <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'breaktime'); ?></span>
        						</div>
        						<div class="col-xl-6">
    							    <lable>Break End Time</lable>
    							    <input type="time" name="breakendtime" class="result form-control" required>
    							 <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'breakendtime'); ?></span>
        						</div>
        						
    						</div>
    						<div id="doctor_duration_box">
    						<div class="row">
    						    <div class="col-xl-3">
        							<label class="form-label">Appointment Date</label>
    								<input class="form-control admindatepickerup" type="text"   name="perioddate[]" id="perioddate" required  placeholder="Pickup Schedule date" />
    							</div>
        						<div class="col-xl-3">
        							<label class="form-label">Appointment Start Time</label>
    								<input class="result form-control" type="time" id="time"  name="periodtime[]" required >
    								 <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'periodtime'); ?></span>
        						</div>
        						<div class="col-xl-3">
    							    <label class="form-label">Appointment End Time</label>
    							    <input type="time" name="endtime[]" id="endtime" class="result form-control" required>
    							    
    							    <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'starttime'); ?></span>
    							</div>
        						<div class="col-xl-3">
        							<button type="button" class="btn btn-primary" onclick="addmoredocperiod();" style="margin-top:25%">
        							 <span class="fa fa-plus">&nbsp;Add</span></button>
        						</div>
    						  </div>
    					    </div>
    				    </div>
    			    </div>
					
    			<div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-primary">Add</button>
    			</div>
    		</div>
    		</form>
    	</div>
    </div>
	<!-------Appointment Modal Section ----->
	
    
 <input type="hidden" name="add_more" id="add_more" value="1" />
<script type="text/javascript">
    function addmoredocperiod(){
        var add_more = $('#add_more').val();
        var time = $('#time').val();
        var endtime = $('#endtime').val();
        add_more++;
        $('#add_more').val(add_more);
       let html = '<div class="row" id="box'+add_more+'"> <div class="col-xl-3"> <label class="form-label">Schedule Date</label> <input type="date" class="form-control admindatepickerup" name="perioddate[]" id="scheduledt" required /> </div> <div class="col-xl-3"> <label class="form-label">Schedule Time</label> <input class="result form-control" type="time" id="time" name="periodtime[]" value="'+time+'" required /> </div> <div class="col-xl-3"> <label class="form-label">Appointment End Time</label> <input type="time" class="form-control" name="endtime[]" class="Pick Date" value="'+endtime+'" required /> </div> <div class="col-xl-3"> <button type="button" class="btn btn-danger" onclick=remove_period("'+add_more+'"); style="margin-top:25%"> <span class="fa fa-minus">&nbsp;Remove</span></button> </div></div>';
       var perioddate = $('#perioddate').val();
       var scheduledt = $('#scheduledt').val();
       if(perioddate == scheduledt){
           alert('Already Assign this date');
       }else{
         $('#doctor_duration_box').append(html);  
       }
       
       
    }
    
    function remove_period(id){
        $('#box'+id).remove();
    }
    
    
    
    
    
    
    
    //Doctor Schedule Details

</script>

<?= $this->endSection(); ?> 