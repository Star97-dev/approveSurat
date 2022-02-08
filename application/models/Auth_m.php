<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {
        
    public function regist($data){
        $this->db->insert('user', $data);
    }
}
?>