<?= view('admin/include/header'); ?>
<body onload="window.print()">
    <div class="card">
	<div class="card-body">
		<div id="invoice">
			
			<div class="invoice overflow-auto">
				<div style="min-width: 600px">
					<header>
						<div class="row">
							<div class="col">
								<a href="javascript:;">
									<img src="<?= base_url('public/assets/images/1.png'); ?>" width="100" alt="" />
								</a>
							</div>
							<div class="col company-details">
								<h2 class="name">
                					<a href="javascript:;">
                					<?= $orders[0]->city; ?>
                					</a>
                				</h2>
								<div><?= $orders[0]->address; ?></div>
								<div><?= $orders[0]->zipcode; ?></div>
								<div><?= $orders[0]->email; ?></div>
								
							</div>
						</div>
					</header>
					<main>
						<div class="row contacts">
							<div class="col invoice-to">
								<div class="text-gray-light">INVOICE TO:</div>
								<h2 class="to"><?= $orders[0]->firstname; ?>&nbsp;<?= $orders[0]->lastname; ?></h2>
								<div class="address"><?= $orders[0]->address; ?></div>
								<div class="email"><a href="mailto:<?= $orders[0]->email; ?>"><?= $orders[0]->email; ?></a>
								</div>
							</div>
							<div class="col invoice-details">
								<h1 class="invoice-id">ORDER ID : <?= $orders[0]->order_id; ?></h1>
								<div class="date">Date of ORDER: <?= date('d M Y', strtotime($orders[0]->created_at)); ?></div>
							</div>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th>Product Name</th>
									<th>Photo</th>
									<th>Price</th>
									<th>Qty</th>
									<th>TOTAL</th>
								</tr>
							</thead>
							<tbody>
							    <?php if($order_details):
							        count($order_details);
							        foreach($order_details as $ord_details):
							            $pro_details = fetch_cate_rec('products',$ord_details->product_id);
							    ?>
							    <tr>
									<td><?= $pro_details[0]->productname; ?></td>
									<td>
										<img src="<?= base_url('public/uploads/productimg/'.$pro_details[0]->photo); ?>" style="width:50px;height:50px">
									</td>
									<td>
									    KWD&nbsp;
									    <?= number_format($ord_details->pro_price); ?>
									</td>
									<td><?= number_format($ord_details->qty); ?></td>
									<td>KWD
									    <?php 
									    $total_price = $ord_details->qty * $ord_details->pro_price; 
									    echo number_format($total_price);
									    ?>
									  <?php if($ord_details->ord_status == "Cancel"): ?>
									    <span class="badge badge-danger" style="background:red;color:white">Cancel</span>
									    <?php endif; ?>
									  </td>
								</tr>
								<?php endforeach; else: ?>
								<h6 style="color:red">Records Not Found</h6>
								<?php endif; ?>
							</tbody>
							<tfoot>
							    <tr>
									<td colspan="2"></td>
									<td colspan="2">GRAND TOTAL</td>
									<td>KWd<?= number_format($orders[0]->total_amount); ?></td>
								</tr>
							</tfoot>
						</table>
						
					</main>
					<footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
				</div>
				<!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
				<div></div>
			</div>
		</div>
	</div>
</div>
    
</body>