<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$role_name = $this->session->userdata('role_name');
		$email = $this->session->userdata('email');
		if ($role_name == 'Dosen')
		{
			'<?php echo base_url();?>Dosen/';
		} else if ($role_name !== 'Dosen' && $email == NULL){			
				redirect('Auth');
		} 
		   else {
			redirect('Auth');
		}
	}

    public function index()
	{
		$data['judul'] 		= 'Dashboard Dosen';
		$data['getView']	= $this->Jurnal_model->joinJurnalDashboard();

		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/dashboard_dosen', $data);
		$this->load->view('templates/footer');
	}

	public function search()
	{
		$data['judul'] 		= 'Halaman Jurnal';
		$keyword 			= $this->input->post('keyword');
		$data['getView'] 	= $this->Jurnal_model->search($keyword);

		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/dashboard_dosen', $data);
		$this->load->view('templates/footer');
	}

	public function jurnal_delete($id_jurnal, $id_pj)
	{
		$this->Jurnal_model->jurnal_delete($id_jurnal, $id_pj);
		redirect('Dosen/halaman_jurnal');
	}

///////////////////////////// data user ///////////////////////////////////

	public function operator()
	{
		$data['judul'] 		= 'Halaman Data Operator';
		$data['getuser'] 	= $this->User_model->getOperator();

		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/halaman_operator', $data);
		$this->load->view('templates/footer');
	}

	public function reviewer()
	{
		$data['judul'] 		= 'Halaman Data Reviewer';
		$data['getuser'] 	= $this->User_model->getReviewer();

		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/halaman_reviewer', $data);
		$this->load->view('templates/footer');
	}
	
	public function data_dosen()
	{
		$data['judul'] 		= 'Halaman Data Dosen';
		$data['getuser'] 	= $this->User_model->getDosen();

		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/halaman_dosen', $data);
		$this->load->view('templates/footer');
	}

