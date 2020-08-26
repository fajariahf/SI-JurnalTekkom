<link rel="stylesheet" href="sweetalert/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="main-panel">
    <div class="content">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

            <div class="col-12">
                        <div class="card">
                            <div class="card-body wizard-content">
                                <h4 class="card-title">Form Edit Profil</h4>
                                <br>
                                <h6 class="card-subtitle"></h6>
                                <form action="<?php echo base_url();?>Admin/profil_save_edit" enctype="multipart/form-data" method="POST"class="tab-wizard vertical wizard-circle m-t-40">
                                   <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Id</label>
                                        <div class="col-10">
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <input readonly class="form-control" type="text" value="<?php echo $_SESSION['id_user']?>" name="id_user" id="example-text-input">
                                            <!-- <input type="hidden" class="form-control" type="text" value="3" name="status" id="example-text-input"> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Nip</label>
                                        <div class="col-10">
                                            <input readonly class="form-control required" type="search" value="<?= $nip?>" name="nip" id="example-search-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Nama</label>
                                        <div class="col-10">
                                            <input class="form-control required" type="search" value="<?= $name?>" name="name" id="example-search-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                        <div class="col-10">
                                            <input readonly class="form-control" type="text" value="<?= $email?>" name="email" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="wint1" class="col-2 col-form-label">Foto Profil</label>
                                        <div class="col-10">
                                            <input type="file" class="form-control required" class="btn btn-primary" value="<?php echo $image?>" name="image" id="wint1" >
                                            <span class="text-muted"><a target="_blank" href="<?php echo base_url();?>assets/img/profile/<?=$image?>"><?php echo $image?></span></a>
                                        </div>
                                    </div>

                                    <div class="col-md-4 ml-auto mr-auto">
                                        <div class="form-button-action">
                                        <button type="submit" class="btn btn-primary">
                                            <span class="btn-label">
                                                <i class="fa fa-check fa-x2"></i>
                                            </span>
                                            Ubah
                                        </button>
                                        </div> 
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->

            
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

function sweet (){
    swal("Data baru berhasil disimpan!", {
	buttons: false,
	timer: 5000,
    });
}
    </script>