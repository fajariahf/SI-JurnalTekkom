<div class="main-panel">
    <div class="content">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Nilai Jurnal</h4>
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
                                    <td align="center">Judul Jurnal</td>
                                    <!-- <td align="center">Id Nilai</td> -->
                                    <td align="center">Nama Reviewer</td>
                                    <!-- <td align="center">Status Reviewer</td> -->
                                    <td align="center">Kelengkapan Isi (10%)</td>
                                    <td align="center">Ruanglingkup (30%)</td>
                                    <td align="center">Kecukupan (30%)</td>
                                    <td align="center">Kelengkapan Unsur (30%)</td>
                                    <td align="center">Total Nilai</td>
                                    <td align="center">Kredit Penulis</td>
                                    <td align="center">Action</td>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php foreach ($getNilaiJurnal as $p) { 
                                        ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <td align="center"><?php echo $p->judul_jurnal; ?></td>
                                    <!-- <td align="center"><?php echo $p->id_nilai; ?></td> -->
                                    <td align="center"><?php echo $p->name_reviewer; ?></td>
                                    <!-- <td align="center"><?php echo $p->stat_reviewer; ?></td> -->
                                    <td align="center"><?php echo $p->kelengkapan_isi; ?></td>
                                    <td align="center"><?php echo $p->ruanglingkup; ?></td>
                                    <td align="center"><?php echo $p->kecukupan; ?></td>
                                    <td align="center"><?php echo $p->kelengkapan_unsur; ?></td>
                                    <td align="center"><?php echo number_format ($p->total, 2, '.', ''); ?></td>
                                    <td align="center"><?php echo $p->kredit_penulis; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <!-- <a href="<?php echo base_url();?>Dosen/download/<?php echo $p->file_penilaian; ?>" type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Download File Penilaian Jurnal">
                                                <i class="fa fa-download"></i>
                                            </a> -->
                                            <a target="_blank" href="<?php echo base_url(); ?>Dosen/cetak/<?php echo $p->id_jurnal; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Download File Penilaian Jurnal">
                                                <i class="fa fa-download"></i>
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
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
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

function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}

</script>