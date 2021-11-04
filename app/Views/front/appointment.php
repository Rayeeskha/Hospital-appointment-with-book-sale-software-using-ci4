<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

<div style="margin-left:30px;margin-right:30px">
    
    <div class="card">
        <h2>Choose Doctor</h2>
    <?php if($appointment):
        count($appointment);
        foreach($appointment as $apmnt):
    ?>
    
        <div class="card-body" style="border:1px solid silver">
            <div class="row">
                <div class="col-sm-4">
                    <?php if($apmnt->photo != "NotUploded"): ?>
                    <img src="<?= base_url('public/uploads/staff/'.$apmnt->photo); ?>" style="width:100px;border-radius:50%">
                    <?php else: ?>
                    <img src="https://image.freepik.com/free-photo/young-handsome-physician-medical-robe-with-stethoscope_1303-17818.jpg" style="width:100px;border-radius:50%">
                    <?php endif; ?>
                    
                </div>
                <div class="col-sm-4">
                    <h4><?= $apmnt->name; ?></h4>
                    <h6><?= $apmnt->Speciality; ?></h6>
                </div>
                <div class="col-sm-4">
                    <a href="<?= base_url('Home/doctorschedule/'.$apmnt->id); ?>" class="btn btn-primary" style="margin-top:10px">Select</a>
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