<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		$role_name = $this->session->userdata('role_name');
		$email = $this->session->userdata('email');
		if ($role_name == 'Admin')
		{
			'<?php echo base_url();?>Admin/';
		} else if ($role_name !== 'Admin' && $email == NULL){			
				redirect('Auth');
		} 
		   else {
			redirect('Auth');
		}
	}

    public function index()
	{
		$data['judul'] 		= 'Dashboard Admin';
		$data['getuser'] 	= $this->User_model->user();

		$this->load->view('admin/header_admin', $data);
		$this->load->view('admin/sidebar_admin');
		$this->load->view('admin/dashboard_admin', $data);
		$this->load->view('templates/footer');
	}
////////////////////////////// USER //////////////////////////////////////////
	public function user_save()
	{
		$data['nip']			= $this->input->post('nip',true);
		$data['image']			= $this->input->post('image',true);
		$data['name']			= $this->input->post('name',true);	
		$data['email']			= $this->input->post('email',true);
		$data['password']		= password_hash($this->input->post('password',true), PASSWORD_DEFAULT);
		$data['role_name']		= $this->input->post('role_name',true);
		$data['is_active']		= $this->input->post('is_active',true);
		$data['date_created']	= time();
		
		$this->User_model->user_save($data);
		redirect('Admin/index');
	}

	public function user_edit($kode = 0)
	{
		$data['judul'] 		= 'Halaman Edit Data User';
		$data['user'] 		= $this->User_model->user();
		$data_user			= $this->User_model->getUser("where id_user = '$kode'")->result_array();
		
		$data				= array(
			'judul'					=> 'Halaman Edit Data User',
			'kode'					=> $data_user[0]['id_user'],
			'id_user'				=> $data_user[0]['id_user'],
			'nip'					=> $data_user[0]['nip'],
			'image'					=> $data_user[0]['image'],	
			'name'					=> $data_user[0]['name'],	
			'email'					=> $data_user[0]['email'],	
			'password'				=> $data_user[0]['password'],	
			'role_name'				=> $data_user[0]['role_name'],
			'is_active'				=> $data_user[0]['is_active'],
			'date_created' 			=> time(),	
		);

        $this->load->view('admin/header_admin', $data);
		$this->load->view('admin/sidebar_admin');
		$this->load->view('admin/user_edit', $data);
		$this->load->view('templates/footer');	
	}

	public function user_save_edit()
	{
			$kode					= $this->input->post('kode');
			$id_user				= $this->input->post('id_user');
			$nip					= $this->input->post('nip');
			$image					= $this->input->post('image');
			$name					= $this->input->post('name');
			$email					= $this->input->post('email');
			$role_name				= $this->input->post('role_name');
			$is_active				= $this->input->post('is_active');
			$date_created			= time();

			$data = array(
				'id_user'			=> $id_user,
				'nip'				=> $nip,
				'image'				=> $image,
				'name'				=> $name,
				'email'				=> $email,
				'role_name'			=> $role_name,
				'is_active'			=> $is_active,
				'date_created' 		=> time(),
			);
	$this->User_model->updatedata('user', $data, array('id_user' => $kode));
				redirect('Admin/index');
	}

	public function user_delete($id_user)
	{
		$this->User_model->user_delete_info($id_user);
		redirect('Admin/index');
	}

	public function search()
	{
		$data['judul'] 		= 'Dashboard Admin';
		$keyword 			= $this->input->post('keyword');
		$data['getuser'] 	= $this->User_model->search($keyword);

		$this->load->view('admin/header_admin', $data);
		$this->load->view('admin/sidebar_admin');
		$this->load->view('admin/dashboard_admin', $data);
		$this->load->view('templates/footer');
	}

////////////////////////////// OPERATOR //////////////////////////////////////////
	public function operator()
	{
		$data['judul'] 		= 'Halaman Data Operator';
		$data['getuser'] 	= $this->User_model->getOperator();

        $this->load->view('admin/header_admin', $data);
		$this->load->view('admin/sidebar_admin');
		$this->load->view('admin/operator', $data);
		$this->load->view('templates/footer');
	}

	public function operator_save()
	{
		$data['nip']			= $this->input->post('nip',true);
		$data['image']			= $this->input->post('image',true);
		$data['name']			= $this->input->post('name',true);	
		$data['email']			= $this->input->post('email',true);
		$data['password']		= password_hash($this->input->post('password',true), PASSWORD_DEFAULT);
		$data['role_name']		= $this->input->post('role_name',true);
		$data['is_active']		= $this->input->post('is_active',true);
		$data['date_created']	= time();
		
		$this->User_model->user_save($data);
		redirect('Admin/operator');
	}

	
