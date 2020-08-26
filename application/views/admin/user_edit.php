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
                            <h4 class="card-title">Form Edit Data User</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    <div class="col-12">
                        <form action="<?php echo base_url();?>Admin/user_save_edit" enctype="multipart/form-data" method="POST" class="tab-wizard vertical wizard-circle m-t-40">
                        <div class="form-group">
                                <label for="example-search-input">ID User</label>
                                <input type="hidden" name="kode" value="<?=$kode ?>" />
                                <input type="hidden" class="form-control" type="text" value="3" name="status" id="example-text-input">
                                <input readonly class="form-control required" type="search" value="<?= $id_user?>" name="id_user" id="example-search-input">
                            </div>
                            <div class="form-group">
                                <label for="example-search-input">Nip</label>
                                    <input readonly class="form-control required" type="search" value="<?= $nip?>" name="nip" id="example-search-input">
                                    <input id="image" name="image" type="hidden" value="default.jpg">
                            </div>
                            <div class="form-group">
                                <label type="hidden" for="example-search-input">Nama</label>
                                    <input required class="form-control required" type="search" value="<?= $name?>" name="name" id="example-search-input">
                            </div>
                            <div class="form-group">
                                <label type="hidden" for="example-search-input">Email</label>
                                    <input readonly class="form-control required" type="search" value="<?= $email?>" name="email" id="example-search-input">
                            </div>
                            <div class="form-group">
                                <label for="solidSelect">Select Role</label>
                                    <select required class="form-control input-solid" name="role_name" id="solidSelect" type="search" value="<?= $role_name?>" >
                                        <option></option>   
                                        <option>Operator</option>
                                        <option>Reviewer</option>
                                        <option>Dosen</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="solidSelect">Select Statue</label>
                                    <select required class="form-control input-solid" name="is_active" id="solidSelect" type="search" value="<?= $is_active?>" >
                                        <option></option>
                                        <option>0</option>
                                        <option>1</option>
                                    </select>
                            </div>

                                    <div class="col-12">
                                        <div class="form-button-action">
                                        <button class="btn btn-primary">
                                            <span class="btn-label">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            Simpan
                                        </button>
                                        </div> 
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