<link rel="stylesheet" href="sweetalert/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="main-panel">
    <div class="content">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Form Upload Nilai Jurnal</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <div class="col-12">
                    <form action="<?php echo base_url();?>Reviewer/nilai_save" enctype="multipart/form-data" method="POST" class="tab-wizard vertical wizard-circle m-t-40">
                        <h6 class="card-subtitle"></h6>
                            <div class="form-group row">
                                <label for="id_jurnal" class="col-2 col-form-label">Id Jurnal</label>
                                    <input readonly class="form-control required" value="<?php echo $id_jurnal; ?>" name="id_jurnal">
                            </div>
                            <div class="form-group row">
                                <label for="id_user" class="col-2 col-form-label">Id Reviewer</label>
                                    <input readonly class="form-control required" value="<?= $_SESSION['id_user'];?>" name="id_reviewer" id="id_reviewer">
                                    <input class="form-control" type="hidden" name="id_nilai" id="example-text-input">
                                    <input class="form-control" type="hidden" value="<?= $_SESSION['name'];?>" name="name_reviewer" id="name_reviewer">
                                    <input class="form-control" type="hidden" value="<?= $_SESSION['nip'];?>" name="nip_reviewer" id="nip_reviewer">
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Status Reviewer</label>
                                <select required class="form-control form-control" name="stat_reviewer" id="example-search-input">
                                        <!-- <option></option> -->
                                        <option>Reviewer 1</option>
                                        <!-- <option>R2</option> -->
                                </select>
                                    <?= form_error('stat_reviewer','<small class="text-danger pl-3">','</small>');?>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Kelengkapan Unsur Isi Artikel (10%)</label>
                                <input required type="number" class="form-control" id="kelengkapan_isi" name="kelengkapan_isi" placeholder="Kelengkapan Unsur Isi Artikel">
                                <?= form_error('kelengkapan_isi','<small class="text-danger pl-3">','</small>');?>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Ruang Lingkup dan Kedalaman Pembahasan (30%)</label>
                                <input required type="number" class="form-control" id="ruanglingkup" name="ruanglingkup" placeholder="Ruang Lingkup dan Kedalaman Pembahasan Jurnal">
                                <?= form_error('ruanglingkup','<small class="text-danger pl-3">','</small>');?>
                                </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-6 col-form-label">Kecukupan dan Kemutahiran Data/Informasi dan Metodologi (30%)</label>
                                <input required type="number" class="form-control" id="kecukupan" name="kecukupan" placeholder="Kecukupan dan Kemutahiran Data/Informasi dan Metodologi">
                                <?= form_error('kecukupan','<small class="text-danger pl-3">','</small>');?>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Kelengkapan Unsur dan Kualitas Terbitan/Jurnal (30%)</label>
                                <input required type="number" class="form-control" id="kelengkapan_unsur" name="kelengkapan_unsur" placeholder="Kelengkapan Unsur dan Kualitas Terbitan/Jurnal">
                                <?= form_error('kelengkapan_unsur','<small class="text-danger pl-3">','</small>');?>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Keterangan</label>
                                <input readonly type="search" class="form-control" value="Sudah dinilai" id="keterangan" name="keterangan">
                                <?= form_error('keterangan','<small class="text-danger pl-3">','</small>');?>
                            </div> -->
                            
                            <div class="col-md-4 ml-auto mr-auto">
                                <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd">
                                    <button type="submit"  class="nav-link active">
                                    <i class="icon-cloud-upload"> Upload Nilai Jurnal</i>
                                    </a>
                                </div>
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