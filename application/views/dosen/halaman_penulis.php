<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">


<div class="main-panel">
    <div class="content">

        <div class="col-12">
            <div class="card">
                <div class="card-header">

                <div class="d-flex align-items-center">
                        <h4 class="card-title">Detail Penulis Jurnal</h4>
                    </div>

                    <div class="card">
                    <div class="table">
                        <div class="row">
                            <div class="col-md-12 col-table">
                                <table id="basic-datatables" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td align="center">No.</td>
                                            <td align="center">Jumlah Penulis</td>
                                            <td align="center">Judul Jurnal</td>       
                                            <td align="center">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count=0;
                                            foreach ($penulisJurnal as $row) :
                                                $count++;
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $count;?></td>
                                            <td align="center"><?php echo $row->Jumlah; ?></td>
                                            <td align="center"><?php echo $row->judul_jurnal; ?></td>
                                        <td align="center">            
                                            <a href="<?= base_url();?>Dosen/tambah_penulis/<?php echo $row->id_jurnal; ?>" type="button" data-toggle="tooltip" title="" data-original-title="Tambah Penulis Jurnal" class="btn btn-link btn-simple-primary btn-lg">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                            <a href="<?= base_url();?>Dosen/lihat_penulis/<?php echo $row->id_jurnal; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Lihat Penulis Jurnal">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                </div>

    </div>
</div>				
