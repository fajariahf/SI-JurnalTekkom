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
                        <a type="button" class="btn btn-primary btn-round ml-auto" href="<?= base_url();?>Operator/tambah_user">
                            <i class="fa fa-plus"></i>
                            Tambah User
                        </a>
                    </div>
                    <div class="col-lg-6">
                    <form action="<?= base_url();?>Operator/search" method="post">
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
		$("#name").val(),
        $("#email").val(),
        $("#password").val(),
        $("#role_name").val(),
		action
		]);
	$('#addRowModal').modal('hide');
});

</script>