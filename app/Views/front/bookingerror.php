<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card"style="border:1px solid silver">
        <div class="card-header" style="background:red;padding:10px">
            <h5 style="color:white">Transiction Failed</h5>
        </div>
        <div class="card-body">
            <h5 style="color:red">Appointment Id : <?= session()->get('APPOINTMENT_ID_SESSION'); ?></h5>
            <h5 style="color:red">FAILED Transiction Id : <?= $transction_id; ?></h5>
            <h5 style="color:red">FAILED AMOUNT KWD: <?= $doctor_fee; ?></h5>
        </div>
    </div>
</div>
<div style="margin-top:15px"></div>


<?= $this->endSection(); ?> 