/////////////////////// menu ///////////////////////////////////
	public function halaman_jurnal()
	{

		$data['judul'] 			= 'Halaman Jurnal Dosen';
		// $data['getDataJurnal']	= $this->Jurnal_model->view_jurnal();
		$data['getDataJurnal']  = $this->Jurnal_model->view_jurnal($this->session->id_user);

		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/halaman_jurnal', $data);
		$this->load->view('templates/footer');
	}

	public function upload_jurnal()
	{
		$data['judul'] 		= 'Halaman Jurnal Dosen';
		
		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/form_upload_jurnal', $data);
		$this->load->view('templates/footer');
	}

	public function jurnal_save()
	{
		
		$data['id_jurnal']			= $this->input->post('id_jurnal',true);
		$data['id_user']			= $this->input->post('id_user',true);
		$data['judul_jurnal']		= $this->input->post('judul_jurnal',true);
		$data['nama_jurnal']		= $this->input->post('nama_jurnal',true);
		$data['ISSN']				= $this->input->post('ISSN',true);
		$data['volume']				= $this->input->post('volume',true);
		$data['nomor']				= $this->input->post('nomor',true);
		$data['bulan']				= $this->input->post('bulan',true);
		$data['tahun']				= $this->input->post('tahun',true);
		$data['penerbit']			= $this->input->post('penerbit',true);
		$data['DOI']				= $this->input->post('DOI',true);
		$data['alamat_web_jurnal']	= $this->input->post('alamat_web_jurnal',true);
		$data['alamat_web_artikel']	= $this->input->post('alamat_web_artikel',true);
		$data['terindeks_di']		= $this->input->post('terindeks_di',true);
		$data['file_jurnal']		= $_FILES['file_jurnal']['name'];
		$data['date_created']		= time();


		if($_FILES['file_jurnal']['name'] != ""){
			$config['upload_path']          = 'assets/file';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = '5000';
			$config['remove_space']			= false;
			$config['overwrite']			= true;
			$config['encrypt_name']			= false;
			$config['max_width'] 			= '';
			$config['max_height']			= '';
			
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('file_jurnal'))
			{
				print_r('Ukuran file terlalu besar. Maksimal 5 MB | Periksa Kembali File yang diupload');
				exit();
				}
			else
			{
				$image = $this->upload->data();
		}

	}
		
		$id_jurnal = $this->Jurnal_model->jurnal_save($data);
		redirect('Dosen/tambah_penulis/'.$id_jurnal.'');

	}

	public function download()
	{
		$this->load->helper(array('url','download'));

		$name = $this->uri->segment(3);
		$data = file_get_contents("assets/file/".$name);
		force_download($name, $data);
	}

	public function edit_jurnal($kode = 0)
	{
		$data['getDataJurnal']	= $this->Jurnal_model->jurnal();
		$data_jurnal			= $this->Jurnal_model->getJurnal("where id_jurnal = '$kode'")->result_array();
		
		$data				= array(
			'judul'					=> 'Halaman Edit Jurnal',
			'kode'					=> $data_jurnal[0]['id_jurnal'],
			'id_jurnal'				=> $data_jurnal[0]['id_jurnal'],
			'judul_jurnal'			=> $data_jurnal[0]['judul_jurnal'],	
			'nama_jurnal'			=> $data_jurnal[0]['nama_jurnal'],	
			'ISSN'					=> $data_jurnal[0]['ISSN'],
			'volume'				=> $data_jurnal[0]['volume'],	
			'nomor'					=> $data_jurnal[0]['nomor'],	
			'bulan'					=> $data_jurnal[0]['bulan'],
			'tahun'					=> $data_jurnal[0]['tahun'],
			'penerbit'				=> $data_jurnal[0]['penerbit'],
			'DOI'					=> $data_jurnal[0]['DOI'],
			'alamat_web_jurnal'		=> $data_jurnal[0]['alamat_web_jurnal'],
			'alamat_web_artikel'	=> $data_jurnal[0]['alamat_web_artikel'],
			'terindeks_di'			=> $data_jurnal[0]['terindeks_di'],
			'file_jurnal'			=> $data_jurnal[0]['file_jurnal'],
		);

        $this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/jurnal_edit', $data);
		$this->load->view('templates/footer');	
	}


	public function jurnal_save_edit()
	{
		$kode					= $this->input->post('kode');
		$id_jurnal				= $this->input->post('id_jurnal');
		$judul_jurnal			= $this->input->post('judul_jurnal');
		$nama_jurnal			= $this->input->post('nama_jurnal');
		$ISSN					= $this->input->post('ISSN');
		$volume					= $this->input->post('volume');
		$nomor					= $this->input->post('nomor');
		$bulan					= $this->input->post('bulan');
		$tahun					= $this->input->post('tahun');
		$penerbit				= $this->input->post('penerbit');
		$DOI					= $this->input->post('DOI');
		$alamat_web_jurnal		= $this->input->post('alamat_web_jurnal');
		$alamat_web_artikel		= $this->input->post('alamat_web_artikel');
		$terindeks_di			= $this->input->post('terindeks_di');
		$file_jurnal			= $this->input->post('file_jurnal');


		$this->db->where('id_jurnal',$kode);
			$query	= $this->db->get('jurnal');
			$row	= $query->row();
			
			unlink(".assets/file/$row->file_jurnal");
			if($_FILES['file_jurnal']['name'] != ""){
				$config['upload_path']          = 'assets/file';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = '3000';
				$config['remove_space']			= true;
				$config['overwrite']			= true;
				$config['encrypt_name']			= false;
				$config['max_width'] 			= '';
				$config['max_height']			= '';
				
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('file_jurnal'))
				{
					print_r('Ukuran file terlalu besar. Maksimal 3 MB | Masukkan file dengan tipe data ".pdf"');
					exit();
					}
				else
				{
					$file_jurnal = $this->upload->data();
					if($file_jurnal['file_name'])
					{
					$data['file'] = $file_jurnal['file_name'];
					}
					$file_jurnal = $data['file'];
					}
				}

				$data = array(
					'id_jurnal'				=> $id_jurnal,
					'judul_jurnal'			=> $judul_jurnal,	
					'nama_jurnal'			=> $nama_jurnal,
					'ISSN'					=> $ISSN,
					'volume'				=> $volume,	
					'nomor'					=> $nomor,	
					'bulan'					=> $bulan,
					'tahun'					=> $tahun,
					'penerbit'				=> $penerbit,
					'DOI'					=> $DOI,
					'alamat_web_jurnal'		=> $alamat_web_jurnal,
					'alamat_web_artikel'	=> $alamat_web_artikel,
					'terindeks_di'			=> $terindeks_di,
					'file_jurnal'			=> $file_jurnal
					);

		$this->Jurnal_model->updatedata('jurnal',$data, array('id_jurnal' => $kode));
	  	redirect('Dosen/halaman_jurnal');
	}

	public function halaman_penilaian()
	{
		$data['judul'] 			= 'Halaman Penilaian Jurnal Dosen';
		$data['getNilaiJurnal']  = $this->Jurnal_model->nilaiPenulis($this->session->id_user);
		
		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/halaman_penilaian', $data);
		$this->load->view('templates/footer');
	}

