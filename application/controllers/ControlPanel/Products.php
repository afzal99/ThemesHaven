<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-21 15:40:20
 */

class Products extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('ControlPanel/Session_a');
        $this->Session_a->check_s();
        $this->load->library('form_validation');
        $this->load->library('ckeditor');
		$this->load->library('ckfinder');


    	}
    
    	public function index(){
    	redirect('controlpanel/Products/all');
		}
   
     	public function all(){
     		$this->load->model('ControlPanel/General_Model');
			// pagination code start
			$this->load->library('pagination');

		    $config['base_url'] = site_url('controlpanel/products/all');
	        $config['total_rows'] = $this->db->get('product')->num_rows();
	        $config['enable_query_strings'] = TRUE;
	        $config['use_page_numbers'] = TRUE;
	        $config['query_string_segment'] = 'page';
	        $config['page_query_string'] = TRUE;
	        $config['per_page'] = 10;
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
                                                                    // ->get('product');
	        $this->pagination->initialize($config);

			$this->db->limit($config['per_page'], $data['segment'])->order_by('date_added', 'asc');
			$this->db->from('product');
			$this->db->join('product_description','product.product_id = product_description.product_id');
			$query= $this->db->where('is_approved','1')->get();

	        $data['products'] = $query->result_array();

            $c=$this->db->select('id,name')->get('category');
            $data['category']=$c->result_array();

            $cus=$this->db->select('id,username')->get('customer');
            $data['author_cus']=$cus->result_array();

            $au_admin=$this->db->select('id,u_n')->get('tbl_admin');
            $data['author_admin']=$au_admin->result_array();


		     	$data['tab']='tab3';
		     	$data['prefixLN']='../';
		     	$data['prefix']='';
		     	

		     	$data['title']='Products';
		     	$data['t1']=array(
		     			'name'=> 'Templates',
		     			'url' => 'all'

		     		);
		     	$data['t2']=array(
		     			'name'=>  'Pending items',
		     			'url' => 'pendings'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Insert New',
		     			'url' => 'addnew'

		     		);
		     	$data['t4']='';
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';

     			$data['s_tab']='s_tab1';
     			$this->load->view('controlpanel/menu_view',$data);
     			$this->load->view('controlpanel/products_view',$data);

     			$this->load->view('controlpanel/left_nav',$data);
     		}
     		public function pendings(){
     		$this->load->model('ControlPanel/General_Model');
			// pagination code start
			$this->load->library('pagination');

		    $config['base_url'] = site_url('controlpanel/products/all');
	        $config['total_rows'] = $this->db->where('is_approved','0')->get('product')->num_rows();
	        $config['enable_query_strings'] = TRUE;
	        $config['use_page_numbers'] = TRUE;
	        $config['query_string_segment'] = 'page';
	        $config['page_query_string'] = TRUE;
	        $config['per_page'] = 10;
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
                                                                    // ->get('product');
	        $this->pagination->initialize($config);

			$this->db->limit($config['per_page'], $data['segment'])->order_by('date_added', 'asc');
			$this->db->from('product');
			$this->db->join('product_description','product.product_id = product_description.product_id');
			$query= $this->db->where('is_approved','0')->get();

	        $data['products'] = $query->result_array();
	        $data['rows']= $this->db->where('is_approved','0')->get('product')->num_rows();

            $c=$this->db->select('id,name')->get('category');
            $data['category']=$c->result_array();

            $cu=$this->db->select('id,username')->get('customer');
            $data['author_cus']=$cu->result_array();


		     	$data['tab']='tab3';
		     	$data['prefixLN']='../';
		     	$data['prefix']='';
		     	

		     	$data['title']='Products';
		     	$data['t1']=array(
		     			'name'=> 'Templates',
		     			'url' => 'all'

		     		);
		     	$data['t2']=array(
		     			'name'=>  'Pending items',
		     			'url' => 'pendings'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Insert New',
		     			'url' => 'addnew'

		     		);
		     	$data['t4']='';
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';

     			$data['s_tab']='s_tab2';
     			$this->load->view('controlpanel/menu_view',$data);
     			$this->load->view('controlpanel/pending_design',$data);

     			$this->load->view('controlpanel/left_nav',$data);
     		}
     	public function addnew(){
     		$this->ckeditor->basePath = base_url().'site_elements/ckeditor/';
			$this->ckeditor->config['toolbar'] = array(
			                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
			                                                    );
			$this->ckeditor->config['language'] = 'it';
			$this->ckeditor->config['width'] = '730px';
			$this->ckeditor->config['height'] = '300px';            

			//Add Ckfinder to Ckeditor
			$this->ckfinder->SetupCKEditor($this->ckeditor,'../../../site_elements/ckfinder/'); 



     			$data['tab']='tab3';
		     	$data['prefixLN']='../';
		     	$data['prefix']='';
		     	$this->load->view('controlpanel/left_nav',$data);

		     	$data['title']='Products';
	
		     	$data['t1']=array(
		     			'name'=> 'Templates',
		     			'url' => 'all'

		     		);
		     	$data['t2']=array(
		     			'name'=> 'Pending items',
		     			'url' => 'pendings'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Insert New',
		     			'url' => 'addnew'

		     		);
		     	$data['t4']='';
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';

     			$data['s_tab']='s_tab3';

     			$this->load->view('controlpanel/menu_view',$data);

     			$query= $this->db->where('status','enabled')->from('category')->group_by('name')->get();
     			$data['categories']=$query->result_array();

     			$q= $this->db->where('status','enabled')->from('tag')->group_by('name')->get();
     			$data['tags']=$q->result_array();

     			
     			$this->load->view('controlpanel/new_product_view',$data);
     		}

     		public function f_addpr(){

    			if ($this->input->post('prosubmit') !== null) {
     				$this->form_validation->set_rules('prTitle','Product Title','required');
     				$this->form_validation->set_rules('caId', 'Category', 'required');
     				$this->form_validation->set_rules('tag[]', 'Tag', 'required');
     				$this->form_validation->set_rules('prPrice', 'Price', 'required');
     				$this->form_validation->set_rules('layout', 'Layout', 'required');
     				$this->form_validation->set_rules('c_browser[]', 'Browser', 'required');
     				$this->form_validation->set_rules('demourl', 'Demo Url', 'required');
     				$this->form_validation->set_rules('des', 'Description', 'required');

     				

		            $prTitle = $this->input->post('prTitle', TRUE);
		            $caId = $this->input->post('caId', TRUE);
		            $tag = $this->input->post('tag', TRUE);		$tag_list = implode (",", $tag);
		            $author=$this->session->id;
		            $prPrice = $this->input->post('prPrice', TRUE);
		            $future_updates = $this->input->post('future_updates', TRUE);
		            $layout = $this->input->post('layout', TRUE);
		            $h_resolution = $this->input->post('h_resolution', TRUE);
		            $b_version = $this->input->post('b_version', TRUE);
		            $c_browser = $this->input->post('c_browser', TRUE);		$c_browser_list = implode (", ", $c_browser);
		            $demourl = $this->input->post('demourl', TRUE);
		            $des = $this->input->post('des', TRUE);


		            
				if ($this->form_validation->run())
               	{

			        $this->load->library('upload');

			        if (!empty($_FILES['image']['name']))
			        {
			            $config['upload_path'] = './site_elements/image';
			            $config['allowed_types'] = 'png';
			            $config['max_size'] = '2000';
			            $config['max_width']  = '850';
			            $config['min_width']  = '850';
			            $config['max_height']  = '660';
			            $config['min_height']  = '660';

			            $config['encrypt_name']  = TRUE;  
			                

			            $this->upload->initialize($config);

			            if ($this->upload->do_upload('image'))
			            {
			                $imagedata = $this->upload->data();
			                $image_name = $imagedata['file_name'];
			            }
			            else
			            {
			                $this->session->set_flashdata('msg','<span class="text-danger">'.$this->upload->display_errors().'</span>');
           					redirect('controlpanel/Products/addnew');

			            }

			        }

			        if (!empty($_FILES['mainfile']['name']))
			        {
			            $config['upload_path'] = './site_elements/zipstore';
			            $config['allowed_types'] = 'zip';
			            $config['max_size'] = '100000';
			            $config['max_width']  = '0';
			            $config['max_height']  = '0'; 
			            $config['encrypt_name']  = TRUE;

			            $this->upload->initialize($config);

			            if ($this->upload->do_upload('mainfile'))
			            {
			                $zipdata = $this->upload->data();
			                $zip_name = $zipdata['file_name'];
			            }
			            else
			            {
			                echo $this->upload->display_errors();
			            }

			        }
			    

	               		//***********

               			$token= md5(uniqid(mt_rand(),true));
               			$data1 = array(
		                'title' => $prTitle,
		                'category_id' => $caId,
		                'tag' => $tag_list,
		                'author' => '1',
		                'author_id' => $author,
		                'is_approved' => '1',
		                'date_added' => date("Y-m-d H:i:s"),
		                'date_updated' => date("Y-m-d H:i:s"),
		                'image' => $image_name,
		                'mainfile' => $zip_name,
		                'token' => $token
		            	);


               			$this->db->insert('product', $data1);

               			$query=$this->db->select('product_id')->from('product')->where('token',$token)->get();
						$result=$query->result_array();
						foreach($result as $row){
							$parent_id= $row['product_id'];
						}

						$data2 = array(
		                'product_id' => $parent_id,
		                'status' => 'enabled',
		                'total_sale' => '0',
		                'total_favorites' => '0',
		                'total_views' => '0',
		                'price' => $prPrice,
		                'layout' => $layout,
		                'high_resolution' => $h_resolution,
		                'bootstrap_version' => $b_version,
		                'compatable_browser' => $c_browser_list,
		                'free_future_updates' => $future_updates,
		                'preview_link' => $demourl,
		                'description' => $des
		            	);

						$this->db->insert('product_description', $data2);

               			$this->session->set_flashdata('msg','<span class="text-success" style="margin-left:20%">Successfully Uploaded !</span>');
               			redirect('controlpanel/Products/addnew');
            	}
            	else
            	{
            		$this->session->set_flashdata('msg','<span class="text-danger">'.validation_errors().'</span>');
           			redirect('controlpanel/Products/addnew');
            	}
 			}
 		}

 	     	public function view($id){

     		$this->ckeditor->basePath = base_url().'site_elements/ckeditor/';
			$this->ckeditor->config['toolbar'] = array(
			                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
			                                                    );
			$this->ckeditor->config['language'] = 'it';
			$this->ckeditor->config['width'] = '730px';
			$this->ckeditor->config['height'] = '300px';            

			//Add Ckfinder to Ckeditor
			$this->ckfinder->SetupCKEditor($this->ckeditor,'../../../site_elements/ckfinder/'); 




 			$data['tab']='tab3';
 			$data['prefixLN']='../../';
	     	$data['prefix']='';
	     	$this->load->view('controlpanel/left_nav',$data);

	     	$data['title']='Product';

	     	$data['t1']=array(
	     			'name'=> 'All Categories',
	     			'url' => '../all'

	     		);
	     	$data['t2']=array(
	     			'name'=> 'Pending items',
	     			'url' => '../pendings'
	     		);
	     	$data['t3']=array(
	     			'name'=> 'Insert New',
	     			'url' => '../addnew'
	     		);
	     	$data['t4']='';
	     	$data['t5']='';
	     	$data['t6']='';
	     	$data['t7']='';


 			$data['s_tab']='s_tab1';
 			$this->load->view('controlpanel/menu_view',$data);

			$this->db->from('product');
			$this->db->join('product_description','product.product_id = product_description.product_id');
			$query= $this->db->where('product.product_id',$id)->get();
			$product=$query->result_array();
			$data['product'] = $product;

			foreach ($product as $key) {
				$ca_id=$key['category_id'];
				$tags=$key['tag'];
			}
			$data['ca_id']=$ca_id;
			$data['tag_ids'] = explode(',', $tags);


			$cn=$this->db->where('id',$ca_id)->get('category')->result_array();
			foreach ($cn as $key) {
				$data['ca_name']=$key['name'];
			}

			$query= $this->db->where('status','enabled')->from('category')->group_by('name')->get();
     		$data['categories']=$query->result_array();

     		$data['tags']= $this->db->where('status','enabled')->from('tag')->group_by('name')->get()->result_array();
     	

	

			$this->load->view('controlpanel/pr_single_view',$data);

 		}
 		public function pendingview($id){
 			$data['tab']='tab3';
 			$data['prefixLN']='../../';
	     	$data['prefix']='';
	     	$this->load->view('controlpanel/left_nav',$data);

	     	$data['title']='Product';

	     	$data['t1']=array(
	     			'name'=> 'All Categories',
	     			'url' => '../all'

	     		);
		     	$data['t2']=array(
		     			'name'=>  'Pending items',
		     			'url' => '../pendings'

		     		);
		     	$data['t3']=array(
		     			'name'=> 'Insert New',
		     			'url' => '../addnew'

		     		);
	     	$data['t4']='';
	     	$data['t5']='';
	     	$data['t6']='';
	     	$data['t7']='';


 			$data['s_tab']='s_tab2';
 			$this->load->view('controlpanel/menu_view',$data);

			$this->db->from('product');
			$this->db->join('product_description','product.product_id = product_description.product_id');
			$query= $this->db->where('product.product_id',$id)->get();
			$products= $query->result_array();
			$result_row=$query->num_rows();
			$data['product'] = $products;

            $c=$this->db->select('id,name')->get('category');
            $data['category']=$c->result_array();

            $cus=$this->db->select('id,username')->get('customer');
            $data['author_cus']=$cus->result_array();

            if($result_row != "")
            {
            foreach ($products as $key) {
            	$tags=$key['tag'];
            	$data['price']=$key['price'];
            }
            $tag_ids = explode(',', $tags);
            $tn=0;
			for ($i=0; $i < sizeof($tag_ids); $i++) {
                $que= $this->db->where('id',$tag_ids[$i])->get('tag');
                $r=$que -> result_array();
                foreach ($r as $tagname){
                    $tn=$tagname['name'];
                }
                $d[]['n']=$tn.', ';
            }
            $data['tagnames']=$d;


           
            	$this->load->view('controlpanel/pending_single_view',$data);
            }
	

			

 		}
 		public function approve(){
     		$this->form_validation->set_rules('price','Price','required');
     		if($this->form_validation->run()) 
     		{
     			$price = $this->input->post('price', TRUE);
     			$id = $this->input->post('prid', TRUE);


     			$data1 = array('is_approved' => '1');
     			$data2 = array('price' => $price);

     			$this->db->where('product_id',$id)->update('product',$data1);
     			$this->db->where('product_id',$id)->update('product_description',$data2);

     			redirect('controlpanel/Products/pendings');
     		}
     		else
     		{
     			$id = $this->input->post('prid', TRUE);
        		$this->session->set_flashdata('msg','<span class="text-danger">'.validation_errors().'</span>');
       			redirect('controlpanel/Products/pendingview/'.$id);
                
     		}
     	}

 		public function update(){
 				$this->form_validation->set_rules('prTitle','Product Title','required');
 				$this->form_validation->set_rules('caId', 'Category', 'required');
 				$this->form_validation->set_rules('prPrice', 'Price', 'required');
 				$this->form_validation->set_rules('layout', 'Layout', 'required');
 				$this->form_validation->set_rules('demourl', 'Demo Url', 'required');
 				$this->form_validation->set_rules('des', 'Description', 'required');

 				
 				$prId = $this->input->post('pr_id', TRUE);
	            $prTitle = $this->input->post('prTitle', TRUE);
	            $caId = $this->input->post('caId', TRUE);
	            $tag = $this->input->post('tag', TRUE);		$tag_list = implode (",", $tag);
	            $author=$this->session->id;
	            $prPrice = $this->input->post('prPrice', TRUE);
	            $future_updates = $this->input->post('future_updates', TRUE);
	            $layout = $this->input->post('layout', TRUE);
	            $h_resolution = $this->input->post('h_resolution', TRUE);
	            $b_version = $this->input->post('b_version', TRUE);
	            $c_browser = $this->input->post('c_browser', TRUE);		$c_browser_list = implode (", ", $c_browser);
	            $demourl = $this->input->post('demourl', TRUE);
	            $des = $this->input->post('des', TRUE);


	            
            	if($this->form_validation->run()) {
           			$token= md5(uniqid(mt_rand(),true));
           			$data1 = array(
	                'title' => $prTitle,
	                'category_id' => $caId,
	                'tag' => $tag_list,
	                'author_id' => $author,
	                'date_added' => date("Y-m-d H:i:s"),
	                'date_updated' => date("Y-m-d H:i:s"),
	                'token' => $token
	            	);


           			$this->db->where('product_id',$prId)->update('product', $data1);

           			

					$data2 = array(
	                'price' => $prPrice,
	                'layout' => $layout,
	                'high_resolution' => $h_resolution,
	                'bootstrap_version' => $b_version,
	                'compatable_browser' => $c_browser_list,
	                'free_future_updates' => $future_updates,
	                'preview_link' => $demourl,
	                'description' => $des
	            	);

					$this->db->where('product_id',$prId)->update('product_description', $data2);

           			$this->session->set_flashdata('msg','<span class="text-success" style="margin-left:20%">Update Successfully !</span>');
           			redirect('controlpanel/Products/view/'.$prId);
            	}
            	else{ 
            		$this->session->set_flashdata('msg','<span class="text-danger">'.validation_errors().'</span>');
           		redirect('controlpanel/Products/view/'.$prId);
            	}
		}


     	public function delete($id){

        $this->load->helper("file");
        $this->load->helper("url");
     	$data['prefixLN']='';

     	if($id != ''){
     		$query= $this->db->where('product_id',$id)->get('product');
     		$result=$query->result_array();
     		
     		foreach ($result as $key) {
     			$image=FCPATH.'site_elements/image/'.$key['image'];
     			$zip=FCPATH.'site_elements/zipstore/'.$key['mainfile'];
     			unlink($image);
     			unlink($zip);
     		}

     		$this->db->where('product_id',$id)->delete('product');
     		$this->db->where('product_id',$id)->delete('product_description');

			redirect('controlpanel/products/all');
     	}


     }
     	}
