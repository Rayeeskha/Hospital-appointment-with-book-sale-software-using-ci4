
<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card">
        <div class="card-header" style="border:1px solid silver">
            <span style="color:orange;font-weight:800;font-size:18px"><?= session()->get('USER_NAME'); ?></span>
        </div>
        <div style="margin-top:20px"></div>
        <div class="card-body" style="overflow-x:auto;">
            <table id="example" class="table table-striped table-bordered" >
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Product Name</th>
                    <th>Photo</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   //$order_details = get_order_details('order_details', $orders[0]->order_id);
                    if($order_details):
                    count($order_details);
                    foreach($order_details as $dtl):
                ?>
                <tr>
                    <td><?= $dtl->order_id; ?></td>
                    <td>
                        <?=  $dtl->productname; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('Shop/productdetails/'.$dtl->product_id) ?>"><img src="<?= base_url('public/uploads/productimg/'.$dtl->photo); ?>" style="width:50px;height:50px"></a>
                    </td>
                    <td>
                        <?=  number_format($dtl->qty); ?>
                    </td>
                    <td>
                        <?=  number_format($dtl->pro_price); ?>
                    </td>
                    <td>
                        <?php $total = $dtl->qty * $dtl->pro_price;
                            echo number_format($total);
                        ?>
                    </td>
                    <td>
                        <?php if($dtl->Payment_type == "Gatway"): ?>
                        <span class="badge badge-success" style="background:green">ONLINE</span>
                        
                        <?php else: ?>
                        <span class="badge badge-warning" style="background:orange"><?= $dtl->Payment_type; ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($dtl->Payment_status == "SUCCESS"): ?>
                        <span class="badge badge-success" style="background:green"><?= $dtl->Payment_status; ?></span>
                        <h6>Transiction Id: <?= $dtl->Transiction_id; ?></h6>
                        <?php elseif($dtl->Payment_status == "Pending"): ?>
                        <span class="badge badge-warning" style="background:orange"><?= $dtl->Payment_status; ?></span>
                        <?php else: ?>
                        <span class="badge badge-danger" style="background:red"><?= $dtl->Payment_status; ?></span>
                        <?php endif; ?>
                    </td>
                    
                    <td>
                        <?php if($dtl->ord_status == "Pending"): ?>
                        <span class="badge badge-danger" style="background:red"><?= $dtl->ord_status; ?></span>
                        <?php elseif($dtl->ord_status == "Cancel"): ?>
                        <span class="badge badge-danger" style="background:red"><?= $dtl->ord_status; ?></span>
                        <?php else: ?>
                        <span class="badge badge-success" style="background:green"><?= $dtl->order_status; ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                       <?php if($dtl->order_status == "Delivered"): ?>
                        <span class="badge badge-info" style="background:green">Delivered</span>
                        <?php elseif($dtl->ord_status == "Cancel"): ?>
                            <span class="badge badge-info" style="background:red">Cancel</span>
                        <?php else: ?>
                        <a href="<?= base_url('Shop/cancelorder/'.$dtl->ord_dtl_id.'/'.$dtl->order_id.'/Cancel'); ?>" class="btn btn-danger">Cancel</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?> 
                <?php else: ?>
                <h6 style="color:red">Records Not Found</h6>
                <?php endif;?>
            </tbody>
        </table>
        </div>
    </div>
</div>


<?= $this->endSection(); ?> 