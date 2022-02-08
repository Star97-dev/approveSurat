<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateRequire_m extends CI_Model {
    
    public function get($id)
    {
        $this->db->from('cart');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query;
    }

    public function getDel($id)
    {
        $this->db->from('cart');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query;
    }
    
    public function getRek($id_rekap)
    {
        $this->db->from('rekap');
        $this->db->where('id', $id_rekap);
        $query = $this->db->get();
        return $query;
    }

    public function getReq(){
        $this->db->from('requirement');
        $query = $this->db->get();
        return $query;
    }

    public function getUp($id){
        $query = "SELECT requirement.id as id_req ,requirement.name as filename, cart.status from requirement 
        LEFT JOIN cart ON requirement.id = cart.id_req
        WHERE requirement.id = $id";
        return $this->db->query($query);
    }

    function add_cart($filename, $image, $id_user, $id_req){
        $query = $this->db->query("SELECT MAX(id) AS no_cart from cart");
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$no_car = ((int)$row->no_cart) + 1;
		} else {
			$no_car = "1";
		}
        $params = array(
            'id' => $no_car,
            'id_user' => $id_user,
            'id_req' => $id_req,
            'filename' => $filename,
            'file' => $image,
            'status' => 0
        );
        $result = $this->db->insert('cart', $params);
        return $result;
    }

    public function delCart($id){
        $this->db->where('id', $id);
		$this->db->delete('cart');
    }

    public function save($data){
        $params = array(
            'id_user'   => $data['id_user'],
            'name'      => $data['name'],
            'branch'    => $data['branch'],
            'date'      => $data['date'],
            'status'    => 0
        );
        $this->db->insert('rekap', $params);
        return $this->db->insert_id();
    }

    function rekap_detail($params){
        $this->db->insert_batch('detail_rekap', $params);
    }

    public function dellCartAll($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('cart');
	}
}
?>