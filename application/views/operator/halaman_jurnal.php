<div class="main-panel">
    <div class="content">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Jurnal</h4>
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
                <div class="table">
                    <div class="row">
                        <div class="col-md-12 col-table">
                            <table id="basic-datatables" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <td width="10%" align="center">No.</td>
                                    <td width="10%" align="center">Id Dosen</td>
                                    <td width="20%" align="center">Nama Dosen</td>
                                    <td width="20%" align="center">NIP Dosen</td>
                                    <td width="100%" align="center">Judul Jurnal</td>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $no=1; ?>
                                    <?php foreach ($getDataJurnal as $p) { ?>
                                <tr>
                                    <td width="10%" align="center"><?php echo $no++; ?></td>
                                    <td width="10%" align="center"><?php echo $p->id_user; ?></td>                                    
                                    <td width="20%" align="center"><?php echo $p->name; ?></td>
                                    <td width="20%" align="center"><?php echo $p->nip; ?></td>
                                    <td width="100%" align="center"><?php echo $p->judul_jurnal; ?></td>
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
		