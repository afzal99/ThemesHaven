<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-12-18 02:16:15
 */

class Logout_model extends CI_Model{
	public function ses_destroy(){
	    if($this->session->id)
		{
			$id=$this->session->id;
			$user=$this->session->username;
			$n="";
			$info = array(
				          'token' => $n
				        );
			$this->db->where('id', $id)->where('u_n', $user)->update('tbl_admin', $info);

			$this->session->sess_destroy();
  			redirect('controlpanel/Login');
		}
		else
		{
			redirect('controlpanel/Login');
		}
	}
}