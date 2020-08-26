<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_model extends CI_Model {

	public function jurnal()
	{
        $query = $this->db->get('jurnal');
        return $query->result(); 
    }

    public function penulisJurnal($id_jurnal)
	{
        $this->db->where('id_jurnal', $id_jurnal);
        $query = $this->db->get('view_penulisjurnal');
        return $query->result(); 
    }

    public function getPenulisJurnal($where = ''){
		return $this->db->query("SELECT * FROM view_penulisjurnal $where; ");
    }

    public function joinJurnal()
	{
        $query = $this->db->get('view_jrj');
        return $query->result();  
    }

    
    public function joinJurnalDashboard()
	{
        $query = $this->db->get('view_jumlahreviewer');
        return $query->result();  
    }


    public function nilaiPenulis($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('view_nilaipenulis');
        return $query->result();
    }
    
    // public function angkaTotal($total)
    // {
    //     $angka = $total;
	// 	$angka_format = number_format($angka,2);
    //     return $query->result(); 
    // }

    public function ambilNilai($id_jurnal)
	{
        $this->db->SELECT('penulis_jurnal.id_pj, penulis_jurnal.id_jurnal, penulis_jurnal.nip, penulis_jurnal.status, 
                            view_jumlahpenulis.jumlah, view_jumlahpenulis.total');
		$this->db->from('penulis_jurnal');
        $this->db->join('view_jumlahpenulis', 'penulis_jurnal.id_jurnal =view_jumlahpenulis.id_jurnal ', 'right');
        $this->db->where('penulis_jurnal.id_jurnal', $id_jurnal);
		$query = $this->db->get();
		return $query->result();
        
    }

    public function kirimNilai($id_jurnal, $nip, $total, $id_pj)
	{
        $data = array(
            'kredit_penulis' => $total
        );
    
        $this->db->where('id_pj', $id_pj);
        
		return $this->db->update('penulis_jurnal', $data);;
	}


    public function jumlahReviewer($id_jurnal)
	{
        
        $sql = ("SELECT count(stat_reviewer) as jml_penulis FROM nilai_jurnal where id_jurnal = $id_jurnal");
        $result = $this->db->query($sql);
        return $result->row()->jml_penulis;
	}
	
    public function view_jurnal($id_user)
    {
      $this->db->where('id_user', $id_user);
      $query = $this->db->get('view_jurnal');
      return $query->result();
    }
    
	public function jurnal_save($data)
	{
        $this->db->insert('jurnal', $data);
        $id_jurnal = $this->db->insert_id();
        return $id_jurnal;
    }

    public function penulis_save($data)
	{
		$this->db->insert('penulis_jurnal', $data);
    }

    public function getJurnal($where = ''){
		return $this->db->query("SELECT * FROM view_jurnal $where; ");
    }
    
    public function getJudulJurnal()
    {
        $this->db->SELECT('user.*, jurnal.judul_jurnal');
        $this->db->from('user');
        $this->db->join('jurnal', 'user.id_user =jurnal.id_user ', 'left');
        $this->db->where('user.role_name', 'Dosen');
        $query = $this->db->get();
        return $query->result();            
    }


    public function search($keyword)
	{
		$this->db->SELECT('*');
		$this->db->FROM('view_jurnal');
		$this->db->like('id_jurnal',$keyword);
		$this->db->or_like('id_user',$keyword);
		$this->db->or_like('nip_penulis',$keyword);
		$this->db->or_like('judul_jurnal',$keyword);
		$this->db->or_like('bukti_fisik',$keyword);
        $this->db->or_like('keterangan',$keyword);
		return $this->db->get()->result();
	}

    public function jurnal_delete($id_jurnal, $id_pj)
	{
		$this->db->where('id_jurnal', $id_jurnal);
        // $this->db->delete('jurnal');
        $this->db->where('id_pj', $id_pj);
		$this->db->delete('jurnal', 'penulis_jurnal');
    }
    
    public function penulis_delete($id_pj)
	{
		$this->db->where('id_pj', $id_pj);
		$this->db->delete('penulis_jurnal');
	}

    public function updatedata($tabel, $data, $where)
	{
		return $this->db->update($tabel, $data, $where);	
	}

    function get_Penulis($id_user)
    {
        $this->db->where('id_user', $id_user);        
        $query = $this->db->get('view_jurnal');
        return $query->result();
    }

    public function countUser()//Menjumlah Total Penulis
    {
        $sql = ("SELECT count(id_user) as jml_penulis FROM penulis_jurnal GROUP BY id_jurnal");
        $result = $this->db->query($sql);
        return $result->row()->jml_penulis;
    }

    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    
    function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
 
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }	
    
    function tambahPenulis($nip, $id_jurnal, $status){

        $data = array(
            'nip' => $nip,
            'id_jurnal' => $id_jurnal,
            'status' => $status,
        );
    
        $this->db->insert('penulis_jurnal', $data);

		// $this->db->insert($table,$data);
    }

    
	///////////////////////////////////////////////////////////////////////////////////
    
	// //PACKAGE = JURNAL, PRODUCT = USER//

	// GET USER
	function get_Dosen()
	{
		$this->db->where('role_name', 'Dosen');
        $query = $this->db->get('user');
        return $query->result(); 
	}

	//GET USER BY JURNAL ID
	function get_user_by_jurnal($id_jurnal)
	{
        $this->db->select('user.id_user, user.nip');
        $this->db->from('user');
        $this->db->join('penulis_jurnal', 'pj_id_user=id_user');
        $this->db->join('jurnal', 'id_jurnal=pj_id_jurnal');
        $this->db->where('id_jurnal',$id_jurnal);
        $query = $this->db->get();
        return $query;
	}

    
    
    // UPDATE
    function update_jurnal($id,$jurnal,$user)
    {
        $this->db->trans_start();
            //UPDATE TO JURNAL
            $data  = array(
                'judul_jurnal' => $jurnal
            );
            $this->db->where('id_jurnal',$id);
            $this->db->update('jurnal', $data);
             
            //DELETE DETAIL JURNAL
            $this->db->delete('penulis_jurnal', array('pj_id_jurnal' => $id));
 
            $result = array();
                foreach($user AS $key => $val){
                     $result[] = array(
                      'pj_id_jurnal'    => $id,
                      'pj_id_user'      => $_POST['user_edit'][$key]
                     );
                }      
            //MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('penulis_jurnal', $result);
        $this->db->trans_complete();
    }
      
 
	
 	

}