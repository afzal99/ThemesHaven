<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Model{
	public function check_s()
	{
		if($this->session->userid)
		{
			$id=$this->session->userid;
			$user=$this->session->user;
			$hash=$this->session->token;

			$query=$this->db->select('*')->where('id',$id)->where('username',$user)->where('hash',$hash)->from('customer')->get();
			$result = $query->result_array();
				if(!$result)
				{
					redirect('signin');
				}
		}
		else
		{
			$this->session->set_flashdata('lmsg','<p style="margin-left:65px; text-align:center;"  class="msg text-danger">Please Login First.</p>');
			redirect('signin');
		}
		
	}
}