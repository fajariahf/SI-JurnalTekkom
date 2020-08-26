<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviewer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$role_name = $this->session->userdata('role_name');
		$email = $this->session->userdata('email');
		if ($role_name == 'Reviewer')
		{
			'<?php echo base_url();?>Reviewer/';
		} else if ($role_name !== 'Reviewer' && $email == NULL){			
				redirect('Auth');
		} 
		   else {
			redirect('Auth');
		}
	}

    public function index()
	{
		$data['judul'] 		= 'Dashboard Reviewer';
		$data['getView'] 	= $this->Jurnal_model->joinJurnalDashboard();

		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/dashboard_reviewer', $data);
		$this->load->view('templates/footer');
	}
	
	public function nilai_delete($id_nilai)
	{
		$this->Nilai_model->nilai_delete($id_nilai);
		redirect('Reviewer/halaman_penilaian');
	}
	
	public function search_index()
	{
		$data['judul'] 		= 'Halaman Jurnal';
		$keyword 			= $this->input->post('keyword');
		$data['getView'] 	= $this->Nilai_model->search_index($keyword);

		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/dashboard_reviewer', $data);
		$this->load->view('templates/footer');
	}

	public function search_jurnal()
	{
		$data['judul'] 		= 'Halaman Jurnal';
		$keyword 			= $this->input->post('keyword');
		$data['getData'] 	= $this->Nilai_model->search_jurnal($keyword);

		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/halaman_jurnal', $data);
		$this->load->view('templates/footer');
	}
	///////////////////////////// data user ///////////////////////////////////

	public function operator()
	{
		$data['judul'] 		= 'Halaman Data Operator';
		$data['getuser'] 	= $this->User_model->getOperator();

		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/halaman_operator', $data);
		$this->load->view('templates/footer');
	}

	public function data_reviewer()
	{
		$data['judul'] 		= 'Halaman Data Reviewer';
		$data['getuser'] 	= $this->User_model->getReviewer();

		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/halaman_reviewer', $data);
		$this->load->view('templates/footer');
	}
	
	public function dosen()
	{
		$data['judul'] 		= 'Halaman Data Dosen';
		$data['getuser'] 	= $this->User_model->getDosen();

		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/halaman_reviewer', $data);
		$this->load->view('templates/footer');
	}

