<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-12-31 12:58:34
 */

class Signin extends CI_Controller {
    
    function __construct(){
    	parent::__construct();
        
    }
    public function index(){
		$this->load->view('Usersign_view');
	}
	public function checkpoint(){
		
			$username = $this->input->post('username',TRUE);
			$pas = $this->input->post('password',TRUE);
			if(isset($username) && isset($pas))
			{
				$p=crypt($pas,'$6$rounds=4567$abcdefghijklmnop$');
				$query=$this->db->select('*')->from('customer')->where('username',$username)->where('password',$p)->get();
				$chk=$query->result_array();
			  	if($chk)
			  	{
			  		foreach($chk as $info):
			  			$u_id=$info['id'];
			  			$mail_ad=$info['email'];
			  			$user=$info['username'];
			  			$validation=$info['is_verified'];
			  		endforeach;

			  		if($validation=='0')
			  		{
			  			$this->session->set_flashdata('lmsg','<p style="margin-left:65px; text-align:center;"  class="msg text-danger">Account is not verified yet !</p>');
	    				redirect('Signin');
			  		}
			  		else
			  		{
				  		$hash= md5(uniqid(mt_rand(),true));

				  		$inf = array(
				          'hash' => $hash
				        );

				       $this->db->where('id', $u_id)->update('customer', $inf);


				  		$user_data = array(
						'userid' => $u_id,
						'user' =>$user,
						'token' => $hash
						);

						$this->session->set_userdata($user_data);

						$cookie_name = "user";
						$cookie_value = $user;
						setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/");


						$this->session->set_flashdata('lmsg','<p style="margin-left:65px; text-align:center;"  class="msg text-success">LOGIN SUCCESS</p>');
		    			redirect('home');
	    			}
			  	}
			  	else
			  	{
					$this->session->set_flashdata('lmsg','<p style="margin-left:65px; text-align:center;"  class="msg text-danger">Invalid Account Information</p>');
	    			redirect('Signin');
		    	}
			}
			else
			{
				redirect('Signin');

			}
	}
}