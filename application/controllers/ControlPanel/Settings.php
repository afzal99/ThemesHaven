<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-21 10:58:30
 */

class Settings extends CI_Controller {
		function __construct(){
        parent::__construct();
        $this->load->model('ControlPanel/Session_a');
        $this->Session_a->check_s();
    }
    public function index(){
    	redirect('controlpanel/settings/accountsettings');
    }
    public function accountsettings(){
	     	$data['tab']='tab7';
	     	$data['prefixLN']='../';
	     	$data['prefix']='';
	     	

	     	$data['title']='Settings';
	     	$data['t1']=array(
	     			'name'=> 'Account Settings',
	     			'url' => ''
	     		);
	     	$data['t2']=array(
	     			'name'=> 'Featured Items',
	     			'url' => 'featured'
	     		);
	     	$data['t3']='';
	     	$data['t4']='';
	     	$data['t5']='';
	     	$data['t6']='';
	     	$data['t7']='';

 			$data['s_tab']='s_tab1';
 			$this->load->view('controlpanel/menu_view',$data);

 			$id=$this->session->id;
 			$uname=$this->session->username;
 			$token=$this->session->hash;

 			$q1=$this->db->select('u_n,email')->where('id',$id)->from('tbl_admin')->get();
 			$data['result']=$q1->result_array();

 			$this->load->view('controlpanel/acsettings',$data);

 			$this->load->view('controlpanel/left_nav',$data);

}
    public function updatesettings(){
    	$this->load->library('form_validation');

    	if($this->input->post('submit') !== null)
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('existingpass', 'Password', 'required');

			if ($this->form_validation->run())
			{
				if($this->input->post('newpass') != null && $this->input->post('confirmpass') != null)
				{
					$username = $this->input->post('username',TRUE);
					$pass = $this->input->post('existingpass',TRUE);
					$email = $this->input->post('email',TRUE);
					$newpass= $this->input->post('newpass',TRUE);
					$confirmpass= $this->input->post('confirmpass',TRUE);

					$id=$this->session->id;
					$p=crypt($pass,'$6$rounds=4567$abcdefghijklmnop$');
					$row = $this->db->where('id',$id)->where('pas',$p)->from('tbl_admin')->get()->num_rows();

					if($row == '1')
					{
						$newp=crypt($newpass,'$6$rounds=4567$abcdefghijklmnop$');

						$arrayName = array(
							'email' => $email,
							'u_n' => $username,
							'pas' => $newp
							);
						$this->db->where('id',$id)->update('tbl_admin',$arrayName);
						redirect('controlpanel/settings/accountsettings');
					}

				}
				else
				{
					$username = $this->input->post('username',TRUE);
					$pass = $this->input->post('existingpass',TRUE);
					$email = $this->input->post('email',TRUE);

					$id=$this->session->id;
					$p=crypt($pass,'$6$rounds=4567$abcdefghijklmnop$');
					$row = $this->db->where('id',$id)->where('pas',$p)->from('tbl_admin')->get()->num_rows();

					if($row == '1')
					{
						$arrayName = array(
							'email' => $email,
							'u_n' => $username
							);
						$this->db->where('id',$id)->update('tbl_admin',$arrayName);
						$this->session->set_flashdata('msg','<p style="margin-top:5px; margin-left:60px; text-align:center;" class="msg text-success">Account Information Updated Successfully, <span class="text-info">Please Login</span></p>');
	    				redirect('controlpanel/Login');
					}
				}
			}
			else
			{
				$this->session->set_flashdata('msg','<span style="margin:0px; padding:0px; line-height:10px" class="text-danger">'.validation_errors()

.'</span>');
				redirect('controlpanel/settings/accountsettings');
			}
		}
		else
		{
			redirect('controlpanel/settings/accountsettings');
		}

}
    public function Featured(){
	     	$data['tab']='tab7';
	     	$data['prefixLN']='../';
	     	$data['prefix']='';
	     	$this->load->view('controlpanel/left_nav',$data);

	     	$data['title']='Settings';
	     	$data['t1']=array(
	     			'name'=> 'Account Settings',
	     			'url' => 'accountsettings'
	     		);
	     	$data['t2']=array(
	     			'name'=> 'Featured Items',
	     			'url' => ''
	     		);
	     	$data['t3']='';
	     	$data['t4']='';
	     	$data['t5']='';
	     	$data['t6']='';
	     	$data['t7']='';

 			$data['s_tab']='s_tab2';
 			$this->load->view('controlpanel/menu_view',$data);

 			$this->db->from('product');
			$this->db->join('product_description','product.product_id = product_description.product_id');
			$query= $this->db->where('is_approved','1')->where('product_description.status','enabled')->get();
			
			
			$pre_selected=$this->db->get('featured');


 			$data['result']=$query->result_array();
 			$data['rows'] = $this->db->get('category')->num_rows();
 			$data['pre_selected']=$pre_selected->result_array();
 			$this->load->view('controlpanel/featureditems_view',$data);
}
    public function add_featured(){
    	$list = $this->input->post('id');
    	$this->db->empty_table('featured');
    	if($list != ""){
	    	foreach($list as $key) {
			    $data= array(
			        'product_id' => $key
			    );
			    $this->db->insert('featured', $data);
		    }
		    $this->session->set_flashdata('msg','<span class="text-success" style="margin-left:42%">Successfully Saved</span>');
            redirect('controlpanel/settings/featured');
		}
		else{
			$this->session->set_flashdata('msg','<span class="text-success" style="margin-left:42%">Successfully Saved</span>');
            redirect('controlpanel/settings/featured');
		}
    }
}