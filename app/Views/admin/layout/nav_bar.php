<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
						    <?php $orders =  fetch_latest_order('orders');
						        if($orders):
						    ?>
						    
    						<li class="nav-item dropdown dropdown-large">
    							<?php if(session()->get('ADMIN_ROLE') == 1): ?>
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
								<span class="alert-count">
								    <?= count($orders); ?>
								</span>
									<i class='bx bx-bell'></i>
								</a>
							<?php endif; ?>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Latest <?= count($orders); ?> New Order</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<div class="table-responsive">
                            			   <table class="table">
                            				<thead class="table-light">
                            				 <tr>
                                                <th>Order Id</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                            				 </thead>
                            				 <tbody>
                            				      <?php 
                                                       if($orders):
                                                        count($orders);
                                                        foreach($orders as $dtl):
                                                    ?>
                                                    <tr>
                                                        <td><?= $dtl->order_id; ?></td>
                                                        <td>
                                                            <?=  $dtl->productname; ?>
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
									<a href="javascript:;">
										<!---<div class="text-center msg-footer">View All Notifications</div>--->
									</a>
								</div>
							</li>

							<?php else: ?>
							<li class="nav-item dropdown dropdown-large">
							    <a class="nav-link dropdown-toggle  position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
							    <span class="alert-count"> 0</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title" style="color:red">Not any Order</p>
										</div>
									</a>
									<div class="header-notifications-list">
									    <h5 style="color:red;text-align:center">Not any Order </h6>
									    <img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/empty-cart-3245822-2700598.png" style="width:100%;height:80%">
									 </div>
								</div>
							    
							</li>
							<?php endif; ?>
							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											
										</a>
										
									</div>
									<a href="javascript:;">
										<!---<div class="text-center msg-footer">View All Messages</div>--->
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?php if(session()->get('USER_PHOTO')): ?>
							    <img src="<?= base_url('public/uploads/users/'.session()->get('USER_PHOTO')); ?>" class="user-img" alt="user avatar">
    						<?php else: ?>
    						   <img src="<?= base_url('public/assets/images/avatars/avatar-2.png'); ?>" class="user-img" alt="user avatar">
    						
							<?php endif; ?>
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?= session()->get('ADMIN_NAME'); ?></p>
								<!--<p class="designattion mb-0">Web Designer</p>--->
							</div>
							
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<!---<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li>--->
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="<?= base_url('Login/logout'); ?>"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->