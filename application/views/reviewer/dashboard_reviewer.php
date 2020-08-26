<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-3">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Selamat Datang di Akun Reviewer, <?php echo $_SESSION['name'] ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">

        <div class="card-body">
        <!-- table responsive -->
        <div class="card-body">
        <div class="row">
          <div class="d-flex align-items-center">
              <h4 class="card-title">Data Nilai Jurnal Dosen</h4>
          </div>
          <div class="col-md-4 ml-auto ">
                    <form action="<?= base_url();?>Reviewer/search_index" method="post">
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
        </div>

          <div class="table">
            <div class="row">
                <div class="col-12">
                    <table id="basic-datatables" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                                <td align="center">No.</td>
                                <td align="center">Id Jurnal</td>
                                <!-- <td align="center">Nama Penulis</td> -->
                                <td align="center">Judul Jurnal</td>
                                <td align="center">Jumlah Reviewer</td>
                        </tr>
                        </thead>
                        
                        <tbody>
                            <?php $no=1; ?>
                            <?php foreach ($getView as $p) { ?>
                        <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td align="center"><?php echo $p->id_jurnal; ?></td>
                            <!-- <td align="center"><?php echo $p->name; ?></td> -->
                            <td align="center"><?php echo $p->judul_jurnal; ?> </td>
                            <td align="center"><?php echo $p->Q; ?></td>
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
</div>	