//////////////////////////// pengaturan ////////////////////////////

	public function profil()
	{
		$data['judul'] 		= 'Halaman Profil';
		$data['user'] 		= $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/profil', $data);
		$this->load->view('templates/footer');
	}

	public function edit_profil($kode = 0)
	{
		$data['judul'] 		= 'Halaman Edit Profil';
		$data['user'] 		= $this->User_model->user();
		$data_user			= $this->User_model->getUser("where id_user = '$kode'")->result_array();
		
		$data				= array(
			'judul'					=> 'Halaman Edit Profil',
			'kode'					=> $data_user[0]['id_user'],
			'id_user'				=> $data_user[0]['id_user'],
			'nip'					=> $data_user[0]['nip'],
			'image'					=> $data_user[0]['image'],	
			'name'					=> $data_user[0]['name'],	
			'email'					=> $data_user[0]['email'],	
			'pendidikan_tertinggi'	=> $data_user[0]['pendidikan_tertinggi'],
			'pangkat'				=> $data_user[0]['pangkat'],	
			'gol_ruang'				=> $data_user[0]['gol_ruang'],	
			'jab_fungsional'		=> $data_user[0]['jab_fungsional'],
			'fakultas'				=> $data_user[0]['fakultas'],
			'jurusan'				=> $data_user[0]['jurusan'],
			'unit_kerja'			=> $data_user[0]['unit_kerja'],
		);

        $this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/profil_edit', $data);
		$this->load->view('templates/footer');	
	}


	public function profil_save_edit()
	{
		$kode					= $this->input->post('kode');
		$id_user				= $this->input->post('id_user');
		$nip					= $this->input->post('nip');
		$name					= $this->input->post('name');
		$email					= $this->input->post('email');
		$image					= $this->input->post('image');
		$pendidikan_tertinggi	= $this->input->post('pendidikan_tertinggi');
		$pangkat				= $this->input->post('pangkat');
		$gol_ruang				= $this->input->post('gol_ruang');
		$jab_fungsional			= $this->input->post('jab_fungsional');
		$fakultas				= $this->input->post('fakultas');
		$jurusan				= $this->input->post('jurusan');
		$unit_kerja				= $this->input->post('unit_kerja');

		$this->db->where('id_user',$kode);
			$query	= $this->db->get('user');
			$row	= $query->row();
			
			unlink(".assets/img/profile/$row->image");
			if($_FILES['image']['name'] != ""){
				$config['upload_path']          = 'assets/img/profile';
				$config['allowed_types']        = 'jpeg|jpg|png|pdf|gif';
				$config['max_size']             = '2000';
				$config['remove_space']			= true;
				$config['overwrite']			= true;
				$config['encrypt_name']			= false;
				$config['max_width'] 			= '';
				$config['max_height']			= '';
				
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('image'))
				{
					print_r('Ukuran file terlalu besar. Maksimal 2 MB');
					exit();
					}
				else
				{
					$image = $this->upload->data();
					if($image['file_name'])
					{
					$data['file'] = $image['file_name'];
					}
					$image = $data['file'];
					}
				}

				$data = array(
					'id_user'				=> $id_user,
					'nip'					=> $nip,
					'name'					=> $name,
					'email'					=> $email,
					'image'					=> $image,
					'pendidikan_tertinggi'	=> $pendidikan_tertinggi,
					'pangkat'				=> $pangkat,
					'gol_ruang'				=> $gol_ruang,
					'jab_fungsional'		=> $jab_fungsional,
					'fakultas'				=> $fakultas,
					'jurusan'				=> $jurusan,
					'unit_kerja'			=> $unit_kerja
					);

	  $update_profil = $this->User_model->updatedata('user',$data, array('id_user' => $kode));
	  if($update_profil){
		$this->session->unset_userdata('image');
		$this->session->set_userdata('image',$data['image']);
	  }else{
		  echo 'gagal';
	  }
	  redirect('Dosen/profil');
	}

