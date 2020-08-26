<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function user_save ($data){
			$this->db->insert('user', $data);
	}

	public function user()
	{
        $query = $this->db->get('user');
        return $query->result(); 
	}

	public function getUser($where = ''){
		return $this->db->query("select * from user $where; ");
	}

	public function getUserById($id_user)
	{
		return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
	}

	function getOperator()
	{
		$this->db->where('role_name', 'Operator');
        $query = $this->db->get('user');
        return $query->result(); 
	}

	function getReviewer()
	{
		$this->db->where('role_name', 'Reviewer');
        $query = $this->db->get('user');
        return $query->result(); 
	}
	
	// function getDosen()
	// {
	// 	$this->db->where('role_name', 'Dosen');
    //     $query = $this->db->get('user');
    //     return $query->result(); 
	// }

	public function getDosen()
	{
        $this->db->where('role_name', 'Dosen');
        $query = $this->db->get('user');
        return $query->result(); 
        
    }

	
	public function updatedata($tabel, $data, $where)
	{
		return $this->db->update($tabel, $data, $where);	
	}

	public function user_delete_info($id_user)
	{
		$this->db->where('id_user',$id_user);
		$this->db->delete('user');
	}

	public function search($keyword)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->like('id_user',$keyword);
		$this->db->or_like('nip',$keyword);
		$this->db->or_like('name',$keyword);
		$this->db->or_like('email',$keyword);
		$this->db->or_like('role_name',$keyword);
		$this->db->or_like('is_active',$keyword);
		return $this->db->get()->result();
	}


}


