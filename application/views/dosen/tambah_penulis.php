<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="<?= base_url(); ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url(); ?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/atlantis.min.css">
	
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	

<div class="main-panel">
    <div class="content">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <p class="card-title h3">Form Tambah Penulis</p>
                            <!-- <?= $this->session->flashdata('message');?> -->
                        </div>
							<p class="text-primary h6">*mohon masukkan NIP penulis sesuai dengan status penulis</p>
                    </div>
                    <div class="form-group">
                        <form name="add_name" id="add_name">
                            <input name="id_jurnal" id="id_jurnal" type="hidden" value="<?php echo $id_jurnal?>">
                            <div class="table-responsive">  
                                <table class="table table-bordered" id="dynamic_field">  
                                <tr>
                                   <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                    </tr>  
                                </table>  
                                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                            </div>  
                        </form>  
                    </div>  

                    
                </div>
            </div>

            </div>
        </div>				
	</div>		
</div>
<script>

	function urutanPenulis(data) {
		switch (data) {
			case 1:
				return "Penulis Pertama";
				break;
			case 2:
				return "Penulis Kedua";
				break;
			case 3:
				return "Penulis Ketiga";
				break;
			case 4:
				return "Penulis Keempat";
				break;
			case 5:
				return "Penulis Kelima";
				break;
			case 6:
				return "Penulis Keenam";
				break;
			case 7:
				return "Penulis Ketujuh";
				break;
			case 8:
				return "Penulis Kedelapan";
				break;
			case 9:
				return "Penulis Kesembilan";
				break;
			case 10:
				return "Penulis Kesepuluh";
				break;
			default:
				return "default";
				break;
		}
	}

 $(document).ready(function(){  
      var i=0;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'">'+
           '<td><input type="text" name="status[]" class="form-control status_list" value="'+urutanPenulis(i)+'" readonly /></td>'+
           '<td><input type="text" name="name[]" placeholder="Enter Users NIP (Author NIP)" class="form-control name_list" /></td>'+
           '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'
           
           );  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("nip");   
           $('#row'+button_id+'').remove();
      });  
      $('#submit').click(function(){            
           $.ajax({ 
                url:"<?php echo base_url();?>Dosen/tambahPenulis/",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success: 
				
				function(data)  
                {  
					if(data == "Y"){
						location.href = "<?php echo base_url();?>Dosen/halaman_penulis";
                     	// alert("data berhasil ditambahkan");  
					}else{
                     	alert("masukkan NIP yang sesuai");  
                     	$('#add_name')[0].reset();  
					}
                }  
           });  
      });  
 });  
 </script>

 <!--   Core JS Files   -->
 <script src="<?= base_url(); ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>

	
 <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.js');?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>

	<!-- jQuery UI -->
	<script src="<?= base_url(); ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= base_url(); ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?= base_url(); ?>assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= base_url(); ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?= base_url(); ?>assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= base_url(); ?>assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= base_url(); ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?= base_url(); ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?= base_url(); ?>assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?= base_url(); ?>assets/js/setting-demo.js"></script>
	<script src="<?= base_url(); ?>assets/js/demo.js"></script>
</body>
</html>