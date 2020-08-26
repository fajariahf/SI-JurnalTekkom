<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function getAllNilai()
	{
		$query = $this->db->get('view_nilaijurnal');
		return $query->result(); 
		
		// $this->db->SELECT('nilai_jurnal.*, jurnal.judul_jurnal');
		// $this->db->from('jurnal');
		// $this->db->join('nilai_jurnal', 'nilai_jurnal.id_jurnal = jurnal.id_jurnal', 'left');
		// $query = $this->db->get();
		// return $query;
		
	}	

	public function nilai_delete($id_nilai)
	{
		$this->db->where('id_nilai',$id_nilai);
		$this->db->delete('nilai_jurnal');
	}

	public function total()
	{
        $query = $this->db->get('view_total');
        return $query->result(); 
		
	}
	
	public function getNilaiJurnal($id_user)
	{
		$this->db->where('id_reviewer', $id_user);
		$query = $this->db->get('view_nilaijurnal');
		return $query->result();
        // $query = $this->db->get('view_nilaijurnal');
        // return $query->result(); 
	}

	public function ambilJumlahJurnal()
	{
		$sql = "SELECT * FROM nilai_jurnal GROUP BY id_jurnal";
		// $result = $this->db->query($sql);

		$result = $sql->row_array();
		$count = $result['COUNT(*)'];
		return $result;
	}

	public function get_total()
	{
		$sql = "SELECT sum((kelengkapan_isi + ruanglingkup + kecukupan + kelengkapan_unsur)/2) AS total FROM nilai_jurnal GROUP BY id_jurnal";
		$result = $this->db->query($sql);
		return $result->row()->total;
	}

    public function search_index($keyword)
	{
		$this->db->SELECT('*');
		$this->db->FROM('view_nilai');
		$this->db->like('id_jurnal',$keyword);
		$this->db->or_like('id_user',$keyword);
		$this->db->or_like('nip_penulis',$keyword);
		$this->db->or_like('judul_jurnal',$keyword);
		$this->db->or_like('id_nilai',$keyword);
		$this->db->or_like('id_reviewer',$keyword);
		$this->db->or_like('stat_reviewer',$keyword);
        $this->db->or_like('keterangan',$keyword);
		return $this->db->get()->result();
	}

	public function search_jurnal($keyword)
	{
		$this->db->SELECT('*');
		$this->db->FROM('view_nilai');
		$this->db->like('id_jurnal',$keyword);
		return $this->db->get()->result();
	}
	
	public function view_nilai()
	{
		$query = $this->db->get('view_nilai');
        return $query->result();  
	}

	public function getNilai($where = ''){
		return $this->db->query("SELECT * FROM view_nilaijurnal $where; ");
	}

	function updateData($tabel, $data, $where)
	{
		return $this->db->update($tabel, $data, $where);	
	}

	//GET NILAI BY JURNAL ID
	function get_nilai_by_jurnal($id_jurnal)
	{
        $this->db->select('user.id_user, user.nip');
        $this->db->from('user');
        $this->db->join('penulis_jurnal', 'pj_id_user=id_user');
        $this->db->join('jurnal', 'id_jurnal=pj_id_jurnal');
        $this->db->where('id_jurnal',$id_jurnal);
        $query = $this->db->get();
        return $query;
	}

	public function nilai_save($data)
	{
		$this->db->insert('nilai_jurnal', $data);
	}

//////////////////////////////////////////////////////////////////////////////////////////

	
	
	public function nilai_save_($data)
	{
		$this->db->SELECT('jurnal.id_jurnal, nilai_jurnal.id_nilai, nilai_jurnal.id_reviewer, nilai_jurnal.stat_reviewer, nilai_jurnal.kelengkapan_isi, nilai_jurnal.ruanglingkup, nilai_jurnal.kecukupan, nilai_jurnal.kelengkapan_unsur');
		$this->db->FROM('jurnal');
		$this->db->join('nilai_jurnal', 'nilai_jurnal.id_jurnal = jurnal.id_jurnal', 'right');
		$query = $this->db->get();
		return $query;
		$this->db->insert('nilai_jurnal', $data);
	}
	
	function TampilNilaiJurnal() 
    {
		$this->db->SELECT('jurnal.id_jurnal, jurnal.judul_jurnal, jurnal.keterangan, nilai_jurnal.id_nilai, nilai_jurnal.id_reviewer, nilai_jurnal.stat_reviewer, nilai_jurnal.kelengkapan_isi, nilai_jurnal.ruanglingkup, nilai_jurnal.kecukupan, nilai_jurnal.kelengkapan_unsur');
		$this->db->from('jurnal');
		$this->db->join('nilai_jurnal', 'nilai_jurnal.id_jurnal = jurnal.id_jurnal', 'left');
		$query = $this->db->get();
		return $query;
	}  

	function cetak_detail($cetak)
  {
	// return $this->db->get_where("view_formnilai", array('id_user' => $cetak));
	$this->db->SELECT('*');
	$this->db->from('view_formnilai');
	$this->db->where('id_jurnal', $cetak);
	$query = $this->db->get();
	return $query;

	// return $this->db->query("SELECT * FROM view_formnilai order by id_jurnal asc");
  }


}