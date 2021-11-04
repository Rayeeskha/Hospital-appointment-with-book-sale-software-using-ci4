<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h6>Address Details</h6>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table">
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Mobile</th>
                    <th>Alt Mobile</th>
                    <th>City </th>
                    <th>Zip </th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php if($address):
                    count($address);
                    foreach($address as $add):
                ?>
                <tr>
                    <td><?= $add->username; ?></td>
                    <td><?= $add->email; ?></td>
                    <td><?= $add->companyname; ?></td>
                    <td><?= $add->mobile; ?></td>
                    <td><?= $add->alternative_mobile; ?></td>
                    <td><?= $add->city; ?></td>
                    <td><?= $add->zipcode; ?></td>
                    <td><?= $add->address; ?></td>
                    <td><a href="<?= base_url('Shop/ediaddress/'.$add->id); ?>" class="btn btn-primary">Edit</a></td>
                </tr>
                <?php endforeach; else: ?>
                <h6 style="color:red">Records Not Found</h6>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?> 