<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-21 15:40:20
 */

class Account extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->library('form_validation');

	}
	public function index(){
		redirect('account/forgotten');
	}

	public function forgotten(){
		//user info
		if($this->session->userid)
		{
			$q= $this->db->where('id',$this->session->userid)->get('customer');
			$userinfo= $q->result_array();

			foreach ($userinfo as $key) {
				$data['avatar']=$key['avater'];
			}
		}
		//userinfo
        //dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav
		$data['title']='Forgot Your Password';
		$this->load->view('forgotten_view',$data);
	}

	
	public function forgetpassword(){
		if ($this->input->post('submit') !== null)
		{
			$this->form_validation->set_rules('email','email','required|valid_email');
			$email = $this->input->post('email', TRUE);

			if ($this->form_validation->run())
           	{
           		$q=$this->db->where('email',$email)->get('customer');
           		$result=$q->num_rows();
           		if($result=='1')
           		{
           			$query=$this->db->select('id,hash')->where('email',$email)->get('customer');
           			$r=$query->result_array();

           			foreach ($r as $key) {
           				$id=$key['id'];
           				$t=$key['hash'];
           			}

           			$config = array(
						  'protocol' => 'smtp',
						  'smtp_host' => 'ssl://smtp.gmail.com',
						  'smtp_port' => 465,
						  'smtp_user' => 'themeshaven@gmail.com', 
						  'smtp_pass' => 'mjr98757', 
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1',
						  'wordwrap' => TRUE
						);
           			$this->load->library('email', $config);

					$this->email->initialize($config);

					$this->email->from('ThemesHaven@gmail.com');
					$this->email->to($email);
					$this->email->subject('ThemesHaven Account Recovery');

					$message='Thank you for being with ThemesHaven.
			         <a href="'.site_url().'account/reset/'.$id.'/'.$t.'">Click Here</a> to reset your password.
			      	';

			      	$this->email->message($message);

				    if($this->email->send())
				    {
				    	$this->session->set_flashdata('message','<span class="text-success">A reset link has been sent to your email.</span>');
           				redirect('account/forgotten');
				    }
				    else{
				    	$this->session->set_flashdata('message','<span class="text-danger">Error occured while sending reset link.</span>');
           				redirect('account/forgotten');
				    }
				    

           			
           		}
           		else
           		{
           			$this->session->set_flashdata('error','<br/><span class="text-danger">There is no account associated with this email.</span>');
       				redirect('account/forgotten');
           		}
           	}
           	else
           	{
        		$this->session->set_flashdata('error','<span  class="text-warning">'.validation_errors().'</span>');
       			redirect('account/forgotten');
            }
		}
	}
	public function reset(){
		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav
		$id=$this->uri->segment('3');
		$token=$this->uri->segment('4');

		if($id != "" && $token != "")
		{
			$q=$this->db->where('id',$id)->where('hash',$token)->get('customer');
			$r=$q->num_rows();

			if($r=='1')
			{
				$data['title']='Reset Password';
				$data['id']=$id;
				$data['token']=$token;

				$this->load->view('reset_password',$data);
			}
			else{
				redirect('account/forgotten');
			}
		}
		else{
			redirect('account/forgotten');
		}
	}
	public function resetpassword(){
		if ($this->input->post('submit') !== null)
		{
			$this->form_validation->set_rules('password','password','required');
			$this->form_validation->set_rules('confirmpassword','confirm password','required');

			$id = $this->input->post('id', TRUE);
			$token = $this->input->post('token', TRUE);
			$password = $this->input->post('password', TRUE);
			$confirmpassword = $this->input->post('confirmpassword', TRUE);
			
			if ($this->form_validation->run())
           	{
           		$q=$this->db->where('id',$id)->where('hash',$token)->get('customer');
           		$result=$q->num_rows();
           		if($result=='1')
           		{
           			$pass=crypt($password,'$6$rounds=4567$abcdefghijklmnop$');
           			$token= md5(uniqid(mt_rand(),true));

           			$data = array('password' => $pass,
           				'hash' => $token
           				);

           			$this->db->where('id',$id)->update('customer',$data);
           			
           			$this->session->set_flashdata('lmsg','<span class="text-success">Password Changed Successfully.</span>');
           				redirect(site_url('signin'));
           		}
           	}
           	else
           	{
           		redirect(site_url('account/forgotten'));
           	}
        }
        else
        {

        }

	}
}
