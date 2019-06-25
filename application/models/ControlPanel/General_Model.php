<?php
/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-11 19:42:01
 */

class General_Model extends CI_Model{
    public function get_all($table){
    	$query=$this->db->get($table);
    	return $query->result_array();
    }


}