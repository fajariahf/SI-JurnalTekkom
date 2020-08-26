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
                            <h4 class="card-title">Form Tambah Penulis</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <div class="col-12">
                    <form action="<?php echo base_url();?>Dosen/tambah_penulis_save" enctype="multipart/form-data" method="POST" class="tab-wizard vertical wizard-circle m-t-40">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Id Jurnal</label>
                            <div class="col-10">
                                <input type="hidden" name="kode" value="<?=$kode ?>" />
                                <input readonly class="form-control" type="text" value="<?= $id_jurnal?>" name="id_jurnal" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Judul Jurnal</label>
                            <div class="col-10">
                                <input readonly class="form-control required" type="search" value="<?= $judul_jurnal?>" name="judul_jurnal" id="example-search-input">

                                <input class="form-control required" type="hidden" value="<?= $_SESSION['id_user']?>" name="id_user" id="example-text-input">
                            
                                <!-- <input class="form-control required" type="hidden" value="<?= $nip?>" name="nip" id="example-search-input"> -->
                                                   
                                <input class="form-control required" type="hidden" value="<?= $nama_jurnal?>" name="nama_jurnal" id="example-search-input">
                            
                                <input class="form-control required" type="hidden" value="<?= $ISSN?>" name="ISSN" id="example-search-input">
                            
                                <input class="form-control required" type="hidden" value="<?= $volume?>" name="volume" id="example-search-input">
                           
                                <input class="form-control required" type="hidden" value="<?= $nomor?>" name="nomor" id="example-search-input">

                                <input class="form-control required" type="hidden" value="<?= $bulan?>" name="bulan" id="example-search-input">
                            
                                <input class="form-control required" type="hidden" value="<?= $tahun?>" name="tahun" id="example-search-input">
                          
                                <input class="form-control required" type="hidden" value="<?= $penerbit?>" name="penerbit" id="example-search-input">
                            
                                <input class="form-control required" type="hidden" value="<?= $DOI?>" name="DOI" id="example-search-input">
                           
                                <input class="form-control required" type="hidden" value="<?= $alamat_web_jurnal?>" name="alamat_web_jurnal" id="example-search-input">
                           
                                <input class="form-control required" type="hidden" value="<?= $alamat_web_artikel?>" name="alamat_web_artikel" id="example-search-input">
                           
                                <input class="form-control required" type="hidden" value="<?= $terindeks_di?>" name="terindeks_di" id="example-search-input">
                          
                                <input class="form-control required" type="hidden" value="<?= $status?>" name="status" id="example-search-input">

                                <input class="form-control required" type="hidden" value="<?= $keterangan?>" name="keterangan" id="example-search-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Nip Penulis</label>
                            <div class="col-10">
                            <input required type="search" class="form-control" id="nip" name="nip" placeholder="Nip Penulis">
                            <?= form_error('nip','<small class="text-danger pl-3">','</small>');?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Status Penulis</label>
                            <div class="col-10">
                            <select required class="form-control form-control" name="stat_penulis" id="example-search-input"> -->
                                    <option></option>
                                    <!-- <option>P1</option> -->
                                    <option>P2</option>
                                    <option>P3</option>
                                    <option>P4</option>
                                    <option>P5</option>
                                    <option>P6</option>
                                    <option>P7</option>
                                    <option>P8</option>
                                    <option>P9</option>
                                    <option>P10</option>
                                </select>
                                <?= form_error('stat_penulis','<small class="text-danger pl-3">','</small>');?>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="wint1" class="col-2 col-form-label">File Jurnal</label>
                            <div class="col-10">
                                <input required type="file" class="form-control required" class="btn btn-primary" value="<?= $file_jurnal?>" name="file_jurnal" id="wint1" >
                                <span class="text-muted"><a target="_blank" href="<?php echo base_url();?>assets/file/<?=$file_jurnal?>"><?php echo $file_jurnal?></span></a>
                            </div>
                        </div> -->

                        <div class="col-md-2 ml-auto mr-auto">
                            <div class="form-button-action">
                            <button type="submit" class="btn btn-primary">
                                <span class="btn-label">
                                    <i class="fa fa-check"></i>
                                </span>
                                Tambah
                            </button>
                            </div> 
                        </div>
                            
                            <!-- <div class="col-md-4 ml-auto mr-auto">
                                <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd">
                                    <button type="submit" onclick="sweet()" class="nav-link active">
                                    <i class="icon-cloud-upload"> Ubah Data Jurnal</i>
                                    </a>
                                </div>
                            </div> -->

                           
                    </form>  
                    </div>
                    </div>


                </div>
            </div>

            </div>
        </div>				
	</div>		
</div>


<div class="chat-windows"></div>
    <script src="<?php echo base_url();?>dist/js/app.min.js"></script>
    <!-- <script src="<?php echo base_url();?>dist/js/app.init.dark.js"></script> -->
    <script src="<?php echo base_url();?>dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>dist/js/custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo base_url();?>assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="<?php echo base_url();?>assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?php echo base_url();?>assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="<?php echo base_url();?>assets/libs/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>assets/libs/morris.js/morris.min.js"></script>

       <script>

    //Custom design form example
    $(".tab-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onFinished: function(event, currentIndex)  {
            var form = $(this);

            // Disable validation on fields that are disabled.
            // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
            //form.validate().settings.ignore = ":disabled";

            // Start validation; Prevent form submission if false
            //return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            var form = $(this);

            // Submit form input

            form.submit();
        }
    });
    </script>