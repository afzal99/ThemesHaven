<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_ses extends CI_Controller {
	public function index(){
			if($this->session->id)
			{
				$id=$this->session->id;
				$mail=$this->session->email;

				$query=$this->db->select('*')->where('id',$id)->where('email',$mail)->from('tbl_admin')->get();
				$result = $query->result_array();

				if(!$result)
				{
					redirect('Login');
				}
			}
			else{
				redirect('Login');
			}
			


	}
}