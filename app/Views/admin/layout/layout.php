<?= view('admin/include/header'); ?>

<?= view('admin/layout/side_bar'); ?>

<?= view('admin/layout/nav_bar'); ?>


<div class="page-wrapper">
	<div class="page-content">
	    
	      <!---Php Meassge Show --->
	<div style="margin-left: 20px;margin-right: 10px">
      	<?php  if(session()->getTempdata('success')): ?>
      	    
      	    <div class="alert alert-primary border-0 bg-primary alert-dismissible fade show py-2">
			<div class="d-flex align-items-center">
				<div class="font-35 text-white"><i class='bx bx-bookmark-heart'></i>
				</div>
				<div class="ms-3">
					<h6 class="mb-0 text-white"><?= session()->getTempdata('success'); ?></h6>
				</div>
			</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
      	
          <?php endif; ?>
          <?php  if(session()->getTempdata('error')): ?>
            
            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
			<div class="d-flex align-items-center">
				<div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
				</div>
				<div class="ms-3">
					<h6 class="mb-0 text-white"><?= session()->getTempdata('error'); ?></h6>
				</div>
			</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
          
    	<?php endif; ?>
	</div>
 <!---Php Meassge End ---> 

	<!------Website Wrapper ----->
    <?= $this->renderSection("content"); ?>
<!------Website Wrapper ----->


	</div>
</div>


<?= view('admin/include/footer'); ?>

<?= view('admin/include/js_file'); ?>