<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 
<!-----Form Sectionn--->
<div class="row">
	<div class="col-xl-12 mx-auto">
		<h6 class="mb-0 text-uppercase">Update Doctor Schedule</h6>
		<hr/>
		<a href="<?= base_url('Admin/apmntsettings') ?>" class="btn btn-warning">Back</a>
	<div class="card border-top border-0 border-4 border-primary">
			<div class="card-body p-5">
				<div class="card-title d-flex align-items-center">
					<div><i class="breadcrumb-item active" aria-current="page"></i>
					</div>
					<h5 class="mb-0 text-primary">Update Doctor Schedule</h5>
				</div>
				<hr>
				<center>
				     <h6 id="success_deleted" style="color: red;text-align: center;display: none;"><span class="fa fa-check"></span></h6>
				</center>
				<form class="row g-3" id="UpdateScheduleFrm"  method="post" enctype="multipart/form-data"> 
				 	<input type="hidden" name="setting_sch_id" id="setting_sch_id" value="<?= $scheduel[0]->schedule_id; ?>">
				<div class="row">
			
	            <div class="col-xl-6 mx-auto">
				       <label class="form-label">Doctor Name</label>
						<select class="single-select" id="doctor" name="doctor" required="">
						    <option value="" selected disabled>Select Doctor</option>
							<?php
							    foreach($doctor as $doc):
							        if($doc->id == $scheduel[0]->doctor_id):
							?>
							<option value="<?= $doc->id; ?>" selected><?= $doc->name; ?></option>
							<?php else: ?>
							    <option value="<?= $doc->id; ?>"><?= $doc->name; ?></option>
							<?php endif; ?>
							<?php endforeach; ?>
							
						</select>
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'doctor'); ?></span>
					</div>
				    <div class="col-xl-6 mx-auto">
				       <label class="form-label">Department</label>
						<select class="single-select" id="department_slct">
							
						</select>
					</div>
					<?php $data =  feetch_break_end_time('doc_schedule', $scheduel[0]->doctor_id, $scheduel[0]->givenperiod); 
						if ($data) {
							$break_time = $data[0]->break_time;
							$breakendtime = $data[0]->breakendtime;
						}else{
							$break_time = "";
							$breakendtime = "";
						}
					?>
					<div class="col-xl-6">
					    <lable>Break Time</lable>
					    <input type="time" name="breaktime" class="result form-control" value="<?= $break_time; ?>" required>
					 <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'breaktime'); ?></span>
					</div>
					<div class="col-xl-6">
					    <lable>Break End Time</lable>
					    <input type="time" name="breakendtime" value="<?= $breakendtime; ?>" class="result form-control" required>
					 <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'breakendtime'); ?></span>
					</div>
					<div class="col-xl-12">
					    <label class="form-label">Appointment Slot</label>
						<input class="result form-control" type="text" name="period" value="<?= $scheduel[0]->givenperiod; ?>">
						<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'period'); ?></span>
					</div>
					
				</div>
				<div id="doctor_duration_box">
				<?php $docdetails =  getdoctschedule('doc_schedule_list',$scheduel[0]->schedule_id);
				    if($docdetails):
				        count($docdetails);
				        $li= 1;
				        foreach($docdetails as $list):
				        	$scheduledata = getscheduledetails('apmnt_day_vise_sch', $list->id);
					
					
				?>
				  <div class="row">
				      <input type="hidden" name="schedule_idARR[]" value="<?= $list->id; ?>">
				      

				      <!-- <input type="hidden" name="schid" value="<?= $list->schedule_id; ?>">
				      	<input class="form-control " type="hidden"   name="schduledateArr[]"   value="<?= $list->givendate; ?>" /> -->
					
				    <div class="col-xl-3">
						<label class="form-label">Schedule Date</label>
						<input class="form-control " type="date"   name="perioddate[]" required  value="<?= $list->givendate; ?>" />
					</div>
					<div class="col-xl-3">
						<label class="form-label">Appointment Start Time</label>
						<input class="result form-control" type="time"  name="periodtime[]" required value="<?= $list->giventime; ?>">
						 <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'periodtime'); ?></span>
					   
					</div>
					<div class="col-xl-3">
					    <label class="form-label">Appointment End Time</label>
					    <input type="time" name="endtime[]" id="endtime" class="result form-control" value="<?= $list->endtime; ?>" required>
					    <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'starttime'); ?></span>
					</div>
					<?php if($li!=1): ?>
					<div class="col-xl-3">
						<button type="button" class="btn btn-danger" onclick="remove_old_schedule('<?= $list->id; ?>');" style="margin-top:25%">
						 <span class="fa fa-minus">&nbsp;Remove</span></button>
					</div>
					<?php endif; ?>
				  </div>
			    
				<?php $li++; endforeach; else: ?>
				    <h6 style="color:red">Records Not Found</h6>
				 <?php endif; ?>
				 </div>
				 <br>
				 <!-- <button type="button" class="btn  btn-warning" onclick="add_more_schedule();">Add more</button> -->
    		    <button type="submit" class="btn btn-primary">Update</button>
			</div>
		</div>
	</form>
		
	</div>
</div>

 <input type="hidden" name="add_more" id="add_more" value="1" />
<script type="text/javascript">
   
    function remove_old_schedule(id){
        let result = confirm('Are You Sure ! You want to Delete this Schedule?')
        if (result == true) {
          $.ajax({
            type:'ajax',
            method:'GET',
            url:'<?= site_url('Admin/deleteoldschedule/'); ?>'+id,
            success:function(result){
              let data = $.parseJSON(result);
              if (data.is_error == 'no') {
                $('#success_deleted').show();
                $('#success_deleted').html(data.dd); 
                location.reload();
              }else{
                $('#success_deleted').show();
                $('#success_deleted').html(data.dd); 
              }
                    
            },
              error:function(){
                $('#success_deleted').text('0');
            }
          });
        }
    }
    
    //Doctor Schedule Details

</script>



<?= $this->endSection(); ?> 