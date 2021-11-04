<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card" style="border:1px solid silver">
        <div class="card-header" style="background:red;padding:10px">
            <h5 style="color:white">Payment Failed</h5>
        </div>
        <div class="card-body">
            <h5 style="color:red">Your Failed Transcition Id :<?= $transction_id; ?></h5>
            <h5 style="color:red">Order Id :<?= session()->get('ONLINE_ORDER_ID_SESSION'); ?></h5>
            <h5 style="color:red;">Failed Amount KWD:<?= number_format(session()->get('TOTAL_PAID_AMOUNT')); ?></h5>
        </div>
    </div>
</div>

<div style="margin-top:10%"></div>

<?= $this->endSection(); ?> 