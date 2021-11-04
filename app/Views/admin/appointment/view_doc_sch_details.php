<?= $this->extend('admin/layout/layout'); ?>
<?= $this->section('content'); ?>
<center><h6 class="mb-0 text-uppercase">Doctor Appointment Schedule List</h6></center>
<a href="<?= base_url('Admin/apmntsettings') ?>" class="btn btn-warning">Back</a>
<hr/>

	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
						<tr>
                            <th>Day</th>
                            <th>Doctor</th>
                            <th>Department</th>
                            <th>Schdule Date</th>
                            <th>Schdule Time</th>
                            <th>Period</th>
                            <th>Status</th>
                            <th>Added Date</th>
                        </tr>
					</thead>
					<tbody>
					    <?php if($data):
                            count($data);
                            $i = 0;
                            foreach($data as  $list):
                                $i++;
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $list->name; ?></td>
                            <td><?= $list->departmentname; ?></td>
                            <td><?= date('d M Y', strtotime($list->givendate)); ?></td>
                            <td><?= date('h:i:s', strtotime($list->giventime)); ?></td>
                            <td><?= $list->givenperiod; ?></td>
                            <td> 
                                <?php if($list->status == 'Active'): ?>
							    <span class="badge badge-success" style="background:green">
							        <a href="<?= base_url('Admin/changedocschdulests/'.$list->id.'/InActive') ?>" style="color:white">Active</a>
							    </span>
							    <?php else: ?>
							    <span class="badge badge-danger" style="background:red">
							        <a href="<?= base_url('Admin/changedocschdulests/'.$list->id.'/Active') ?>" style="color:white">DeActivate</a>
							    </span>
							    <?php endif; ?>
							 </td>
                            <td><?= date('d M Y h:i:s', strtotime($list->added_date)); ?></td>
                            <td>
							<!--<a href="<?= base_url('Admin/editschduleonelst/'.$list->id); ?>" class="fa fa-edit"></a>-->
							<!--<a href="<?= base_url('Admin/deleteoneschdulelst/'.$list->id.'/'.$list->doctor_id); ?>" onclick="return confirm('Confirmation ! Are You Sure You want to Delete this Record ?')" class="fa fa-trash" style="color:red;padding:10px"></a>-->
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