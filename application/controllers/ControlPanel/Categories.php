<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-21 10:58:30
 */

class Categories extends CI_Controller {
		function __construct(){
        parent::__construct();
        $this->load->model('ControlPanel/Session_a');
        $this->Session_a->check_s();
    }
	    public function index(){
    	redirect('controlpanel/categories/all');
}
   
     	public function All(){
	        $this->load->model('ControlPanel/General_Model');
			// pagination code start
			$this->load->library('pagination');

		    $config['base_url'] = site_url('controlpanel/categories/all');
	        $config['total_rows'] = $this->db->get('category')->num_rows();
	        $config['enable_query_strings'] = TRUE;
	        $config['use_page_numbers'] = TRUE;
	        $config['query_string_segment'] = 'page';
	        $config['page_query_string'] = TRUE;
	        $config['per_page'] = 15;
	        $config['num_links'] = 8;
	        $config['full_tag_open'] = '<ul class="pagination no-margin">';
	        $config['full_tag_close'] = '</ul>';
	        $config['cur_tag_open'] = '<li class="active"><a href="">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['prev_tag_open'] = '<li>';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['next_link'] = 'Next >';
	        $config['prev_link'] = '< Prev';


	        if ($this->input->get('page')){
	            $sgm = (int) trim($this->input->get('page'));
	            $data['segment'] = $config['per_page'] * ($sgm - 1);
	        } 
	        else {
	            $data['segment'] = 0;
	        }

	        $this->pagination->initialize($config);

	        $query = $this->db->limit($config['per_page'], $data['segment'])->order_by('name', 'asc')->get('category');
	        $data['categories'] = $query->result_array();

	        $q=$this->db->get('product');
	        $data['p_']=$q->result_array();



	      //  $q= $this->db->select('status')->from('category_description')->where('parent_id',$)


		     	$data['tab']='tab2';
		     	$data['prefixLN']='../';
		     	$data['prefix']='';
		     	

		     	$data['title']='Categories & Tags';
		     	$data['t1']=array(
		     			'name'=> 'Categories',
		     			'url' => 'all'

		     		);
		     	$data['t2']=array(
		     			'name'=> 'New Category',
		     			'url' => 'addnew'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Tags',
		     			'url' => 'alltags'

		     		);
		     	$data['t4']=array(
		     			'name'=> 'New Tag',
		     			'url' => 'newtag'

		     		);
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';

     			$data['s_tab']='s_tab1';
     			$this->load->view('controlpanel/menu_view',$data);
     			$this->load->view('controlpanel/categories_view',$data);

     			$this->load->view('controlpanel/left_nav',$data);
     		}

     		public function view($id){

     			$data['tab']='tab2';
     			$data['prefixLN']='../../';
		     	$data['prefix']='';
		     	$this->load->view('controlpanel/left_nav',$data);

		     	$data['title']='Categories & Tags';
	
		     	$data['t1']=array(
		     			'name'=> 'Categories',
		     			'url' => '../all'

		     		);
		     	$data['t2']=array(
		     			'name'=> 'New Category',
		     			'url' => '../addnew'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Tags',
		     			'url' => '../alltags'

		     		);
		     	$data['t4']=array(
		     			'name'=> 'New Tag',
		     			'url' => '../newtag'

		     		);
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';


     			$data['s_tab']='s_tab1';
     			$this->load->view('controlpanel/menu_view',$data);

     			$query = $this->db->select('*')->from('category')->where('id',$id)->get();
	        	$data['info'] = $query->result_array();

	        	$data['name']='Category Name';
     			$data['action']=site_url('controlpanel/Categories/edit');  
	        	$data['lmod'] = '1';
	        	$data['des'] = '1';
	        	

				$this->load->view('controlpanel/ca_single_view',$data);

     		}
     		public function edit(){
     			if($this->input->post('caName'))
			    {
			    	$id = $this->input->post('id');
			        $caname = $this->input->post('caName');
			        $status = $this->input->post('status');
			        $des = $this->input->post('des');
			        $date_modified= 

			        $info = array(
					    'name'          => $caname,
					    'status'        => $status,
					    'date_modified'	=> date("Y-m-d H:i:s"),
					    'description'         => $des
					   );
				  	 $this->db->where('id', $id)->update('category', $info);
					 redirect('controlpanel/categories/all');
			    }
     		}

