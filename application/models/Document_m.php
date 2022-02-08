<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_m extends CI_Model {
        
    public function get(){
		$this->db->from('rekap');
		$this->db->where_not_in('status', 0);		
		$query = $this->db->get();
		return $query;
		}
	
	public function getRek($id)
	{
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

	public function update($data){
		$params = array(
			'id_user' => $data['id_user'],
			'name' => $data['name'],
			'branch' => $data['branch'],	
			'date' => $data['date'],
			'status' => $data['status'],
			'note' => $data['note'],
		);

		$this->db->where('id', $data['id']);
		$this->db->update('rekap', $params);
	}

	public function getDetail($id){
		$this->db->from('detail_rekap');
		$this->db->where('id_rekap', $id);
		$query = $this->db->get();
		return $query;
	}

	public function updateDet($data){
		$params = array(
			'filename' => $data['filename'],
			'file' => $data['file'],	
			'status' => $data['status']
		);

		$this->db->where('id', $data['id']);
		$this->db->update('detail_rekap', $params);
	}
}