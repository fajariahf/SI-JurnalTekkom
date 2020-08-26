<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
    }
    
    public function index()
    {
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == False) {
            $data['judul'] 		= 'User Login';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
    } else {
            // validasi sukses
			$this->_login();
        }
    }
        
        private function _login()
	{
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');
		$nip 		= $this->input->post('nip');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
        $userDosen =  $this->db->get_where('user', ['nip' => $nip])->row_array();
        //jika usernya ada
		if($user) {

            //jika usernya aktif
			if($user['is_active'] == 1) {
				if(password_verify($password, $user['password'])) {
					$data = [
                        'id_user'	=> $user['id_user'],
                        'nip'   	=> $user['nip'],
                        'name'	    => $user['name'],
						'email'     => $user['email'],
                        'image'	    => $user['image'],
						'role_name'	=> $user['role_name'],
					];
					$this->session->set_userdata($data);
					if ($user['role_name'] == 'Admin') {
						redirect('Admin');
					}
					else if ($user['role_name'] == 'Operator') {
						redirect('Operator');
                    }
                    else if ($user['role_name'] == 'Reviewer') {
						redirect('Reviewer');
					}
					else if ($user['role_name'] == 'Dosen') {
						// print_r($this->session);exit;rt
						redirect('Dosen');
					}
                } else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('Auth');	
                }	

            } else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
				redirect('Auth');		
			}
        }
        
		else
		{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('Auth');
		}
	}

    public function registration()
	{
		
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('role_name', 'Role Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]',[
			'matches' 		=> 'Password do not match!',
			'min_length' 	=> 'Password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');

		if($this->form_validation->run() == False)
		{
			$data['judul']	= 'User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
             
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'nip' 			=> $this->input->post('nip', true),
				'name' 			=> htmlspecialchars($this->input->post('name', true)),
				'email' 		=> htmlspecialchars($email),
				'image' 		=> 'default.png',
                'password' 		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_name'		=> $this->input->post('role_name', true),
                'is_active' 	=> 0,
                'date_created'  => time()

			];

			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];
			
			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);
			$this->_sendEmail($token,'verify');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please activate your account</div>');
			redirect('Auth');
		}
    }
	
	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host'=> 'ssl://smtp.gmail.com',
			'smtp_user'=> 'pkknundip@gmail.com',
			'smtp_pass'=> 'cevpqyyduntyrknz',
			'smtp_port'=> 465,
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'newline'  => "\r\n"
		];
		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('pkknundip@gmail.com', 'Admin');
		$this->email->to($this->input->post('email'));

		if($type == 'verify'){
			$this->email->subject('Account verification');
			$this->email->message('Click this link to verify you account : <a href="'.base_url().'auth/verify?email='. $this->input->post('email').'&token='.urlencode($token).'">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="'.base_url().'auth/resetpassword?email='. $this->input->post('email').'&token='.urlencode($token).'">Reset Password</a>');
		}

		if($this->email->send())
		{
			return true;
		}
		else
		{
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user',['email'=>$email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token',['token' => $token])->row_array();
			
			if($user_token){
				if(time() - $user_token['date_created'] < (60*60*24)){
					$this->db->set('is_active', 1);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'.$email.' has been activated! Please login.</div>');
					redirect('Auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
			redirect('auth');
		}
	}

    public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_name');
 
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You has been logout.</div>');

		redirect('Auth');
	}

	public function forgotpassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if($this->form_validation->run() == false){
			$data['judul']	= 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot_password');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email'=> $email, 'is_active'=>1])->row_array();

			if($user){
				$token 		= base64_encode(random_bytes(32));
				$user_token	= [
					'email' 	   	=> $email,
					'token' 		=> $token,
					'date_created' 	=> time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password.</div>');
				redirect('Auth/forgotpassword');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated.</div>');
				redirect('Auth/forgotpassword');
			}
		}
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email'=>$email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token', ['token'=>$token])->row_array();

			if($user_token){
				$this->session->set_userdata('reset_email', $email);
				$this->changepassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
			redirect('Auth');
		}
	}

	public function changepassword()
	{
		if(!$this->session->userdata('reset_email')){
			redirect('Auth');
		}
		$this->form_validation->set_rules('password1','Password','trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2','Repeat Password','trim|required|min_length[3]|matches[password1]');
		if($this->form_validation->run() == false){
			$data['judul']	= 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change_password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
			redirect('Auth');
		}
	}
}