<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-09-25 23:03:07
 */


class Signup extends CI_Controller {
	public function __construct() {
        parent::__construct();
       	
       	$this->load->library('form_validation');
       	$this->load->library('email');
    }
      
    
	public function index(){
		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav
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
		$this->load->view('Signup_View',$data);
		
	}
	public function username_check(){
		if($this->input->is_ajax_request())
		{
			$username=$this->input->post('username');

			if($this->form_validation->is_unique($username,'customer.username'))
			{
				$this->output->set_content_type('application/json')->set_output(json_encode(array('unmessage'=>'<p class="text-success">Username is available</p>')));
			}
			else
			{
				$this->output->set_content_type('application/json')->set_output(json_encode(array('unmessage'=>'<p class="text-danger">Username is not available</p>')));

			}
		}
	}

public function email_check(){
		if($this->input->is_ajax_request())
		{
			$email=$this->input->post('email');
			if($this->form_validation->is_unique($email,'customer.email'))
			{	
				// $code= rand();
				// $code= '12345';
				// $p=crypt($code,'$654567$abcdefghijklmnop$');
				// $hash="Welcome to ThemesHaven";
				
				// $message= /*-----------email body starts-----------*/
			 //        'Thanks for signing up, '.$username.'!
			 //         Your verification code is '.$code.'
			 //      	';
				// $this->email->to($email);
			 //    $this->email->subject($subject);
			 //    $this->email->message($message);
			 //    $this->email->send();			     

				$this->output->set_content_type('application/json')->set_output(json_encode(array('message'=>'<p class="text-success">Email is available.</p>')));
			}
			else
			{
				$this->output->set_content_type('application/json')->set_output(json_encode(array('message'=>'<p class="text-danger">There is already an account with this email</p>')));

			}
		}
}
	// public function Verify($email){                  for sending further verif code


	// }

	public function Verification(){
												 // USE THIS FUNCTION AS ACTION FOR FURTHER VERIFICATION
		if($this->input->post('vcsubmit')!==null)        
		{
			$email = $this->input->post('email',TRUE);
			$vcode = $this->input->post('vcode',TRUE);

			$code=crypt($vcode,'$6$rounds=4567$abcdefghijklmnop$');

			$query=$this->db->select('*')->from('customer')->where('email',$email)->where('hash',$code)->get();
			$chk=$query->result_array();

			if($chk)
			{
				$data = array('is_verified' => '1');
				$this->db->where('email', $email)->update('customer', $data);
				$this->session->unset_userdata('emailtoverif'); 
				$this->session->set_flashdata('lmsg','<p style="text-align:center;"  class="msg text-success">Your account has been created successfully.  </p>');
				redirect('signin');
			}
			else
			{
				$this->session->set_flashdata('falsevcode','<p style="text-align:center;"  class="msg text-danger">Invalid verification code ! </p>');
				redirect('signup/Verification');
			}

		}
		else                 //view verification page
		{

			if($this->session->emailtoverif !== null)
			{
			//dropdown nav
	            $c_query=$this->db->limit(25)->order_by('name')->get('category');
	            $data['categories']=$c_query->result_array();

	            $tag_query=$this->db->limit(10)->get('tag');
	            $data['tags']=$tag_query->result_array();
	        //dropdown nav
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
				$data['email'] = $this->session->emailtoverif;
				$this->load->view('Verification_view',$data);
			}
			else
			{
				redirect('signup');
			}
		}

	}

	public function checkpoint(){
		$this->load->library('form_validation');
		if($this->input->post('signupsubmit') !== null)
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customer.email]');
			$this->form_validation->set_rules('firstName', 'FirstName', 'required');
			$this->form_validation->set_rules('lastName', 'LastName', 'required');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('zip', 'Zip', 'required');

			if ($this->form_validation->run())
			{
				$username = $this->input->post('username',TRUE);
				$pas1 = $this->input->post('password',TRUE);
				$pas2 = $this->input->post('confirmPassword',TRUE);
				$email = $this->input->post('email',TRUE);
				$firstName = $this->input->post('firstName',TRUE);
				$lastName = $this->input->post('lastName',TRUE);
				$gender = $this->input->post('gender',TRUE);
				$country = $this->input->post('country',TRUE);
				$state = $this->input->post('state',TRUE);
				$zip = $this->input->post('zip',TRUE);
				$paymentmethod = $this->input->post('paymentmethod',TRUE);
				$paynumber = $this->input->post('paynumber',TRUE);
				$cardnum = $this->input->post('cardnum',TRUE);
				$cardemail = $this->input->post('cardemail',TRUE);
				$cvc = $this->input->post('cvc',TRUE);

				// $code= rand();
				$code= '12345';
				$h=crypt($code,'$6$rounds=4567$abcdefghijklmnop$');
				$pas1=crypt($pas1,'$6$rounds=4567$abcdefghijklmnop$');
				$form_data = array(
						'username' => $username,
						'password' => $pas1,
						'email' => $email,
						'firstName' => $firstName,
						'lastName' => $lastName,
						'gender' => $gender,
						'country' => $country,
						'state' => $state,
						'zip' => $zip,
						'paymentmethod' => $paymentmethod,
						'paymentmobile' => $paynumber,
						'cardnum' => $cardnum,
						'cardholderid' => $cardemail,
						'cvc' => $cvc,
						'hash' => $h,
						'date_registered' => date("Y-m-d H:i:s")
						);

						if($this->db->insert('customer', $form_data))
						{
							// SEND VERIF CODE TO EMAIL
							$subject="Welcome to ThemesHaven";
							$message= /*-----------email body starts-----------*/
					        'Thanks for signing up, '.$username.'!
					         Your verification code is '.$code.'
					      	';
							$this->email->to($email);
						    $this->email->subject($subject);
						    $this->email->message($message);
						    $this->email->send();	
						    
						    $this->session->unset_userdata('emailtoverif');      //destroy all previous session
							$session_data = array('emailtoverif' => $email);
							$this->session->set_userdata($session_data);
							redirect('Signup/Verification');
						}
					

			}
			else
			{
				$this->load->view('Signup_View');
			}
		}
		else
		{
			redirect('Signup');
		}

	}

}