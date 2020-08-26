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
                            <h4 class="card-title">Form Tambah User Baru</h4>
                        </div>
                    </div>

    <div class="card-body">
      <div class="col-12">
        <form action="<?php echo base_url();?>Operator/user_save" enctype="multipart/form-data" method="POST" class="tab-wizard vertical wizard-circle m-t-40">
          <h6 class="card-subtitle"></h6>
            <div class="form-group row">
                <label for="nip" class="col-2 col-form-label">NIP</label>
                <div class="col-10">
                <input required type="search" class="form-control" id="nip" name="nip" placeholder="NIP">
                <input id="image" name="image" type="hidden" value="default.jpg">
                <input class="form-control" type="hidden" name="id_user" id="example-text-input">
                <?= form_error('nip','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-2 col-form-label">Nama</label>
                <div class="col-10">
                <input required type="search" class="form-control" id="name" name="name" placeholder="Nama">
                <?= form_error('name','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                <input required type="search" class="form-control" id="email" name="email" placeholder="Email">
                <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                <input required type="search" class="form-control" id="password" name="password" placeholder="Password">
                <?= form_error('password','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Role Name</label>
                <div class="col-10">
                <select required class="form-control form-control" name="role_name" id="example-search-input">
                        <option></option>
                        <option>Reviewer</option>
                        <option>Dosen</option>
                        </select>
                    <?= form_error('role_name','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Pendidikan Tertinggi</label>
                <div class="col-10 ml-auto mr-auto">
                <select required class="form-control form-control" name="pendidikan_tertinggi" id="example-search-input">
                        <option></option>
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                        </select>
                    <?= form_error('pendidikan_tertinggi','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Pangkat</label>
                <div class="col-10">
                <input required type="search" class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat">
                <?= form_error('pangkat','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Gol. Ruang</label>
                <div class="col-10">
                <input required type="search" class="form-control" id="gol_ruang" name="gol_ruang" placeholder="Gol. Ruang">
                <?= form_error('gol_ruang','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Jabatan Fungsional</label>
                <div class="col-10">
                <input required type="search" class="form-control" id="jab_fungsional" name="jab_fungsional" placeholder="Jabatan Fungsional">
                <?= form_error('jab_fungsional','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Fakultas</label>
                <div class="col-10">
                    <select required class="form-control form-control" name="fakultas" id="example-search-input">
                        <!-- <option></option> -->
                        <option>Teknik</option>
                        <!-- <option>Hukum</option>
                        <option>Ekonomi dan Bisnis</option>
                        <option>Ilmu Budaya dan Bahasa</option>
                        <option>Kesehatan Masyarakat</option>
                        <option>Kedokteran</option>
                        <option>Pertanian dan Peternakan</option>
                        <option>Perikanan dan Ilmu Kelautan</option>
                        <option>Sains dan Matematika</option>
                        <option>Ilmu Sosial dan Ilmu Politik</option>
                        <option>Psikologi</option>
                        <option>Sekolah Vokasi</option> -->
                    </select>
                    <?= form_error('fakultas','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Jurusan</label>
                <div class="col-10">
                    <select required class="form-control form-control" name="jurusan" id="example-search-input">
                        <!-- <option></option> -->
                        <option>Teknik Komputer</option>
                        <!-- <option>Teknik Sipil</option>
                        <option>Teknik Arsitektur</option>
                        <option>Teknik Kimia</option>
                        <option>Teknik Geodesi</option>
                        <option>Teknik Geologi</option>
                        <option>Teknik Perkapalan</option>
                        <option>Teknik Mesin</option>
                        <option>Teknik Elektro</option>
                        <option>Teknik Lingkungan</option>
                        <option>Teknik Perencanaan Wilayah dan Kota</option>
                        <option>Teknik Industri</option> -->
                        </select>
                    <?= form_error('jurusan','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Unit Kerja</label>
                <div class="col-10">
                <input required type="search" class="form-control" id="unit_kerja" name="unit_kerja" placeholder="Unit Kerja">
                <?= form_error('unit_kerja','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-search-input" class="col-2 col-form-label">Status</label>
                <div class="col-10">
                    <select readonly class="form-control form-control" name="is_active" id="example-search-input">
                        <option>0</option>
                        </select>
                    <?= form_error('is_active','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>

            <div class="col-md-4 ml-auto mr-auto">
                <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd">
                    <button type="submit"  class="btn btn-primary btn-round">
                    <i class="fa fa-plus"> Tambah Data User</i>
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