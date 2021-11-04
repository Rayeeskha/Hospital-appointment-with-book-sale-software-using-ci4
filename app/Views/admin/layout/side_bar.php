<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?= base_url('public/assets/images/adminlogo.png'); ?>" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Topwinner</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="<?= base_url('Admin'); ?>">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
						
					</a>
					
				</li>
				<?php if(session()->get('ADMIN_ROLE') == 1): ?>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"> <i class="bx bx-donate-blood"></i>
						</div>
						<div class="menu-title">E-Commerce</div>
					</a>
					<ul>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Category</a>
						<ul>
    						<li> <a href="<?= base_url('Admin/addcategory'); ?>"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
    						</li>
    						<li> <a href="<?= base_url('Admin/managecategory'); ?>"><i class="bx bx-right-arrow-alt"></i>Manage Category</a>
    						</li>
    					</ul>
						</li>
					</ul>
					<ul>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Products</a>
    						<ul>
        						<li> <a href="<?= base_url('Admin/addproducts'); ?>"><i class="bx bx-right-arrow-alt"></i>Add Products</a>
        						</li>
        						<li> <a href="<?= base_url('Admin/manageproducts'); ?>"><i class="bx bx-right-arrow-alt"></i>Manage Products</a>
        						</li>
        					</ul>
						</li>
					</ul>
					<ul>
						<li> <a href="<?= base_url('Admin/manageorders'); ?>"><i class="bx bx-right-arrow-alt"></i>Orders</a>
    						<!--<ul>
        						<li> <a href="<?= base_url('Admin/manageorders'); ?>"><i class="bx bx-right-arrow-alt"></i>Manage Order</a>
        						</li>
        					</ul>--->
						</li>
					</ul>
					
					<ul>
						<li> <a href="<?= base_url('Admin/customers'); ?>"><i class="bx bx-right-arrow-alt"></i>Customers</a>
						<!--<ul>
    						<li> <a href="<?= base_url('Admin/customers'); ?>"><i class="bx bx-right-arrow-alt"></i>Customers</a>
    						</li>
    					</ul>--->
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"> <i class="bx bx-donate-blood"></i>
						</div>
						<div class="menu-title">Apointment</div>
					</a>
					<ul>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Department</a>
						<ul>
						    <li><a href="<?= base_url('Admin/adddepartment') ?>">Add Department</a></li>
						    <li><a href="<?= base_url('Admin/managedepartment') ?>">Manage Department</a></li>
						</ul>
						</li>
					</ul>
					<ul>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Doctor</a>
						<ul>
						    <li><a href="<?= base_url('Admin/staff') ?>">Add Doctor</a></li>
						    <li><a href="<?= base_url('Admin/managestaff') ?>">Manage Doctor</a></li>
						</ul>
						</li>
					</ul>
					<ul>
						<li> <a href="<?= base_url('Admin/appointment') ?>"><i class="bx bx-right-arrow-alt"></i>Appointment List</a>
						<!--<ul>
						    <li><a href="<?= base_url('Admin/appointment') ?>">Appointment List</a></li>
						 </ul>--->
						</li>
					</ul>
					<ul>
						<li> <a href="<?= base_url('Admin/payment') ?>"><i class="bx bx-right-arrow-alt"></i>Payment</a>
						</li>
					</ul>
					
					<ul>
						<li><a href="<?= base_url('Admin/apmntsettings') ?>"><i class="bx bx-right-arrow-alt"></i>Settings</a></li>
					</ul>
					<ul>
						<li> <a href="<?= base_url('Admin/leavecalander'); ?>"><i class="bx bx-right-arrow-alt"></i>Leave Calander</a>
						</li>
						
					</ul>
				</li>
				<ul>
				    
					<li> <a href="#"><a class="has-arrow" href="javascript:;">
						<div class="parent-icon"> <i class="bx bx-donate-blood"></i>
						</div>
						<div class="menu-title">Users</div>
					</a></a>
					<ul>
						<li> <a href="<?= base_url('Admin/adduser'); ?>"><i class="bx bx-right-arrow-alt"></i>Add User</a>
						<li> <a href="<?= base_url('Admin/manageuser'); ?>"><i class="bx bx-right-arrow-alt"></i>Manage User</a>
						</li>
					</ul>
					</li>
				</ul>
				<?php endif; ?>
				<?php if(session()->get('USER_ROLE') == 2): ?>
				    <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"> <i class="bx bx-donate-blood"></i>
						</div>
						<div class="menu-title">Apointment</div>
					</a>
					<ul>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Department</a>
						<ul>
						    <li><a href="<?= base_url('Admin/adddepartment') ?>">Add Department</a></li>
						    <li><a href="<?= base_url('Admin/managedepartment') ?>">Manage Department</a></li>
						</ul>
						</li>
					</ul>
					<ul>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Doctor</a>
						<ul>
						    <li><a href="<?= base_url('Admin/staff') ?>">Add Doctor</a></li>
						    <li><a href="<?= base_url('Admin/managestaff') ?>">Manage Doctor</a></li>
						</ul>
						</li>
					</ul>
					<ul>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Appointment Settings</a>
						<ul>
						    <li><a href="<?= base_url('Admin/appointment') ?>">Appointment List</a></li>
						 </ul>
						</li>
					</ul>
					
					<ul>
						<li><a href="<?= base_url('Admin/apmntsettings') ?>"><i class="bx bx-right-arrow-alt"></i>Settings</a></li>
					</ul>
				</li>
				<?php endif; ?>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->