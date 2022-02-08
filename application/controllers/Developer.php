<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index(){
		$data['rekap'] = $this->Developer_m->get()->result();
		$data['title'] = 'Developer';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('admin/developer', $data);
		$this->load->view('templates/footer');
    }

	public function viewUser(){
		$data['rekap'] = $this->Developer_m->get()->result();
		$data['title'] = 'Developer';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('partner/developer', $data);
		$this->load->view('templates/footer');
	}

	public function upload(){
		$name = $this->input->post('filename');
		
		$config['upload_path']          = './uploads/pks/';
		$config['allowed_types']        = 'doc|docx|pdf';
		$config['max_size']             = 3072;
		$config['file_name']            = 'pks-'.date('ymd').$name;
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('pks'))
		{
			$data = array('upload_data' => $this->upload->data());
			$id_rekap = $this->input->post('id');
			$pks = $data['upload_data']['file_name'];
			$this->Developer_m->upload($pks, $id_rekap);
			if ($this->db->affected_rows() > 0) {
			echo "<script>
					alert('Data berhasil di input')
					window.location='".site_url('Developer')."';
					</script>";
			}
		} 
		else{
			echo "<script>
					alert('Data gagal!')
					window.location='".site_url('Developer')."';
					</script>";
		}
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
			$this->load->view('partner/viewImage', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/viewWord', $data);
			$this->load->view('templates/footer');
		}
	}
}
?>