<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Requirement_m extends CI_Model {
        
    public function get($id)
	{
		$this->db->from('rekap');			
		$this->db->where('id_user', $id);
		$query = $this->db->get();
		return $query;
	}

	public function getDetail($id){
		$this->db->from('detail_rekap');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query;
	}
	

	public function submit($id){
		$params = array(
			'status' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('rekap', $params);
	}

	function add_cart($filename, $image, $id_rekap, $id_user, $id_req){
        $params = array(
			'id_user' => $id_user,
            'id_rekap' => $id_rekap,
			'id_req' => $id_req,
            'filename' => $filename,
            'file' => $image,
            'status' => 0
        );
        $result = $this->db->insert('detail_rekap', $params);
        return $result;
    }

	public function getRek($id){
		$this->db->from('rekap');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query;
	}

	public function getReq($id){
		$this->db->from('detail_rekap');
		$this->db->where('id_rekap', $id);
		$query = $this->db->get();
        return $query;
    }

	public function delCart($id){
        $params = array(
            'file' => null,
			'status' => null
        );
        $this->db->where('id', $id);
        $this->db->update('detail_rekap', $params);
    }

	public function upload($file, $id){
        $params = array(
            'file' => $file,
			'status' => 0
        );
        $this->db->where('id', $id);
        $this->db->update('detail_rekap', $params);
    }
}