///////////////////////////////////////////////////////////////////////////////////////////

	// READ
	public function halaman_penulis()
		{
			$data['judul'] 			= 'Halaman Penulis Jurnal';
			$data['penulisJurnal']	= $this->Jurnal_model->get_Penulis($this->session->id_user);

			$this->load->view('dosen/header_dosen', $data);
			$this->load->view('dosen/sidebar_dosen');
			$this->load->view('dosen/halaman_penulis', $data);
			$this->load->view('templates/footer');
		}

	public function tambah_penulis($id_jurnal)
	{
		$data['judul'] 			= 'Halaman Tambah Penulis Jurnal';
		
		$id_jurnal 				= $id_jurnal;
		$data['id_jurnal']		= $id_jurnal;

		$this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/tambah_penulis', $data);
		// $this->load->view('templates/footer');
	}

	public function tambahPenulis()
	{
		// print_r($_POST["name"]);
		$number = count($_POST["name"]);
		if($number > 0)  
 		{  
      		for($i=0; $i<$number; $i++)  
      		{  
           		if(trim($_POST["name"][$i] != ''))  
           		{
					$nip					= $_POST["name"][$i];
					$id_jurnal				= $_POST["id_jurnal"];
					$status					= $_POST["status"][$i];

					// print_r($status);
					
					$this->Jurnal_model->tambahPenulis($nip, $id_jurnal, $status);
           		}  
			}  
			//   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Inserted.</div>');
			// 	redirect('Dosen/halaman_penulis');
			  echo "Y";
			// redirect('/halaman_penulis');
			// echo base_url();

			//   redirect(base_url(	)); 
			// redirect('base_url');
 		}  
 		else  
 		{  
			// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Enter Id User (Author Id)</div>');
			// redirect('base_url');
			  echo "N";  
			// redirect('/halaman_penulis');
			  
 		}  
	}

	public function lihat_penulis($id_jurnal)
	{
		$data_penulis			= $this->Jurnal_model->getPenulisJurnal("where id_jurnal = '$id_jurnal'")->result_array();
		
		$data				= array(
			'judul'					=> 'Halaman Edit Penulis Jurnal',
			'id_jurnal'				=> $data_penulis[0]['id_jurnal'],
			'judul_jurnal'			=> $data_penulis[0]['judul_jurnal'],
			'getDataPenulis'		=> $this->Jurnal_model->penulisJurnal($id_jurnal)
		);

        $this->load->view('dosen/header_dosen', $data);
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/penulis_edit', $data);
		$this->load->view('templates/footer');			
	}

	public function penulis_delete($id_pj)
	{
		$this->Jurnal_model->penulis_delete($id_pj);
		redirect('Dosen/halaman_penulis');
	}

	public function jadi_reviewer()
	{
		$user = $this->session->userdata;
		// print_r($user);exit;
		if($user['role_name'] === 'Dosen' ){
			$this->session->unset_userdata('role_name');
			$this->session->set_userdata('role_name', 'Reviewer');
			redirect('Reviewer');

		}elseif($user['role_name'] === 'Reviewer')
		{
			$this->session->unset_userdata('role_name');
			$this->session->set_userdata('role_name', 'Dosen');
			redirect('Dosen');
		}

	}

	public function cetak($id_jurnal)
  {
    $data = $this->Nilai_model->cetak_detail($id_jurnal);
	// die(var_dump($data->result()));
	// print_r($id_jurnal);exit;
	$r1_ki='';
	$r1_rl='';
	$r1_kc='';
	$r1_ku='';
	$r1_name='';
	$r1_nip='';
	$r2_ki='';
	$r2_rl='';
	$r2_kc='';
	$r2_ku='';
	$r2_name='';
	$r2_nip='';

	foreach ($data->result() as $dt) {
		if($dt->stat_reviewer == 'Reviewer 1')
		{
			$r1_ki = $dt->kelengkapan_isi;
			$r1_rl = $dt->ruanglingkup;
			$r1_kc = $dt->kecukupan;
			$r1_ku = $dt->kelengkapan_unsur;
			$r1_name = $dt->name_reviewer;
			$r1_nip = $dt->nip_reviewer ;
		} 
		if($dt->stat_reviewer == 'Reviewer 2')
		{
			$r2_ki = $dt->kelengkapan_isi;
			$r2_rl = $dt->ruanglingkup;
			$r2_kc = $dt->kecukupan;
			$r2_ku = $dt->kelengkapan_unsur;
			$r2_name = $dt->name_reviewer;
			$r2_nip = $dt->nip_reviewer;
		} 
	}		
		

    switch (date("m")) {
      case '01':
        $m = "Januari";
        break;
      case '02':
        $m = "Februari";
        break;
      case '03':
        $m = "Maret";
        break;
      case '04':
        $m = "April";
        break;
      case '05':
        $m = "Mei";
        break;
      case '06':
        $m = "Juni";
        break;
      case '07':
        $m = "Juli";
        break;
      case '08':
        $m = "Agustus";
        break;
      case '09':
        $m = "Spetember";
        break;
      case '10':
        $m = "Oktober";
        break;
      case '11':
        $m = "November";
        break;
      case '12':
        $m = "Desember";
        break;
    }

    foreach ($data->result() as $c) {


		// var_dump($c);
		
      $this->load->library('CFPDF');
      $pdf = new FPDF('P', 'mm', 'A4');

      $pdf->AddPage();
      $pdf->AliasNbPages();
      $pdf->SetMargins(26, 10, 26);
      // $pdf->SetAutoPageBreak(true, 10);

      // head
      $pdf->Cell(0, 2, '', 0, 1, 'C');
      $pdf->SetFont('TIMES', 'B', 10);
      $pdf->Cell(0, 5, 'LEMBAR', 0, 1, 'C');
      $pdf->Cell(0, 5, 'HASIL PENILAIAN SEJAWAT SEBIDANG ATAU PEER REVIEW', 0, 1, 'C');
      $pdf->Cell(0, 5, 'KARYA ILMIAH  : JURNAL ILMIAH', 0, 1, 'C');


      $pdf->Cell(0, 7, '', 0, 1, 'C');
      $pdf->Cell(0, 7, '', 0, 1, 'C');

      $pdf->SetFont('TIMES', '', 10);

      $pdf->SetMargins(26, 10, 125);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->cell(0, 7, '1. Judul Jurnal Ilmiah (Artikel) ', 0, 0, 'L');
      $pdf->cell(0, 7, ':', 0, 0, 'C');
      $pdf->SetMargins(102, 10, 15);
      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, '', 0, 'L');
      $pdf->SetMargins(86, 20, 15);
      $pdf->Cell(-103, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "$c->judul_jurnal", 0, 'J', 0);
	  
	  $pdf->SetMargins(26, 10, 125);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->cell(0, 7, '2. Nama Penulis ', 0, 0, 'L');
      $pdf->cell(0, 7, ':', 0, 0, 'C');
      $pdf->SetMargins(102, 10, 15);
      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, '', 0, 'L');
      $pdf->SetMargins(86, 20, 15);
      $pdf->Cell(-103, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "$c->name", 0, 'J', 0);

      $pdf->SetMargins(26, 10, 125);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->cell(0, 7, '3. Jumlah Penulis ', 0, 0, 'L');
      $pdf->cell(0, 7, ':', 0, 0, 'C');
      $pdf->SetMargins(102, 10, 15);
      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, '', 0, 'L');
      $pdf->SetMargins(86, 20, 15);
      $pdf->Cell(-103, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "$c->Jumlah", 0, 'J', 0);

	  $pdf->SetMargins(26, 10, 125);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->cell(0, 7, '4. Status Pengusul ', 0, 0, 'L');
      $pdf->cell(0, 7, ':', 0, 0, 'C');
      $pdf->SetMargins(102, 10, 15);
      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, '', 0, 'L');
      $pdf->SetMargins(86, 20, 15);
      $pdf->Cell(-103, 0, '', 0, 'L');
	  $pdf->MultiCell(0, 6, "$c->status", 0, 'J', 0);

      $pdf->Cell(0, 0, '', 0, 1, 'L');
	  
	  $pdf->SetMargins(26, 10, 125);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->cell(0, 7, '5. Identitas Jurnal Ilmiah ', 0, 0, 'L');
	  $pdf->cell(0, 7, ':', 0, 0, 'C');
	  
	//   $pdf->SetMargins(26, 10, 125);
    //   $pdf->Cell(0, 0, '', 0, 0, 'L');
    //   $pdf->cell(0, 7, '4. Identitas Jurnal Ilmiah', 0, 0, 'L');
    //   $pdf->cell(0, 7, ':', 0, 0, 'C');
    //   $pdf->SetMargins(102, 10, 15);

      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, 'a. ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "Nama Jurnal: $c->nama_jurnal", 0, 'J', 0);

      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, 'b. ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "Nomor ISSN: $c->ISSN", 0, 'J', 0);

      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, 'c. ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "Volume, nomor, bulan tahun: $c->volume, $c->nomor, $c->bulan, $c->tahun", 0, 'J', 0);

      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, 'd. ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "Penerbit: $c->penerbit", 0, 'J', 0);

      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, 'e. ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "DOI artikel (jika ada): $c->DOI", 0, 'J', 0);

      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, 'f. ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "Alamat web jurnal :", 0, 'J', 0);

      $pdf->SetMargins(26, 27.5, 27.5);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->MultiCell(0, 6, "JURNAL: $c->alamat_web_jurnal", 0, 'J', 0);
      $pdf->SetMargins(26, 27.5, 27.5);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->MultiCell(0, 6, "ARTIKEL: $c->alamat_web_artikel", 0, 'J', 0);

      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, 'g. ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "Terindeks di $c->terindeks_di", 0, 'J', 0);

      $pdf->SetMargins(26, 10, 125);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->cell(0, 7, 'Kategori Publikasi Jurnal Ilmiah', 0, 0, 'L');
      $pdf->cell(0, 7, ':', 0, 0, 'C');
      $pdf->SetMargins(102, 10, 15);
      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, '[ ] ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "Jurnal Ilmiah Internasional /internasional bereputasi ", 0, 'J', 0);

      $pdf->SetMargins(26, 10, 125);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->cell(0, 7, '(beri v pada kategori yang tepat)', 0, 0, 'L');
      $pdf->cell(0, 7, ':', 0, 0, 'C');
      $pdf->SetMargins(102, 10, 15);
      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, '[ ] ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "Jurnal Ilmiah Nasional Terakreditasi", 0, 'J', 0);

      $pdf->SetMargins(26, 10, 125);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->cell(0, 7, '', 0, 0, 'L');
      $pdf->cell(0, 7, ':', 0, 0, 'C');
      $pdf->SetMargins(102, 10, 15);
      $pdf->SetMargins(86, 30, 20);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->Cell(0, 6, '[ ] ', 0, 'L');
      $pdf->SetMargins(89, 20, 15);
      $pdf->Cell(-100, 0, '', 0, 'L');
      $pdf->MultiCell(0, 6, "Jurnal Ilmiah Nasional /Nasional di DOAJ,CABI, COPERNICUS", 0, 'J', 0);

      $pdf->SetMargins(26, 27.5, 27.5);
      $pdf->MultiCell(0, 0, '', 0, 'J', 0);
      $pdf->MultiCell(0, 6, '', 0, 'J', 0);
      $pdf->MultiCell(0, 6, "Hasil Penilaian Peer Review :", 0, 'J', 0);

	  $pdf->Cell(75, 20, 'Komponen Yang Dinilai', 1, 0, 'C');
      $pdf->Cell(87, 10, 'Nilai Reviewer', 1, 3, 'C');
      $pdf->Cell(29, 10, 'Reviewer I', 1, 0, 'C');
      $pdf->Cell(29, 10, 'Reviewer II', 1, 0, 'C');
      $pdf->Cell(29, 10, 'Nilai Rata-rata', 1, 1, 'C');
      $pdf->Cell(75, 7, 'a. Kelengkapan unsur isi artikel (10%)', 1, 0);
      $pdf->Cell(29, 7, "$r1_ki", 1, 0, 'C');
      $pdf->Cell(29, 7, "$r2_ki", 1, 0, 'C');
      $pdf->Cell(29, 7, ("$r1_ki"+"$r2_ki")/'2', 1, 1, 'C');
      $pdf->Cell(75, 7, 'b. Ruanglingkup dan kedalaman pembahasan (30%)', 1, 0);
      $pdf->Cell(29, 7, "$r1_rl", 1, 0, 'C');
      $pdf->Cell(29, 7, "$r2_rl", 1, 0, 'C');
      $pdf->Cell(29, 7, ("$r1_rl"+"$r2_rl")/'2', 1, 1, 'C');
      // $ln = $pdf->Ln();
      $pdf->Cell(75, 7, "c. Kecukupan informasi dan metodologi (30%)", 1, 0, 'J');
      $pdf->Cell(29, 7, "$r1_kc", 1, 0, 'C');
      $pdf->Cell(29, 7, "$r2_kc", 1, 0, 'C');
      $pdf->Cell(29, 7, ("$r1_kc"+"$r2_kc")/'2', 1, 1, 'C');
      $pdf->Cell(75, 7, 'd. Kelengkapan unsur dan kualitas jurnal (30%)', 1, 0);
      $pdf->Cell(29, 7, "$r1_ku", 1, 0, 'C');
      $pdf->Cell(29, 7, "$r2_ku", 1, 0, 'C');
      $pdf->Cell(29, 7, ("$r1_ku"+"$r2_ku")/'2', 1, 1, 'C');
      $pdf->Cell(75, 7, 'Total = (100%) ', 1, 0);
      $pdf->Cell(29, 7, "$r1_ki"+"$r1_rl"+"$r1_kc"+"$r1_ku", 1, 0, 'C');
      $pdf->Cell(29, 7, "$r2_ki"+"$r2_rl"+"$r2_kc"+"$r2_ku", 1, 0, 'C');
      $pdf->Cell(29, 7, number_format ($c->total, 2, '.', ''), 1, 1, 'C');
      $pdf->Cell(75, 7, 'Nilai Kum Penulis pertama (60%) ', 1, 0);
      $pdf->Cell(87, 7, "$c->kredit_penulis", 1, 1, 'C');
	  $pdf->SetFont('Arial', '', 12);
	
      // $nb = $pdf->WordWrap($text, 120);

      // $pdf->SetMargins(26, 10, 125);
      // $pdf->cell(0, 7, '5. No.Telp./HP ', 0, 0, 'L');
      // $pdf->cell(0, 7, ':', 0, 0, 'C');
      // $pdf->cell(0, 7, " variabel ", 0, 1, 'L');

      $pdf->cell(0, 7, '', 0, 1, 'C');

      $pdf->cell(0, 5, '', 0, 1, 'L');
      $pdf->SetMargins(145, 10, 26);
    //   $pdf->cell(0, 5, '', 0, 1, 'L');
    //   $pdf->cell(0, 5, '', 0, 1, 'L');
    //   $pdf->cell(0, 5, '', 0, 1, 'L');

      $pdf->cell(0, 0, '', 0, 1, 'L');
      $pdf->SetFont('TIMES', '', 10);
      $pdf->cell(0, 10, "Semarang " . date('d') . " $m " . date('Y'), 0, 1, 'L');
	  // $pdf->cell(0, 5, "Pada tanggal : ".date('d') ." $m " .date('Y'), 0, 1, 'L');
      $pdf->SetMargins(26, 10, 26);
      $pdf->cell(0, 0, '', 0, 1, 'L');
	  $pdf->cell(0, 0, '               Reviewer 1', 0, 0, 'L');
	  $pdf->cell(-10, 0, '               Reviewer 2', 0, 1, 'R');
      $pdf->cell(0, 5, '', 0, 1, 'L');
      $pdf->cell(0, 5, '', 0, 1, 'L');
      $pdf->cell(0, 5, '', 0, 1, 'L');
      $pdf->cell(0, 5, '', 0, 0, 'L');

	  $pdf->SetMargins(0, 0, 110);
      $pdf->cell(0, 0, '', 0, 1, 'C');
	  $pdf->cell(0, 0, "$r1_name", 0, 0, 'C');

	//   $pdf->cell(15, 0, "variabel", 0, 0, 'C');
	$pdf->SetMargins(22, 10, 25);
      $pdf->cell(0, 0, '', 0, 1, 'L');	  
	  $pdf->cell(0, 0, "$r2_name",  0, 1, 'R');
	  
	  $pdf->SetMargins(22, 10, 24);
      $pdf->cell(0, 5, '', 0, 1, 'L');
	  $pdf->cell(0, 0, '               NIP.'."$r1_nip", 0, 0, 'L');

	  $pdf->SetMargins(22, 10, 28);
      $pdf->cell(0, 0, '', 0, 1, 'L');	  
	  $pdf->cell(0, 0, '               NIP.'."$r2_nip", 0, 1, 'R');
	  
    //   $pdf->cell(54, 6, "variabel", 0, 1, 'C');
      // $pdf->cell(0, 45, "($c->nama_pemohon)", 0, 0, 'L');
	  // $pdf->cell(0, 45, ')', 0, 1, 'C');
	  


      $pdf->Output();
    }
  }
	
}