     	public function addnew(){
     			$data['tab']='tab2';
     			$data['prefixLN']='../';
		     	$data['prefix']='';
		     	$this->load->view('controlpanel/left_nav',$data);

		     	$data['title']='Categories & Tags';
	
		     	$data['t1']=array(
		     			'name'=> 'Categories',
		     			'url' => 'all'

		     		);
		     	$data['t2']=array(
		     			'name'=> 'New Category',
		     			'url' => 'addnew'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Tags',
		     			'url' => 'alltags'

		     		);
		     	$data['t4']=array(
		     			'name'=> 'New Tag',
		     			'url' => 'newtag'

		     		);
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';


     			$data['s_tab']='s_tab2';

     			$data['name']='Category Name';
     			$data['action']=site_url('controlpanel/Categories/create');  
     			$data['des']='1';




     			$this->load->view('controlpanel/menu_view',$data);
     			$this->load->view('controlpanel/ca_insert_view',$data);
     			
     		}
     	public function Create(){

      if($this->input->post('Name'))
      {
        $caname = $this->input->post('Name');
        $s = $this->input->post('status');
        $des = $this->input->post('des');


		$this->db->where('name',$caname);
        $num_rows=$this->db->count_all_results('category');

        if($num_rows==0)
        {
	        $info = array(
	          'name' => $caname,
	          'status'     => $s,
	          'date_added' => date("Y-m-d H:i:s"),
	          'description'=> $des,
	        );

	        $this->db->insert('category',$info);

	      

	        $this->session->set_flashdata('msg','<p class="msg text-success">Category Added Successfully !</p>');
	    	redirect('controlpanel/Categories/addnew');
	    }
        else
        {	
	        $this->session->set_flashdata('msg','<p class="msg text-danger">Category Already Exists !</p>');
	    	redirect('controlpanel/Categories/addnew');
	    }
  
      redirect('controlpanel/Categories/addnew');

      }
      else{

      	// $m=date("Y-m-d H:i:s");

      


      	$this->session->set_flashdata('msg','<p class="msg text-danger">Insert a value in category name field !</p>');
        redirect('controlpanel/Categories/addnew');
      }


     }
     public function delete($id){
     	$data['prefixLN']='';

     	if($id != ''){
     		$this->db->where('id',$id)->delete('category');
			redirect('controlpanel/categories/all');

     	}


     }


         	public function alltags(){
	        $this->load->model('ControlPanel/General_Model');
			// pagination code start
			$this->load->library('pagination');

		    $config['base_url'] = site_url('controlpanel/categories/alltags');
	        $config['total_rows'] = $this->db->get('tag')->num_rows();
	        $config['enable_query_strings'] = TRUE;
	        $config['use_page_numbers'] = TRUE;
	        $config['query_string_segment'] = 'page';
	        $config['page_query_string'] = TRUE;
	        $config['per_page'] = 15;
	        $config['num_links'] = 8;
	        $config['full_tag_open'] = '<ul class="pagination no-margin">';
	        $config['full_tag_close'] = '</ul>';
	        $config['cur_tag_open'] = '<li class="active"><a href="">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['prev_tag_open'] = '<li>';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['next_link'] = 'Next >';
	        $config['prev_link'] = '< Prev';


	        if ($this->input->get('page')){
	            $sgm = (int) trim($this->input->get('page'));
	            $data['segment'] = $config['per_page'] * ($sgm - 1);
	        } 
	        else {
	            $data['segment'] = 0;
	        }

	        $this->pagination->initialize($config);

	        $query = $this->db->limit($config['per_page'], $data['segment'])->order_by('name', 'asc')->get('tag');
	        $data['tags'] = $query->result_array();

	      //  $q= $this->db->select('status')->from('category_description')->where('parent_id',$)


		     	$data['tab']='tab2';
		     	$data['prefixLN']='../';
		     	$data['prefix']='';
		     	

		     	$data['title']='Categories & Tags';
		     	$data['t1']=array(
		     			'name'=> 'Categories',
		     			'url' => 'all'

		     		);
		     	$data['t2']=array(
		     			'name'=> 'New Category',
		     			'url' => 'addnew'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Tags',
		     			'url' => 'alltags'

		     		);
		     	$data['t4']=array(
		     			'name'=> 'New Tag',
		     			'url' => 'newtag'

		     		);
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';

     			$data['s_tab']='s_tab3';
     			$this->load->view('controlpanel/menu_view',$data);
     			$this->load->view('controlpanel/tag_view',$data);

     			$this->load->view('controlpanel/left_nav',$data);
     		}

