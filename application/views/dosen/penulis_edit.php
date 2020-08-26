<link rel="stylesheet" href="sweetalert/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="main-panel">
    <div class="content">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Form Edit Data Jurnal</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <div class="col-12">
                    <form action="<?php echo base_url();?>Dosen/jurnal_save_edit" enctype="multipart/form-data" method="POST" class="tab-wizard vertical wizard-circle m-t-40">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Id Jurnal</label>
                            <div class="col-10">
                                <!-- <input type="hidden" name="kode" value="<?=$kode ?>" /> -->
                                <input readonly class="form-control" type="text" value="<?= $id_jurnal?>" name="id_jurnal" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Judul Jurnal</label>
                            <div class="col-10">
                                <input readonly class="form-control" type="text" value="<?= $judul_jurnal?>" name="judul_jurnal" id="example-text-input">
                            </div>
                        </div>

                        <div class="card-body">
                        <div class="table">
                        <div class="row">
                            <div class="col-md-12 col-table">
                                <table id="basic-datatables" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td align="center">Status Penulis</td>
                                            <td align="center">NIP Penulis</td>                                            
                                            <td align="center">Nama Penulis</td>
                                            <td align="center">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($getDataPenulis as $row) :
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $row->status; ?></td>
                                            <td align="center"><?php echo $row->nip; ?></td>
                                            <td align="center"><?php echo $row->name;?></td>
                                        <td align="center">
                                            <a onclick="deleteConfirm('<?= base_url();?>Dosen/penulis_delete/<?php echo $row->id_pj; ?>')" href="#!" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Hapus Penulis Jurnal">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                        </tr>
                                        <?php endforeach;?>
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
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Logout Delete Confirmation-->
                                </div>
           
                                                    
                    </form>  
                    </div>
                    </div>


                </div>
            </div>

            </div>
        </div>				
	</div>		
</div>

<script type="text/javascript">

function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}

</script>