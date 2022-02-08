<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requirement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index(){
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $user['id'];
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rekap'] = $this->Requirement_m->get($id)->result();
		$data['title'] = 'Requirement';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('partner/requirement', $data, $id);
		$this->load->view('templates/footer');
    }

	public function detail($id){
		$data['rekap'] = $this->Requirement_m->getRek($id)->result();
		$data['requirement'] = $this->Requirement_m->getReq($id)->result();
		$data['title'] = 'Requirement Detail';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('partner/require', $data);
		$this->load->view('templates/footer');
	}

	public function upload(){
		$name = $this->input->post('filename');
		$id_rekap = $this->input->post('id_rekap');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'doc|docx|pdf|jpg|png|jpeg';
		$config['max_size']             = 3072;
		$config['file_name']            = 'req-'.date('ymd').$name;
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('file'))
		{
			$data = array('upload_data' => $this->upload->data());
			$id = $this->input->post('id');
			$file = $data['upload_data']['file_name'];
			$this->Requirement_m->upload($file, $id);
			if ($this->db->affected_rows() > 0) {
			echo "<script>
					alert('Data berhasil di input')
					window.location='".site_url('Requirement/detail/'.$id_rekap)."';
					</script>";
			}
		} 
		else{
			echo "<script>
					alert('Data gagal!')
					window.location='".site_url('Requirement/detail/'.$id_rekap)."';
					</script>";
		}
	 }

	public function detailRequire($id){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail_rekap'] = $this->Requirement_m->getDetail($id)->result();
		$data['rekap'] = $this->Requirement_m->getRek($id)->result();
		$data['title'] = 'Detail Requirement';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('partner/detailRequire', $data);
		$this->load->view('templates/footer');
	}

	public function getViewDetailReq($file, $id_rekap){
		$data['rekap'] = $this->Requirement_m->getRek($id_rekap)->row_array();
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
			$this->load->view('partner/viewImageDetail', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/viewWord', $data);
			$this->load->view('templates/footer');
		}
	}

	public function getView($file, $id_rekap){
		$data['rekap'] = $this->Requirement_m->getRek($id_rekap)->row_array();
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
			$this->load->view('partner/viewImageDetail', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/viewWord', $data);
			$this->load->view('templates/footer');
		}
	}

	public function submit($id){
		$this->Requirement_m->submit($id);
		redirect('Requirement');
	}

	public function createDetailRequire($id){
		$data['rekap'] = $this->Requirement_m->getRek($id)->result();
		$data['cart'] = $this->Requirement_m->getDetail($id);
		$data['detail_rekap'] = $this->Requirement_m->getDetail($id)->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail Requirement';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
        $this->load->view('partner/createDetailRequire', $data);
		$this->load->view('templates/footer');
	}

	public function input_cart(){
		$name = $this->input->post('fileName');

		$config['upload_path']		= './uploads/';
		$config['allowed_types']	= 'jpg|jpeg|png|pdf';
		$config['max_sizes']		= 3072;
		$config['remove_space'] 	= TRUE;
		$config['file_name']		= date('ymd').'_'.$name;
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload('file'))
		{
			$data = array('upload_data' => $this->upload->data());
			$filename = $this->input->post('fileName');
			$id_rekap = $this->input->post('id_rekap');
			$id_user = $this->input->post('id_user');
			$id_req = $this->input->post('id_req');
			$image = $data['upload_data']['file_name'];
			$result = $this->Requirement_m->add_cart($filename, $image, $id_rekap, $id_user, $id_req);
			echo json_decode($result);
		}
	}

	public function delCartDetail($id, $id_rekap){
		$data = $this->Requirement_m->getDetail($id_rekap)->row();
		$fileTarget = 'uploads/'.$data->file;
		unlink($fileTarget);

		$this->Requirement_m->delCart($id);
		redirect('Requirement/createDetailRequire/'.$id_rekap);
	}

	public function delCart($id, $id_rekap){
		$data = $this->Requirement_m->getDetail($id)->row();
		$fileTarget = 'uploads/'.$data->file;
		unlink($fileTarget);

		$this->Requirement_m->delCart($id);
		redirect('Requirement/detail/'.$id_rekap);
	}

	// public function getCart(){
	// 	$data['detail_rekap'] = $this->Requirement_m->getDetail($id)->result();
	// 	$this->load->view('partner/cart', $data);
	// }
}
?>