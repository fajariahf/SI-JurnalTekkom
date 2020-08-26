<div class="main-panel">
    <div class="content">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Jurnal</h4>
                        <a class="btn btn-primary btn-round ml-auto" href="<?= base_url();?>Dosen/upload_jurnal" type="button">
                            <i class="fa fa-plus"></i>
                            Tambah Jurnal
                        </a>
                    </div>
    
                    <!-- <div class="col-lg-6">
                        <form action="<?= base_url();?>Dosen/search" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1" id="tombolCari">
                                        <i class="fa fa-search search-icon-center"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control" placeholder="Search ..." name="keyword" id="keyword" autocomplete="off">
                                </div>
                            </div>
                        </form> -->
                    </div>

                <div class="card-body">
                <!-- table responsive -->
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-4 col-table">
                            <table id="basic-datatables" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td align="center">No.</td>
                                    <!-- <td align="center">Id Jurnal</td> -->
                                    <td align="center">Judul</td>
                                    <td align="center">Nama Jurnal</td>
                                    <td align="center">Nomor ISSN</td>
                                    <td align="center">Volume/Nomor Bulan/Tahun</td>
                                    <td align="center">Penerbit</td>
                                    <td align="center">DOI</td>
                                    <td align="center">Alamat Web Jurnal/<br>Alamat Web Artikel</td>
                                    <td align="center">Terindeks di</td>
                                    <td align="center">Action</td>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php foreach ($getDataJurnal as $p) { ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <!-- <td align="center"><?php echo $p->id_jurnal; ?></td> -->
                                    <td align="center"><?php echo $p->judul_jurnal; ?></td>
                                    <td align="center"><?php echo $p->nama_jurnal; ?></td>
                                    <td align="center"><?php echo $p->ISSN; ?></td>
                                    <td align="center"><?php echo $p->volume; ?>/<?php echo $p->nomor; ?><br><?php echo $p->bulan; ?>/<?php echo $p->tahun; ?></td>
                                    <td align="center"><?php echo $p->penerbit; ?></td>   
                                    <td align="center"><?php echo $p->DOI; ?></td>

                                    <td align="center">
                                    <a href="<?php echo $p->alamat_web_jurnal; ?>" target="_blank">
                                    <?php echo $p->alamat_web_jurnal; ?>
                                    <br></a>
                                    <a href=" <?php echo $p->alamat_web_artikel;?>" target="_blank">
                                    <?php echo $p->alamat_web_artikel;?></a></td>
                                    <td align="center"><?php echo $p->terindeks_di; ?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <!-- <a href="<?= base_url();?>Dosen/halaman_penulis" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Tambah Penulis">
                                                <i class="fa fa-plus"></i>
                                            </a> -->
                                            <a href="<?php echo base_url();?>Dosen/download/<?php echo $p->file_jurnal; ?>" type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Download Jurnal">
                                                <i class="fa fa-download"></i>
                                            </a>
                                            <a href="<?= base_url();?>Dosen/edit_jurnal/<?php echo $p->id_jurnal; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Edit Data Jurnal">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a onclick="deleteConfirm('<?= base_url();?>Dosen/delete/<?php echo $p->id_jurnal; ?>')" href="#!" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Hapus Jurnal">
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