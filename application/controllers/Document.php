<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index(){
		$data['rekap'] = $this->Document_m->get()->result();
		$data['title'] = 'Document';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('admin/document', $data);
		$this->load->view('templates/footer');
    }

	public function detailDoc($id){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['requirement'] = $this->Document_m->getReq($id)->result();
		$data['rekap'] = $this->Document_m->getRek($id)->result();
		$data['title'] = 'Detail Requirement';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('admin/requireDoc', $data);
		$this->load->view('templates/footer');
	}

	public function getView($file, $id){
		$data['rekap'] = $this->Document_m->getRek($id)->row_array();
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
			$this->load->view('admin/viewImageDetailAdmin', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/viewWord', $data);
			$this->load->view('templates/footer');
		}
	}

	public function updateDoc(){
		$data = $this->input->post(null, TRUE);
		$this->Document_m->update($data);
		if($this->db->affected_rows() > 0){
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function updateDet(){
		$data = $this->input->post(null, TRUE);
		$this->Document_m->updateDet($data);
		if($this->db->affected_rows() > 0){
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
?>