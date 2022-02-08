<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Developer_m extends CI_Model {
        
    public function get(){
		$this->db->from('rekap');
		$this->db->where('status', 2);	
		$query = $this->db->get();
		return $query;
		}

    public function upload($pks, $id_rekap){
        $params = array(
            'pks' => $pks,
        );
        $this->db->where('id', $id_rekap);
        $this->db->update('rekap', $params);
    }

    public function getView(){
        
    }
}
?>