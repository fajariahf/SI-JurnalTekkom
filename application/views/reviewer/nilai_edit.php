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
                            <h4 class="card-title">Form Edit Nilai Jurnal</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <div class="col-12">
                    <form action="<?php echo base_url();?>Reviewer/nilaiSaveEdit" enctype="multipart/form-data" method="POST" class="tab-wizard vertical wizard-circle m-t-40">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Id Nilai</label>
                                <input type="hidden" name="kode" value="<?=$kode ?>" />
                                <input readonly class="form-control" type="text" value="<?= $id_nilai?>" name="id_nilai" id="example-text-input">
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Judul Jurnal</label>
                                <input class="form-control required" type="search" value="<?php echo $judul_jurnal; ?>" name="judul_jurnal">
                        </div> 
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Kelengkapan Unsur Isi Artikel (10%)</label>
                            <input type="number" class="form-control" value="<?= $kelengkapan_isi?>" id="example-search-input" name="kelengkapan_isi">
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Ruang Lingkup dan Kedalaman Pembahasan (30%)</label>
                            <input type="number" class="form-control" value="<?= $ruanglingkup?>" id="example-search-input" name="ruanglingkup">
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Kecukupan dan Kemutahiran Data/Informasi dan Metodologi (30%)</label>
                            <input type="number" class="form-control" value="<?= $kecukupan?>" id="example-search-input" name="kecukupan">
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-2 col-form-label">Kelengkapan Unsur dan Kualitas Terbitan/Jurnal (30%)</label>
                            <input type="number" class="form-control" value="<?= $kelengkapan_unsur?>" id="example-search-input" name="kelengkapan_unsur">
                        </div>

                        <div class="col-md-2 ml-auto mr-auto">
                                        <div class="form-button-action">
                                        <button type="submit" onclick="sweet()" class="btn btn-primary">
                                            <span class="btn-label">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            Ubah
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