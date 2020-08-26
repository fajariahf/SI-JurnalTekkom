<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-3">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Selamat Datang, <?php echo $_SESSION['name'] ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data User</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah User
                        </button>
                    </div>

                    <div class="col-lg-6">
                    <form action="<?= base_url();?>Admin/search" method="post">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-search pr-1" id="tombolCari">
                                    <i class="fa fa-search search-icon-center"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" placeholder="Search ..." name="keyword" id="keyword" autocomplete="off">
                            </div>
                        </div>
                    </form>
                    </div>

                <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                    Tambah</span>
                                    <span class="fw-light">
                                    User
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Create a new row using this form, make sure you fill them all</p>
        
                                <form action="<?php echo base_url();?>Admin/user_save" class="user" method="POST">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Nip</label>
                                                <input required id="nip" name="nip" type="text" class="form-control" placeholder="fill nip" value="<?= set_value('nip');?>">
                                                <input required id="image" name="image" type="hidden" class="form-control" value="default.jpg">
                                                <?= form_error('nip','<small class="text-danger pl-3">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Nama</label>
                                                <input required id="name" name="name" type="text" class="form-control" placeholder="fill name" value="<?= set_value('name');?>">
                                                <?= form_error('name','<small class="text-danger pl-3">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input required id="email" name="email" type="text" class="form-control" placeholder="fill email">
                                                <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Password</label>
                                                <input required id="password" name="password" type="text" class="form-control" placeholder="fill password">
                                                <?= form_error('password','<small class="text-danger pl-3">','</small>');?>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="solidSelect">Select Role</label>
                                                <select required class="form-control input-solid" name="role_name" id="solidSelect">
                                                    <option></option>
                                                    <option>Admin</option>
                                                    <option>Operator</option>
                                                    <option>Reviewer</option>
                                                    <option>Dosen</option>
                                                </select>
                                                <?= form_error('role_name','<small class="text-danger pl-3">','</small>');?>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="solidSelect">Select Statue</label>
                                                <select required class="form-control input-solid" name="is_active" id="solidSelect">
                                                    <option></option>
                                                    <option>0</option>
                                                    <option>1</option>
                                                </select>
                                                <?= form_error('is_active','<small class="text-danger pl-3">','</small>');?>
                                            </div>
                                        </div>
                                

                                    </div>
                                    <div class="modal-footer no-bd">
                                <button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                                </form>
                            </div>
                                            
                        </div>
                    </div>
                </div>
                <!-- end modal -->

                <!-- table responsive -->
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-12">
                            <table id="basic-datatables" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                        <td align="center">No.</td>
                                        <td align="center">Id User</td>
                                        <td align="center">Nip</td>
                                        <td align="center">Nama</td>
                                        <td align="center">Email</td>
                                        <!-- <td align="center">Password</td> -->
                                        <td align="center">Role</td>
                                        <td align="center">Statue</td>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php foreach ($getuser as $p) { ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <td align="center"><?php echo $p->id_user; ?> </td>
                                    <td align="center"><?php echo $p->nip; ?> </td>
                                    <td align="center"><?php echo $p->name; ?></td>
                                    <td align="center"><?php echo $p->email; ?></td>
                                    <!-- <td align="center"><?php echo $p->password; ?></td> -->
                                    <td align="center"><?php echo $p->role_name; ?></td>
                                    <td align="center"><?php echo $p->is_active; ?></td>
                                </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
					</div>
                </div>
				<!-- table responsive -->	

			</div>						
        </div>
    </div>
</div>				
		

<script type="text/javascript">
// Add Row
$('#add-row').DataTable({
	"pageLength": 5,
});

var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

$('#addRowButton').click(function() {
	$('#add-row').dataTable().fnAddData([
		$("#nip").val(),
		$("#image").val(),
		$("#nama").val(),
        $("#email").val(),
        $("#password").val(),
        $("#role_name").val(),
        $("#is_Active").val(),
		action
		]);
	$('#addRowModal').modal('hide');
});

</script>