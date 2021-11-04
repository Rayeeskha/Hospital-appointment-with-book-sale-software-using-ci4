<?= $this->extend('admin/layout/layout'); ?>

<?= $this->section('content'); ?>
<!--start page wrapper -->
<?php if(session()->get('ADMIN_ROLE') == 1): ?>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
	
       <div class="col">
		 <div class="card radius-10 border-start border-0 border-3 border-info">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Today Appointment</p>
						<h4 class="my-1 text-info"><?php if($todayapmnt): echo count($todayapmnt); else: echo "0"; endif;?></h4>
						<p class="mb-0 font-13">8 from last week</p>
					</div>
					<div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bxs-cart'></i>
					</div>
				</div>
			</div>
		 </div>
	   </div>
	   <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-danger">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">Pending Appointment</p>
					   <h4 class="my-1 text-danger"><?php if($pendingapmnt): echo count($pendingapmnt); else: echo "0"; endif;?></h4>
					   <p class="mb-0 font-13">3 from last week</p>
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-wallet'></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div>
	  
	  <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-success">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">Total order</p>
					   <h4 class="my-1 text-success"><?php if($totalorder): echo count($totalorder); else: echo "0"; endif;?></h4>
					   <p class="mb-0 font-13">10% from last week</p>
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div>
	  <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-warning">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">Pending orders</p>
					   <h4 class="my-1 text-warning"><?php if($pendingorder): echo count($pendingorder); else: echo "0"; endif;?></h4>
					   <p class="mb-0 font-13">2 from last week</p>
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bxs-group'></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div> 
	</div><!--end row-->
	<?php else: ?>
		<div class="row">
			<div class="col">
		 <div class="card radius-10 border-start border-0 border-3 border-info">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Today Appointment</p>
						<h4 class="my-1 text-info"><?php if($todayapmnt): echo count($todayapmnt); else: echo "0"; endif;?></h4>
						<p class="mb-0 font-13">8 from last week</p>
					</div>
					<div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bxs-cart'></i>
					</div>
				</div>
			</div>
		 </div>
	   </div>
	   <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-danger">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">Pending Appointment</p>
					   <h4 class="my-1 text-danger"><?php if($pendingapmnt): echo count($pendingapmnt); else: echo "0"; endif;?></h4>
					   <p class="mb-0 font-13">3 from last week</p>
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-wallet'></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div>
		</div>

	<?php endif; ?>

	<div class="row">
       
	   <div class="col-12 col-lg-12">
           <div class="card radius-10">
			   <div class="card-body">
				
				<div>
					<div id="appointment_chart_box" style="height: 400px; width: 100%;"></div>
				  </div>
			   </div>
			   
		   </div>
	   </div>
	</div><!--end row-->
<?php if(session()->get('ADMIN_ROLE') == 1): ?>
	 <div class="card radius-10">
             <div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h6 class="mb-0">Latest Order</h6>
					</div>
				</div>
			 <div class="table-responsive">
			   <table class="table align-middle mb-0">
				<thead class="table-light">
				 <tr>
                    <th>Order Id</th>
                    <th>Product Name</th>
                    <th>Photo</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
				 </thead>
				 <tbody>
				    <?php 
                       if($latest_order):
                        count($latest_order);
                        foreach($latest_order as $dtl):
                    ?>
                    <tr>
                        <td><?= $dtl->order_id; ?></td>
                        <td>
                            <?=  $dtl->productname; ?>
                        </td>
                        <td>
                            <img src="<?= base_url('public/uploads/productimg/'.$dtl->photo); ?>" style="width:50px;height:50px">
                        </td>
                        <td>
                            <?=  number_format($dtl->qty); ?>
                        </td>
                        <td>
                            KWD&nbsp;<?=  number_format($dtl->pro_price); ?>
                        </td>
                        <td>
                            KWD&nbsp;<?php $total = $dtl->qty * $dtl->pro_price;
                                echo number_format($total);
                            ?>
                        </td>
                        <td>
                            <?php if($dtl->order_status == "Pending"): ?>
                            <span class="badge badge-danger" style="background:red"><?= $dtl->order_status; ?></span>
                            <?php elseif($dtl->order_status == "Cancel"): ?>
                            <span class="badge badge-danger" style="background:red"><?= $dtl->order_status; ?></span>
                            <?php else: ?>
                            <span class="badge badge-success" style="background:green"><?= $dtl->order_status; ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                           <?php if($dtl->order_status == "Delivered"): ?>
                            <span class="badge badge-info" style="background:green">Delivered</span>
                            <?php elseif($dtl->order_status == "Cancel"): ?>
                                <span class="badge badge-info" style="background:red">Cancel</span>
                            <?php else: ?>
                               <a href="<?= base_url('Admin/vieworder/'.$dtl->order_id); ?>">View</a>
							<?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?> 
                    <?php else: endif;?>
			    </tbody>
			  </table>
			  </div>
			 </div>
		</div>
        </div>
	  </div>
 </div><!--end row-->
 <?php endif; ?>
<!-- Appointement Dashboard Chart -->
 <script>
    window.onload = function () {
	var options = {
	    animationEnabled: true,
	    title: {
	         text: "Appointment Reports"
	    },
	    data: [{
	        type: "doughnut",
	        innerRadius: "40%",
	        showInLegend: true,
	        legendText: "{label}",
	        indexLabel: "{label}:",
	        dataPoints: [
	             { label : 'Pending Appointment',     y: <?= $chart_data['ch_pending_apmnt']; ?> },
	                { label : 'Cancel Appointment', y: <?= $chart_data['ch_cancel_apmnt']; ?> },
	                { label : 'Booked Appointment',  y: <?= $chart_data['ch_booked_apmnt']; ?> },
	                { label : 'All Appointment',  y: <?= $chart_data['ch_all_apmnt']; ?> },
	        ]
	    }]
	};
	$("#appointment_chart_box").CanvasJSChart(options);

	} 
 </script>


<?= $this->endSection(); ?> 					 