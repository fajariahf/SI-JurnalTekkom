<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$role_name = $this->session->userdata('role_name');
        $email = $this->session->userdata('email');
    }

    // READ
	function index(){
		$data['product'] = $this->Coba_model->get_products();
		$data['package'] = $this->Coba_model->get_packages();
		$this->load->view('coba/package_view',$data);
	}

	// READ
	function coba2()
	{		
		$this->load->view('coba2');
	}

	//CREATE
	function create(){
		$package = $this->input->post('package',TRUE);
		$product = $this->input->post('product',TRUE);
		$this->Coba_model->create_package($package,$product);
		redirect('Coba');
	}

	// GET DATA PRODUCT BERDASARKAN PACKAGE ID
	function get_product_by_package(){
		$package_id=$this->input->post('package_id');
		$data=$this->Coba_model->get_product_by_package($package_id)->result();
		foreach ($data as $result) {
			$value[] = (float) $result->product_id;
		}
		echo json_encode($value);
	}

	//UPDATE
	function update(){
		$id = $this->input->post('edit_id',TRUE);
		$package = $this->input->post('package_edit',TRUE);
		$product = $this->input->post('product_edit',TRUE);
		$this->Coba_model->update_package($id,$package,$product);
		redirect('coba');
	}

	// DELETE
	function delete(){
		$id = $this->input->post('delete_id',TRUE);
		$this->Coba_model->delete_package($id);
		redirect('coba');
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function insert()
	{
	// 	$connect = mysqli_connect("localhost", "root", "", "db_jurnaltekkom");
	// 	if(isset($_POST["nip_penulis"]))
	// 	{
	// 	 $nip_penulis = $_POST["nip_penulis"];
	// 	 $stat_penulis = $_POST["stat_penulis"];
	// 	 $id_jurnal = $_POST["id_jurnal"];
	// 	 $query = '';
	// 	 for($count = 0; $count<count($nip_penulis); $count++)
	// 	 {
	// 	  $nip_penulis_clean = mysqli_real_escape_string($connect, $nip_penulis[$count]);
	// 	  $stat_penulis_clean = mysqli_real_escape_string($connect, $stat_penulis[$count]);
	// 	  $id_jurnal_clean = mysqli_real_escape_string($connect, $id_jurnal[$count]);
	// 	  if($nip_penulis_clean != '' && $stat_penulis_clean != '' && $id_jurnal_clean != '')
	// 	  {
	// 	   $query .= '
	// 	   INSERT INTO jurnal(nip_penulis, stat_penulis, id_jurnal) 
	// 	   VALUES("'.$nip_penulis_clean.'", "'.$stat_penulis_clean.'", "'.$id_jurnal_clean.'"); 
	// 	   ';
	// 	  }
	// 	 }
	// 	 if($query != '')
	// 	 {
	// 	  if(mysqli_multi_query($connect, $query))
	// 	  {
	// 	   echo 'Item Data Inserted';
	// 	  }
	// 	  else
	// 	  {
	// 	   echo 'Error';
	// 	  }
	// 	 }
	// 	 else
	// 	 {
	// 	  echo 'All Fields are Required';
	// 	 }
	// 	}
    }
    
}
