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
                            <h4 class="card-title">Form Upload Jurnal Baru</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <div class="col-12">
                    <form action="<?php echo base_url();?>Dosen/jurnal_save" enctype="multipart/form-data" method="POST" class="tab-wizard vertical wizard-circle m-t-40">
                        <h6 class="card-subtitle"></h6>
                            <div class="form-group row">
                                <label for="nip" class="col-2 col-form-label">Id Dosen</label>
                                <div class="col-10">
                                    <input readonly class="form-control required" value="<?= $_SESSION['id_user']?>" name="id_user">
                                    <input class="form-control" type="hidden" name="id_jurnal" id="example-text-input">
                                    <input class="form-control" type="hidden" name="keterangan" id="example-text-input" value="Belum dinilai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Judul Jurnal</label>
                                <div class="col-10">
                                <input required type="search" class="form-control" id="judul_jurnal" name="judul_jurnal" placeholder="Judul Jurnal">
                                <?= form_error('judul_jurnal','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Nama Jurnal</label>
                                <div class="col-10">
                                <input required type="search" class="form-control" id="nama_jurnal" name="nama_jurnal" placeholder="Nama Jurnal">
                                <?= form_error('nama_jurnal','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Nomor ISSN</label>
                                <div class="col-10">
                                <input required type="number" class="form-control" id="ISSN" name="ISSN" placeholder="Nomor ISSN">
                                <?= form_error('ISSN','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Volume</label>
                                <div class="col-10">
                                <input required type="search" class="form-control" id="volume" name="volume" placeholder="Volume Jurnal">
                                <?= form_error('volume','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Nomor</label>
                                <div class="col-10">
                                <input required type="number" class="form-control" id="nomor" name="nomor" placeholder="Nomor Jurnal">
                                <?= form_error('nomor','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Bulan</label>
                                <div class="col-10">
                                <select required class="form-control form-control" name="bulan" id="example-search-input">
                                        <option></option>
                                        <option>Januari</option>
                                        <option>Februari</option>
                                        <option>Maret</option>
                                        <option>April</option>
                                        <option>Mei</option>
                                        <option>Juni</option>
                                        <option>Juli</option>
                                        <option>Agustus</option>
                                        <option>September</option>
                                        <option>Oktober</option>
                                        <option>November</option>
                                        <option>Desember</option>
                                    </select>
                                    <?= form_error('bulan','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Tahun</label>
                                <div class="col-10">
                                <input required type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
                                <?= form_error('tahun','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Penerbit</label>
                                <div class="col-10">
                                <input required type="search" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit">
                                <?= form_error('penerbit','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">DOI</label>
                                <div class="col-10">
                                <input required type="search" class="form-control" id="DOI" name="DOI" placeholder="DOI (jika ada)">
                                <?= form_error('DOI','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Alamat Web Jurnal</label>
                                <div class="col-10">
                                <input required type="search" class="form-control" id="alamat_web_jurnal" name="alamat_web_jurnal" placeholder="Alamat Web Jurnal">
                                <?= form_error('alamat_web_jurnal','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Alamat Web Artikel</label>
                                <div class="col-10">
                                <input required type="search" class="form-control" id="alamat_web_artikel" name="alamat_web_artikel" placeholder="Alamat Web Artikel">
                                <?= form_error('alamat_web_artikel','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Terindeks di</label>
                                <div class="col-10">
                                <input required type="search" class="form-control" id="terindeks_di" name="terindeks_di" placeholder="Terindeks di">
                                <?= form_error('terindeks_di','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label for="filejurnal" class="col-2 col-form-label">File Jurnal</label>
                                <div class="col-10">
                                    <input required type="file" class="form-control required" class="btn btn-primary" name="file_jurnal" id="filejurnal" >
                                    <span class="text-muted"><a target="_blank" href="<?php echo base_url();?>assets/file/"></span></a>
                                    <?= form_error('file_jurnal','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            </div>
                            
                            <div class="col-md-4 ml-auto mr-auto">
                                <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd">
                                <button type="submit" class="nav-link active" data-toggle="modal" data-target="#modal_tengah">
                                    <i class="icon-cloud-upload"> Upload Jurnal</i>
                                </button>
                                </div>
                            </div>
                           
                    </form>  
                    </div>
                    </div>

                    <!-- Modal
                    <div class="modal fade in" id="modal_tengah">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">SUCCESS!</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            Jurnal Baru Berhasil Ditambahkan
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">OK!</button>
                            </div>
                        </div>
                        </div>
                    </div>
                       Modal -->


                </div>
            </div>

            </div>
        </div>				
	</div>		
</div>
