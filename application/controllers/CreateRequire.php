<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateRequire extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('branch', 'Branch', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if(!$this->form_validation->run()){
			$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$id_user = $user['id'];
			$data['requirement'] = $this->CreateRequire_m->getReq($id_user)->result();
			$data['title'] = 'Requirement';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('partner/CreateRequire', $data);
			$this->load->view('templates/footer');
		}
    }

	public function upload($id){
		$data['title'] = 'Upload File';
		$data['requirement'] = $this->CreateRequire_m->getUp($id)->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('partner/upload', $data);
		$this->load->view('templates/footer');
	}

	public function require($id_rekap){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rekap'] = $this->CreateRequire_m->getRek($id_rekap);
		$data['requirement'] = $this->CreateRequire_m->getReq()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('partner/require', $data);
		$this->load->view('templates/footer');
	}

	public function input_cart(){
		$name = $this->input->post('fileName');

		$config['upload_path']		= './uploads/';
		$config['allowed_types']	= 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_sizes']		= 3072;
		$config['remove_space'] 	= TRUE;
		$config['file_name']		= date('ymd').'_'.$name;
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload('file'))
		{
			$data = array('upload_data' => $this->upload->data());
			$filename = $this->input->post('fileName');
			$id_req = $this->input->post('id_req');
			$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$id_user = $user['id'];
			$image = $data['upload_data']['file_name'];
			$result =  $this->CreateRequire_m->add_cart($filename, $image, $id_user, $id_req);
			echo json_decode($result);
		}	 
	}

	public function getCart(){
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $user['id'];
		$cart = $this->CreateRequire_m->get($id);
		$data['cart'] = $cart;
		$this->load->view('partner/cart', $data);
	}

	public function getView($file){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = "Gambar ".$file;
		$data['name'] = $file;
		$imageExten = explode('.', $file);
		$imageExten = strtolower(end($imageExten));
		if($imageExten == "pdf"){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('partner/viewPDF', $data);
			$this->load->view('templates/footer');
		} else if($imageExten == "jpg" or $imageExten == "jpeg" or $imageExten == "png"){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('partner/viewImage', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/viewWord', $data);
			$this->load->view('templates/footer');
		}
	}

	public function delCart($id){
		$data = $this->CreateRequire_m->getDel($id)->row();
		$fileTarget = 'uploads/'.$data->file;
		unlink($fileTarget);

		$this->CreateRequire_m->delCart($id);
		redirect('CreateRequire');
	}
	
	public function save(){
		$data = $this->input->post(null, TRUE);
		$id_rekap = $this->CreateRequire_m->save($data);
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $user['id'];
		$req = $this->CreateRequire_m->getReq()->result();
		$row = [];
		foreach($req as $r => $data){
			array_push($row, array(
				'id_rekap'  => $id_rekap,
				'id_user'	=> $id,
				'id_req'	=> $data->id,
				'filename'	=> $data->name
			));
		}
		$this->CreateRequire_m->rekap_detail($row);
		redirect('Requirement/detail/'.$id_rekap);
	}

	// public function save(){
	// 	$data = $this->input->post(null, TRUE);
	// 	$id_rekap = $this->CreateRequire_m->save($data);
	// 	$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	// 	$id = $user['id'];
	// 	$cart = $this->CreateRequire_m->get($id)->result();
	// 	$row = [];
	// 	foreach ($cart as $c => $value) {
	// 		array_push($row, array(
	// 			'id_rekap' => $id_rekap,
	// 			'id_user' => $value->id_user,
	// 			'id_req' => $value->id_req,
	// 			'filename' => $value->filename,
	// 			'file' => $value->file,
	// 			'status' => 0
	// 			)
	// 		);
	// 	}
	// 	$this->CreateRequire_m->rekap_detail($row);
	// 	$this->CreateRequire_m->dellCartAll($id);
	// 	if ($this->db->affected_rows() > 0) {
	// 		$params = array("success" => true);
	// 	} else {
	// 		$params = array("success" => false);
	// 	}
	// 	echo json_encode($params);
	// }
}
?>