     		public function newtag(){
     			$data['tab']='tab2';
     			$data['prefixLN']='../';
		     	$data['prefix']='';
		     	$this->load->view('controlpanel/left_nav',$data);

		     	$data['title']='Categories & Tags';
	
		     	$data['t1']=array(
		     			'name'=> 'Categories',
		     			'url' => 'all'

		     		);
		     	$data['t2']=array(
		     			'name'=> 'New Category',
		     			'url' => 'addnew'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Tags',
		     			'url' => 'alltags'

		     		);
		     	$data['t4']=array(
		     			'name'=> 'New Tag',
		     			'url' => 'newtag'

		     		);
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';

     			$data['s_tab']='s_tab4';

     			$data['name']='Tag Name';
     			$data['action']=site_url('controlpanel/Categories/createtag');  
     			$data['des']='0';

     			$this->load->view('controlpanel/menu_view',$data);
     			$this->load->view('controlpanel/ca_insert_view',$data);
     			
     		}

    public function createtag(){

	    if($this->input->post('Name'))
	    {
	        $name = $this->input->post('Name');
	        $s = $this->input->post('status');


			$this->db->where('name',$name);
	        $num_rows=$this->db->count_all_results('tag');

	        if($num_rows==0)
	        {
	        	$info = array(
		          'name' => $name,
		          'status'     => $s,
		          'date_added' => date("Y-m-d H:i:s")
	        );

	        $this->db->insert('tag',$info);

	      

	        $this->session->set_flashdata('msg','<p class="msg text-success">Tag Added Successfully !</p>');
	    	redirect('controlpanel/Categories/newtag');
	    }
        else
        {	
	        $this->session->set_flashdata('msg','<p class="msg text-danger">Tag Already Exists !</p>');
	    	redirect('controlpanel/Categories/newtag');
	    }
  
      redirect('controlpanel/Categories/newtag');

      }
      else{

      	// $m=date("Y-m-d H:i:s");

      


      	$this->session->set_flashdata('msg','<p class="msg text-danger">Insert a value in tag name field !</p>');
        redirect('controlpanel/Categories/newtag');
      }


     }
          		public function tagview($id){

     			$data['tab']='tab2';
     			$data['prefixLN']='../../';
		     	$data['prefix']='';
		     	$this->load->view('controlpanel/left_nav',$data);

		     	$data['title']='Categories & Tags';
	
		     	$data['t1']=array(
		     			'name'=> 'Categories',
		     			'url' => '../all'

		     		);
		     	$data['t2']=array(
		     			'name'=> 'New Category',
		     			'url' => '../addnew'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Tags',
		     			'url' => '../alltags'

		     		);
		     	$data['t4']=array(
		     			'name'=> 'New Tag',
		     			'url' => '../newtag'

		     		);
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';


     			$data['s_tab']='s_tab3';
     			$this->load->view('controlpanel/menu_view',$data);

     			$query = $this->db->select('*')->from('tag')->where('id',$id)->get();
	        	$data['info'] = $query->result_array();

	        	$data['name']='Tag Name';
     			$data['action']=site_url('controlpanel/Categories/tagedit');  
	        	$data['lmod'] = '0';
	        	$data['des'] = '0';

				$this->load->view('controlpanel/ca_single_view',$data);

     }
     public function tagedit(){
     			if($this->input->post('caName'))
			    {
			    	$id = $this->input->post('id');
			        $caname = $this->input->post('caName');
			        $status = $this->input->post('status');

			        $info = array(
					    'name'          => $caname,
					    'status'        => $status
					   );
				  	 $this->db->where('id', $id)->update('tag', $info);
					 redirect('controlpanel/categories/alltags');
			    }
     		}
     public function tagdelete($id){
     	$data['prefixLN']='';

     	if($id != ''){
     		$row = $this->db->get('tag')->num_rows();
     		if($row != '0')
     		{
     			$this->db->where('id',$id)->delete('tag');
     			$this->session->set_flashdata('msg','<p class="msg text-success">Tag Successfully Deleted</p>');
				redirect('controlpanel/categories/alltags');
     		}
     		else
     		{
     			$this->session->set_flashdata('msg','<p class="msg text-danger">There are items with this tag</p>');
     			redirect('controlpanel/categories/alltags');
     		}
     		

     	}


     }

}
