<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-21 10:58:30
 */

class Advanced extends CI_Controller{
	function __construct(){
	    parent::__construct();
	    $this->load->model('ControlPanel/Session_superadmin');
	    $this->Session_superadmin->check_s();
	    $this->load->library('form_validation');
    }
    public function index(){
    	redirect('controlpanel/advanced/view');
    }
	public function view(){
     	$data['tab']='tab8';
     	$data['prefixLN']='../';
     	$data['prefix']='';
     	

     	$data['title']='Advanced';
     	$data['t1']=array(
     			'name'=> 'Administrators',
     			'url' => ''

     		);
     	$data['t2']=array(
     			'name'=> 'Create Admin',
     			'url' => 'create'
     		);
     	$data['t3']='';
     	$data['t4']='';
     	$data['t5']='';
     	$data['t6']='';
     	$data['t7']='';

		$data['s_tab']='s_tab1';
		$this->load->view('controlpanel/menu_view',$data);

		$query=$this->db->where('type','admin')->get('tbl_admin');
		$data['result']=$query->result_array();
		$data['segment']='0';


		$this->load->view('controlpanel/advanced_view',$data);

		$this->load->view('controlpanel/left_nav',$data);
	}
	public function create(){
     	$data['tab']='tab8';
     	$data['prefixLN']='../';
     	$data['prefix']='';
     	

     	$data['title']='Advanced';
     	$data['t1']=array(
     			'name'=> 'Administrators',
     			'url' => 'view'

     		);
     	$data['t2']=array(
     			'name'=> 'Create Admin',
     			'url' => ''

     		);
     	$data['t3']='';
     	$data['t4']='';
     	$data['t5']='';
     	$data['t6']='';
     	$data['t7']='';

		$data['s_tab']='s_tab2';
		$this->load->view('controlpanel/menu_view',$data);

		$this->load->view('controlpanel/newadmin_view',$data);

		$this->load->view('controlpanel/left_nav',$data);
	}

	public function fcreate(){
		
		if($this->input->post('submit') !== null)
		{
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_admin.u_n]');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_admin.email]');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run())
			{
				$username= $this->input->post('username',true);
				$email= $this->input->post('email',true);
				$password= $this->input->post('password',true);
				$confirmpassword= $this->input->post('confirmpassword',true);

				$p=crypt($password,'$6$rounds=4567$abcdefghijklmnop$');

				$data = array(
					'email' => $email,
					'u_n' => $username,
					'pas' => $p,
					'type' => 'admin',
					'date' => date("Y-m-d H:i:s")
					 );

				$this->db->insert('tbl_admin',$data);

				$this->session->set_flashdata('message','<p style="text-align:center;" class="text-success">Successful !</p>');
				redirect('controlpanel/advanced/create');

			}
	        
			else
			{
				$this->session->set_flashdata('message','<p style="text-align:center;" class="text-warning">Unsuccessful !</p>');
				redirect('controlpanel/advanced/create');
			}
			


		}
	}

	public function delete($id){
     	if($id != ''){
     		$this->db->where('id',$id)->delete('tbl_admin');
			redirect('controlpanel/advanced/view');

     	}


     }
}