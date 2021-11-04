<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>

<h6 class="mb-0 text-uppercase">Manage Products</h6>
	<hr/>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
						    <th>Image</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Regular PRICE</th>
							<th>Sale PRICE</th>
							<th>STOCK</th>
							<th>Short Description</th>
							<th>Long Description</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					    <?php if($products):
					        count($products);
					        foreach($products as $cate):
					    ?>
						<tr>
							<td>
							     <?php if($cate->photo !== "NotUploded"): ?>
                                <img src="<?= base_url('public/uploads/productimg/'.$cate->photo); ?>" alt="Avatar" style="width:50px;height:50px">
                            <?php else: ?>
                                <h6 style="color: red;font-size: 12px;font-weight: 500">Not Uploded</h6>
                            <?php endif; ?>
							</td>
							<td><?= $cate->productname; ?></td>
							<td>
							    <?php $category =  fetch_cate_rec('category', $cate->category_id);
							        if($category){
							            echo $category[0]->categoryname;
							        }
							    ?>
							   
							    </td>
							<td><?= number_format($cate->mrpprice); ?></td>
							<td><?= number_format($cate->price); ?></td>
							<td><?= number_format($cate->stock); ?></td>
							<td><?= word_limiter($cate->desctiption, 4); ?></td>
							<td><?= word_limiter($cate->longdesc, 5); ?></td>
							<td>
							    <?php if($cate->status == 'Active'): ?>
							    <span class="badge badge-success" style="background:green"><a href="<?= base_url('Admin/changeprostatus/'.$cate->id.'/DeActivate') ?>" style="color:white">Active</a>
							    </span>
							    <?php else: ?>
							    <span class="badge badge-danger" style="background:red"><a href="<?= base_url('Admin/changeprostatus/'.$cate->id.'/Active') ?>" style="color:white">DeActivate</a>
							    </span>
							    <?php endif; ?>
							</td>
							<td>
							    <a href="<?= base_url('Admin/editproducts/'.$cate->id); ?>" class="btn btn-primary"><span class="fa fa-edit"></a></a>
							    
							    <a href="<?= base_url('Admin/deletproducts/'.$cate->id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to  delete this  Records?.');">
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