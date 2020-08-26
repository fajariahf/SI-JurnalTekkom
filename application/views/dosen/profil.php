<link rel="stylesheet" href="sweetalert/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="main-panel">
    <div class="content">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			
			<div class="row">
                <div class="col-lg-4">
                    <?= $this->session->flashdata('message');?>
                </div>
            </div>
            <div class="card mb-3 col-lg-12" >
                <div class="row no-gutters">
                    <div class="col-md-4 m-auto">
                    <img src="<?= base_url('assets/img/profile/').$_SESSION['image']; ?>" class="card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                    <h3 class="card-title"><?= $user['name'];?></h3><br>
					
                    <table class="table table-typo">
                    <div class="col-md-3">
                        <tbody>
                            <tr>
                                <td><span>NIP</span></td>
                                <td><span class="h5"><?= $user['nip'];?></span></td>
                            </tr>
                            <tr>
                                <td><span>Email</span></td>
                                <td><span class="h5"><?= $user['email'];?></span></td>
                            </tr>
                            <tr>
                                <td><span>Pendidikan Tertinggi</span></td>
                                <td><span class="h5"><?= $user['pendidikan_tertinggi'];?></span></td>
                            </tr>
                            <tr>
                                <td><span>Pangkat</span></td>
                                <td><span class="h5"><?= $user['pangkat'];?></span></td>
                            </tr>
                            <tr>
                                <td><span>Gol. Ruang</span></td>
                                <td><span class="h5"><?= $user['gol_ruang'];?></span></td>
                            </tr>
                            <tr>
                                <td><span>Jabatan Fungsional</span></td>
                                <td><span class="h5"><?= $user['jab_fungsional'];?></span></td>
                            </tr>
                            <tr>
                                <td><span>Fakultas</span></td>
                                <td><span class="h5"><?= $user['fakultas'];?></span></td>
                            </tr>
                            <tr>
                                <td><span>Jurusan</span></td>
                                <td><span class="h5"><?= $user['jurusan'];?></span></td>
                            </tr>
                            <tr>
                                <td><span>Unit Kerja</span></td>
                                <td><span class="h5"><?= $user['unit_kerja'];?></span></td>
                            </tr>
                            
                            
                        </tbody>
                        </div>
                    </table>
					<h3 class="card-title"><?= $user['role_name'];?></h3><br>
                    <p class="card-text"><small class="text-muted">Member since: <?= date('d F Y', $user['date_created']);?></small></p>
				
				<div class="col-md-5">
					<div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd">
						<a href="<?= base_url();?>Dosen/edit_profil/<?php echo $_SESSION['id_user']?>" type="button" class="nav-link active" >
						<i class="fas fa-user-edit"> Edit Profile</i>
						</a>
					</div>
				</div>

				</div>

			</div>
        </div>				
	</div>		
</div>


<script type="text/javascript">
// edit Row
$('#edit-row').DataTable({
	"pageLength": 4,
});

var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

$('#editRowButton').click(function() {
	$('#edit-row').dataTable().fnEditData([
		$("#nip").val(),
		$("#nama").val(),
        $("#email").val(),
		$("#image").val(),
		action
		]);
	$('#editRowModal').modal('hide');
});


</script>