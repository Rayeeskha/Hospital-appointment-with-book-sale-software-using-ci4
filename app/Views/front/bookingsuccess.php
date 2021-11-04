<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card"style="border:1px solid silver">
        <div class="card-header" style="background:green;padding:10px;">
            <h5 style="color:white"><span class="fa fa-check"></span>Appointment Booked Successfully</h5>
        </div>
        <div class="card-body">
            <h5 style="color:green">Appointment Id : <?= session()->get('APPOINTMENT_ID_SESSION'); ?></h5>
            <h5 style="color:green">Your Transiction Id : <?= $transction_id; ?></h5>
            <h5 style="color:green">Paid Amount KWD: <?= $doctor_fee; ?></h5>
        </div>
    </div>
</div>
<div style="margin-bottom:15px"></div>


<?= $this->endSection(); ?> 