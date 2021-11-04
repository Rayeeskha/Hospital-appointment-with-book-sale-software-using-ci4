<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<center><h6 class="mb-0 text-uppercase">Update Single Schedule</h6></center>
<a href="<?= base_url('Admin/view_doc_sch_details/'.$schdule[0]->doctor_id) ?>" class="btn btn-warning">Back</a>
<hr/>
<div class="card">
	<div class="card-body">
	    <div class="mb-3">
	        <?= form_open('Admin/updatesinglesch/'.$schdule[0]->id.'/'.$schdule[0]->doctor_id); ?>
            <div class="row">
                <div class="col-xl-6 mx-auto">
    			    <label class="form-label">Schedule Date</label>
    			    <input class="result form-control" type="date" name="schduledate" value="<?= $schdule[0]->givendate; ?>" required />
    			</div>
    			<div class="col-xl-6 mx-auto">
    			    <label class="form-label">Schedule Time</label>
    			    <input class="result form-control" type="time" name="schduletime" value="<?= $schdule[0]->giventime; ?>" required />
    			</div>
    			<div class="col-xl-6 mx-auto">
    			    <label class="form-label">Period</label>
    			    <input class="result form-control" type="text" name="period" value="<?= $schdule[0]->givenperiod; ?>" required />
    			</div>
    		</div>
    		<center>
    		<?= form_close(); ?>
    		<button type="submit" class="btn btn-primary" style="margin-top:5%">Update</button>
    		</center>
    	</div>
	</div>
</div>


<?= $this->endSection(); ?>