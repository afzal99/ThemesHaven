<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-09-13 01:57:29
 */

class Login extends CI_Controller {
	public function index(){
		$this->load->view('controlpanel/signin');
	}
		public function checkpoint(){
				$username = $this->input->post('username',TRUE);
				$pas = $this->input->post('pwd',TRUE);
				if($username && $pas)
				{
					$p=crypt($pas,'$6$rounds=4567$abcdefghijklmnop$');
					$query=$this->db->select('*')->from('tbl_admin')->where('u_n',$username)->where('pas',$p)->get();
					$chk=$query->result_array();

				  	if($chk)
				  	{
				  		foreach($chk as $info):
				  			$u_id=$info['id'];
				  			$mail_ad=$info['email'];
				  			$user=$info['u_n'];
				  			$r=$info['type'];;
				  		endforeach;

				  		$token= md5(uniqid(mt_rand(),true));

				  		$inf = array(
				          'token' => $token
				        );

				       $this->db->where('id', $u_id)->update('tbl_admin', $inf);


				  		$user_data = array(
						'id' => $u_id,
						'username' =>$user,
						'hash' => $token,
						'batch' => $r
						);

						$this->session->set_userdata($user_data);

						redirect('controlpanel/Dashboard/General');
				  	}
				  	else{
				  		$this->session->set_flashdata('msg','<p style="margin-left:65px; text-align:center;"  class="msg text-danger">Wrong Input !</p>');
	    				redirect('controlpanel/Login');
				  	}

				}
				else{
				  		$this->session->set_flashdata('msg','<p style="margin-top:5px; margin-left:60px; text-align:center;" class="msg text-info">Enter Username and Password !</p>');
	    				redirect('controlpanel/Login');
				  	}



/*

				  	$query= $this->db->select('email,user_name,pas')->from('tbl_admin')->get();

				  	$res=$this->db->query($q);
				  	$nmbr=$res->result_array();

				  	foreach($nmbr as $nm):
				  		$data['count']=$nm;
				  	endforeach;

				  	$this->load->view('',$data);
*/

				  	/*
				  	foreach($verify as $msd):
				  		$u_id=$msd['id'];
				  		$mail=$msd['email'];
				  		$ps=$msd['pas'];
				  	endforeach;

				    */
				  	/*
				    redirect('DeshBoard');
				    */
		    }
		
	}
