<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_a extends CI_Model{
	public function check_s(){
			if($this->session->id)
			{
				$id=$this->session->id;
				$user=$this->session->username;
				$token=$this->session->hash;

				$query=$this->db->select('*')->where('id',$id)->where('u_n',$user)->where('token',$token)->from('tbl_admin')->get();
				$result = $query->result_array();

				if(!$result)
				{
					redirect('controlpanel/Login');
				}
			}
			else
			{
				redirect('controlpanel/Login');
			}
			

	}
}