/////////////////////// menu ///////////////////////////////////
	public function halaman_jurnal()
	{
		$data['judul'] 			= 'Halaman Jurnal Dosen';
		$data['getData']		= $this->Jurnal_model->joinJurnal();

		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/halaman_jurnal', $data);
		$this->load->view('templates/footer');
	}

	public function give_nilai_R1($jurnalId)
	{
		$data['judul'] 			= 'Halaman Jurnal Dosen';
		$data['id_jurnal'] 		= $jurnalId;

		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/form_penilaian_r1', $data);
		$this->load->view('templates/footer');
	
	}

	public function give_nilai_R2($jurnalId)
	{
		$data['judul'] 			= 'Halaman Jurnal Dosen';
		$data['id_jurnal'] 		= $jurnalId;

		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/form_penilaian_r2', $data);
		$this->load->view('templates/footer');
	
	}

	public function nilai_save()
	{
		$data['id_nilai']				= $this->input->post('id_nilai',true);
		$data['id_jurnal']				= $this->input->post('id_jurnal',true);
		$data['id_reviewer']			= $this->input->post('id_reviewer',true);
		$data['name_reviewer']			= $this->input->post('name_reviewer',true);
		$data['nip_reviewer']			= $this->input->post('nip_reviewer',true);
		$data['stat_reviewer']			= $this->input->post('stat_reviewer',true);
		$data['kelengkapan_isi']		= $this->input->post('kelengkapan_isi',true);
		$data['ruanglingkup']			= $this->input->post('ruanglingkup',true);
		$data['kecukupan']				= $this->input->post('kecukupan',true);
		$data['kelengkapan_unsur']		= $this->input->post('kelengkapan_unsur',true);
		// $data['keterangan']				= "Sudah dinilai";
		$data['date_created']			= time();

		$this->Nilai_model->nilai_save($data);
		redirect('Reviewer/halaman_jurnal');
	}

	public function kirimNilai($id_jurnal)
	{

		$data['getData']	= $this->Jurnal_model->ambilNilai($id_jurnal);
		$jumlahPenulisnya = count($data['getData']);
			// print_r ($data['getData']);
			foreach ($data['getData'] as $getData1) {
				# code...
				$id_jurnal		= $id_jurnal;
				$nip			= $getData1->nip;
				$total			= $getData1->total;
				$id_pj			= $getData1->id_pj;

				if ($jumlahPenulisnya > 1) {
					# code...
					if ($getData1->status == "Penulis Pertama") {
					// 	# code...
						$total = $total*60/100;
					}else {
					// 	# code...
						
						$total = $total*40/100/($jumlahPenulisnya-1);
					}
				} elseif ($jumlahPenulisnya == 1) {
					# code...
					$total = $total;
				} else{
					echo('Tidak Ada Penulis pada Jurnal Tersebut');
					redirect('Reviewer/halaman_jurnal');
				}
				

				$this->Jurnal_model->kirimNilai($id_jurnal, $nip, $total, $id_pj);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai Berhasil Dikirim!</div>');
			redirect('Reviewer/halaman_jurnal');

	}
	
	public function halaman_penilaian()
	{
		$data['judul'] 			= 'Halaman Penilaian Jurnal Dosen';
		$data['getNilaiJurnal']	= $this->Nilai_model->getNilaiJurnal($this->session->id_user);
		$data['sum']			= $this->Nilai_model->get_total();
		// $data['ambilJumlahJurnal'] = $this->Nilai_model->ambilJumlahJurnal();
		
		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/halaman_penilaian', $data);
		$this->load->view('templates/footer');
	}

	public function download()
	{
		$this->load->helper(array('url','download'));

		$name = $this->uri->segment(3);
		$data = file_get_contents("assets/file/".$name);
		force_download($name, $data);
	}

	public function editNilai($kode = 0)
	{
		$data['getDataNilai']	= $this->Nilai_model->getAllNilai();
		$data_nilai				= $this->Nilai_model->getNilai("where id_nilai = '$kode'")->result_array();
		
		$data				= array(
			'judul'					=> 'Halaman Edit Nilai Jurnal',
			'kode'					=> $data_nilai[0]['id_nilai'],
			'id_nilai'				=> $data_nilai[0]['id_nilai'],
			'judul_jurnal'			=> $data_nilai[0]['judul_jurnal'],	
			'kelengkapan_isi'		=> $data_nilai[0]['kelengkapan_isi'],	
			'ruanglingkup'			=> $data_nilai[0]['ruanglingkup'],
			'kecukupan'				=> $data_nilai[0]['kecukupan'],	
			'kelengkapan_unsur'		=> $data_nilai[0]['kelengkapan_unsur'],
		);

        $this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/nilai_edit', $data);
		$this->load->view('templates/footer');	
	}

	public function nilaiSaveEdit()
	{
		$kode					= $this->input->post('kode');
		$id_nilai				= $this->input->post('id_nilai');
		// $judul_jurnal			= $this->input->post('judul_jurnal');
		$kelengkapan_isi		= $this->input->post('kelengkapan_isi');
		$ruanglingkup			= $this->input->post('ruanglingkup');
		$kecukupan				= $this->input->post('kecukupan');
		$kelengkapan_unsur		= $this->input->post('kelengkapan_unsur');

				$data = array(
					'id_nilai'				=> $id_nilai,
					// 'judul_jurnal'			=> $judul_jurnal,	
					'kelengkapan_isi'		=> $kelengkapan_isi,
					'ruanglingkup'			=> $ruanglingkup,
					'kecukupan'				=> $kecukupan,	
					'kelengkapan_unsur'		=> $kelengkapan_unsur
					);

		$this->Nilai_model->updateData('nilai_jurnal',$data, array('id_nilai' => $kode));
	  	redirect('Reviewer/halaman_penilaian');
	}

	//////////////////////////// pengaturan ////////////////////////////

	public function profil()
	{
		$data['judul'] 		= 'Halaman Profil';
		$data['user'] 		= $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/profil', $data);
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

        $this->load->view('reviewer/header_reviewer', $data);
		$this->load->view('reviewer/sidebar_reviewer');
		$this->load->view('reviewer/profil_edit', $data);
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
	  redirect('Reviewer/profil');
	}

	public function jadi_dosen()
	{
		$user = $this->session->userdata;
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

	public function getScimago()
	{
		redirect('https://www.scimagojr.com/');
	}


}