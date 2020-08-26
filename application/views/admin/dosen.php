<div class="main-panel">
    <div class="content">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Dosen</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah Dosen
                        </button>
                    </div>
                    
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
                                    Dosen
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Create a new row using this form, make sure you fill them all</p>
        
                                <form action="<?php echo base_url();?>Admin/dosen_save" enctype="multipart/form-data" method="POST">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Nip</label>
                                                <input required id="nip" name="nip" type="text" class="form-control" placeholder="fill nip">
                                                <input id="image" name="image" type="hidden" value="default.jpg">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Nama</label>
                                                <input required id="name" name="name" type="text" class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input required id="email" name="email" type="text" class="form-control" placeholder="fill email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Password</label>
                                                <input required id="password" name="password" type="text" class="form-control" placeholder="fill password">
                                            </div>
                                        </div>
                                        <div  class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Role</label>
                                                <input readonly id="role_name" name="role_name" type="text" class="form-control" value="Dosen">
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
                                        <td align="center">Id User</td>
                                        <td align="center">Nip</td>
                                        <td align="center">Nama</td>
                                        <td align="center">Email</td>
                                        <!-- <td align="center">Password</td> -->
                                        <td align="center">Role</td>
                                        <td align="center">Statue</td>
                                        <td align="center">Action</td>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php foreach ($getuser as $p) { ?>
                                <tr>
                                    <td align="center"><?php echo $p->id_user; ?> </td>
                                    <td align="center"><?php echo $p->nip; ?> </td>
                                    <td align="center"><?php echo $p->name; ?></td>
                                    <td align="center"><?php echo $p->email; ?></td>
                                    <!-- <td align="center"><?php echo $p->password; ?></td> -->
                                    <td align="center"><?php echo $p->role_name; ?></td>
                                    <td align="center"><?php echo $p->is_active; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="<?= base_url();?>Admin/user_edit/<?php echo $p->id_user; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a onclick="deleteConfirm('<?= base_url();?>Admin/user_delete/<?php echo $p->id_user; ?>')" href="#!" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Remove Data">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            </button>                                                        
                                        </div>
                                    </td>
                                </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            
                            <!-- Logout Delete Confirmation-->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- Logout Delete Confirmation-->

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
		$("#name").val(),
        $("#email").val(),
        $("#password").val(),
        $("#role_name").val(),
		action
		]);
	$('#addRowModal').modal('hide');
});

function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}

</script>