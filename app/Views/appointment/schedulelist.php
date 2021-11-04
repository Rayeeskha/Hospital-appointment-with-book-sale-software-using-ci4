<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?>
<div class="accordion" id="accordionExample" style="margin-left:10%;margin-right:10%">
    <div class="card">
<?php if($schedule):
    count($schedule);
    $i=0;
    foreach($schedule as $sch):
        $apmnt = getdoctordetails('doc_schedule', $sch->doctor_id);
        $checkbooking = checkappointmentbooking('appointment',$sch->doctor_id, $sch->givendate, $sch->giventime);
        $i++;
?>
    
    <?php if($checkbooking): ?>
    <div class="card-header" id="headingOne" style="border:1px solid silver">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="javascript:void(0)" aria-expanded="true" aria-controls="">
          <h5>Start Time:<?= $apmnt[0]->apmt_start_time; ?></h5>  
          <h6>Schedule Date :<?= date('d-m-y', strtotime($sch->givendate)); ?> - End Time : <?= date('h:i', strtotime($sch->giventime)); ?></h6>
        </button>
        <a href="javascript:void(0)"  class="btn btn-danger">UnAvailable</a>
      </h2>
    </div>
    <?php else: ?>
        <div class="card-header" id="headingOne" style="border:1px solid silver">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne_<?= $sch->id; ?>" aria-expanded="true" aria-controls="collapseOne">
              <h5>Start Time:<?= $apmnt[0]->apmt_start_time; ?></h5>  
              <h6>Schedule Date :<?= date('d-m-y', strtotime($sch->givendate)); ?> - End Time : <?= date('h:i', strtotime($sch->giventime)); ?></h6>
             <a href="javascript:void(0)"  class="btn btn-primary">Available</a>
            </button>
          </h2>
        </div>
    <?php endif; ?>
    
    <div id="collapseOne_<?= $sch->id; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body" style="border:1px solid silver;">
        <div style="margin-left:10%;margin-right:10%;margin-top:5%">
            <h4>Book Appointment</h4>
            
        <?= form_open('Home/appointmentbooking/'); ?>
        <input type="hidden" value="<?= $sch->id; ?>" name="id">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group mb-20">
                <input placeholder="Enter Name" type="text" id="reservation_name" name="name" value="<?= set_value('name'); ?>" class="form-control" required="">
              </div>
             </div>
            <div class="col-sm-6">
              <div class="form-group mb-20">
                <input placeholder="Email" type="email" id="reservation_email" name="email" value="<?= set_value('email'); ?>" class="form-control" required="">
              </div>
             </div>
            <div class="col-sm-6">
              <div class="form-group mb-20">
                <input placeholder="Phone" type="number" id="phone" name="phone" class="form-control" required="">
              </div>
              <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'phone'); ?></span>
            </div>
           
            <div class="col-sm-12">
              <div class="form-group">
                <textarea placeholder="Enter Message" rows="3" class="form-control required" name="message" value="<?= set_value('message'); ?>" id="form_message" aria-required="true"></textarea>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mb-0 mt-10">
                <button type="submit" class="btn btn-colored btn-default text-black btn-lg btn-block" data-loading-text="Please wait...">Book Appointment</button>
              </div>
            </div>
          </div>
        <?= form_close(); ?>
        </div>
      </div>
    </div>
  

<?php endforeach; else: ?>
<h6 style="color:red">Record Not Found</h6>
<?php endif; ?>
</div>
</div>




</div>


<?= $this->endSection(); ?>