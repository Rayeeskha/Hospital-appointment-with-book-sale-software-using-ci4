<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>

<h6 class="mb-0 text-uppercase">Manage Category</h6>
	<hr/>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Category Name</th>
							<!--<th>Image</th>-->
							<th>Description</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					    <?php if($category):
					        count($category);
					        foreach($category as $cate):
					    ?>
						<tr>
							<td><?= $cate->categoryname; ?></td>
							<!--<td>-->
							<!--     <?php if($cate->photo !== "NotUploded"): ?>-->
       <!--                         <img src="<?= base_url('public/uploads/categoryimg/'.$cate->photo); ?>" alt="Avatar" style="width:50px;height:50px">-->
       <!--                     <?php else: ?>-->
       <!--                         <h6 style="color: red;font-size: 12px;font-weight: 500">Not Uploded</h6>-->
       <!--                     <?php endif; ?>-->
							        
							<!--</td>-->
							<td><?= word_limiter($cate->desctiption, 4); ?></td>
							<td>
							    <?php if($cate->status == 'Active'): ?>
							    <span class="badge badge-success" style="background:green"><a href="<?= base_url('Admin/changecatestatus/'.$cate->id.'/DeActivate') ?>" style="color:white">Active</a>
							    </span>
							    <?php else: ?>
							    <span class="badge badge-danger" style="background:red"><a href="<?= base_url('Admin/changecatestatus/'.$cate->id.'/Active') ?>" style="color:white">DeActivate</a>
							    </span>
							    <?php endif; ?>
							</td>
							<td>
							    <a href="<?= base_url('Admin/editcate/'.$cate->id); ?>" class="btn btn-primary"><span class="fa fa-edit"></a></a>
							    
							    <a href="<?= base_url('Admin/deletecate/'.$cate->id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to  delete this  Records?.');">
							        <span class="fa fa-trash"></span>
							    </a>
							</td>
						</tr>
						<?php endforeach; else: ?>
						<h6 style="color:red">Records Not Found</h6>
						<?php endif; ?>
						
					</tbody>
					
				</table>
			</div>
		</div>
	</div>



<?= $this->endSection(); ?> 