////////////////////////////// reviewer //////////////////////////////////////////
	public function reviewer()
	{
		$data['judul'] 		= 'Halaman Data Reviewer';
		$data['getuser'] 	= $this->User_model->getReviewer();

        $this->load->view('admin/header_admin', $data);
		$this->load->view('admin/sidebar_admin');
		$this->load->view('admin/reviewer', $data);
		$this->load->view('templates/footer');
	}

	public function reviewer_save()
	{
		$data['nip']			= $this->input->post('nip',true);
		$data['image']			= $this->input->post('image',true);
		$data['name']			= $this->input->post('name',true);	
		$data['email']			= $this->input->post('email',true);
		$data['password']		= password_hash($this->input->post('password',true), PASSWORD_DEFAULT);
		$data['role_name']		= $this->input->post('role_name',true);
		$data['is_active']		= $this->input->post('is_active',true);
		$data['date_created']	= time();
		
		$this->User_model->user_save($data);
		redirect('Admin/reviewer');
	}

	
////////////////////////////// DOSEN //////////////////////////////////////////
	public function dosen()
	{
		$data['judul'] 		= 'Halaman Data Dosen';
		$data['getuser'] 	= $this->User_model->getDosen();

        $this->load->view('admin/header_admin', $data);
		$this->load->view('admin/sidebar_admin');
		$this->load->view('admin/dosen', $data);
		$this->load->view('templates/footer');
	}

	public function dosen_save()
	{
		$data['nip']			= $this->input->post('nip',true);
		$data['image']			= $this->input->post('image',true);
		$data['name']			= $this->input->post('name',true);	
		$data['email']			= $this->input->post('email',true);
		$data['password']		= password_hash($this->input->post('password',true), PASSWORD_DEFAULT);
		$data['role_name']		= $this->input->post('role_name',true);
		$data['is_active']		= $this->input->post('is_active',true);
		$data['date_created']	= time();
		
		$this->User_model->user_save($data);
		redirect('Admin/dosen');
	}

////////////////////////////// Profil ///////////////////////////////////////

	public function profil()
	{
		$data['judul'] 		= 'Halaman Profil';
		$data['user'] 		= $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('admin/header_admin', $data);
		$this->load->view('admin/sidebar_admin');
		$this->load->view('admin/profil', $data);
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
			// 'pendidikan_tertinggi'	=> $data_user[0]['pendidikan_tertinggi'],
			// 'pangkat'				=> $data_user[0]['pangkat'],	
			// 'gol_ruang'				=> $data_user[0]['gol_ruang'],	
			// 'jab_fungsional'		=> $data_user[0]['jab_fungsional'],
			// 'fakultas'				=> $data_user[0]['fakultas'],
			// 'jurusan'				=> $data_user[0]['jurusan'],
			// 'unit_kerja'			=> $data_user[0]['unit_kerja'],
		);

        $this->load->view('admin/header_admin', $data);
		$this->load->view('admin/sidebar_admin');
		$this->load->view('admin/profil_edit', $data);
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
		// $pendidikan_tertinggi	= $this->input->post('pendidikan_tertinggi');
		// $pangkat				= $this->input->post('pangkat');
		// $gol_ruang				= $this->input->post('gol_ruang');
		// $jab_fungsional			= $this->input->post('jab_fungsional');
		// $fakultas				= $this->input->post('fakultas');
		// $jurusan				= $this->input->post('jurusan');
		// $unit_kerja				= $this->input->post('unit_kerja');

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
					// 'pendidikan_tertinggi'	=> $pendidikan_tertinggi,
					// 'pangkat'				=> $pangkat,
					// 'gol_ruang'				=> $gol_ruang,
					// 'jab_fungsional'		=> $jab_fungsional,
					// 'fakultas'				=> $fakultas,
					// 'jurusan'				=> $jurusan,
					// 'unit_kerja'			=> $unit_kerja
					);

	$update_profil = $this->User_model->updatedata('user',$data, array('id_user' => $kode));
	if($update_profil){
		$this->session->unset_userdata('image');
		$this->session->set_userdata('image',$data['image']);
	}else{
		echo 'gagal';
	}
	  redirect('Admin/profil');
	}
}