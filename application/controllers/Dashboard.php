<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2016-01-01 12:04:19
 */

class Dashboard extends CI_Controller {
    function __construct(){
    	parent::__construct();
    	$this->load->model('Session');       
        $this->Session->check_s();
    	$this->load->library('form_validation');
        $this->load->library('ckeditor');
		$this->load->library('ckfinder');
    }
    public function index(){
    	//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav
        //footer
			$about=$this->db->where('id','1')->get('information');
			$data['about_r']=$about->result_array();

			$d_i=$this->db->where('id','2')->get('information');
			$data['d_i_r']=$d_i->result_array();

			$p_p=$this->db->where('id','3')->get('information');
			$data['p_p_r']=$p_p->result_array();

			$t_c=$this->db->where('id','4')->get('information');
			$data['t_c_r']=$t_c->result_array();
		//footer
    	$data['title']='Dashboard | ThemesHaven';
    	$data['tab']='tab1';
    	$data['t1']=array(
		     			'name'=> 'Dashboard',
		     			'url' => ''
		     			);
    	$data['t2']=array(
		     			'name'=> 'Favorites',
		     			'url' => 'dashboard/favorites'
		     			);
    	$data['t3']=array(
		     			'name'=> 'My Items',
		     			'url' => 'dashboard/myitems'
		     			);
    	$data['t4']=array(
		     			'name'=> 'Account Settings',
		     			'url' => 'dashboard/accountsettings'
		     			);

    	$data['tabheader']='DASHBOARD';
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



    	$this->load->view('dashboard_view',$data);

 	
}
 	public function favorites(){
 		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav
        //footer
			$about=$this->db->where('id','1')->get('information');
			$data['about_r']=$about->result_array();

			$d_i=$this->db->where('id','2')->get('information');
			$data['d_i_r']=$d_i->result_array();

			$p_p=$this->db->where('id','3')->get('information');
			$data['p_p_r']=$p_p->result_array();

			$t_c=$this->db->where('id','4')->get('information');
			$data['t_c_r']=$t_c->result_array();
		//footer
 		$data['title']='Favorites | ThemesHaven';
    	$data['tab']='tab2';
    	$data['t1']=array(
		     			'name'=> 'Dashboard',
		     			'url' => '../dashboard'
		     			);
    	$data['t2']=array(
		     			'name'=> 'Favorites',
		     			'url' => ''
		     			);
    	$data['t3']=array(
		     			'name'=> 'My Items',
		     			'url' => 'myitems'
		     			);
    	$data['t4']=array(
		     			'name'=> 'Account Settings',
		     			'url' => 'accountsettings'
		     			);
    	$data['tabheader']='FAVORITES';

    	$id=$this->session->userid;

		$this->db->from('product');
		$this->db->join('product_description','product.product_id = product_description.product_id');
		$this->db->join('favorite','product.product_id = favorite.product_id');
		$product= $this->db->where('favorite.customer_id',$id)->get();
		$data['fav_product'] = $product->result_array();
		$data['fav_row'] = $product->num_rows();
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

    	
    	if($id)
			{
				$q= $this->db->where('customer_id',$this->session->id)->get('favorite');
				$data['likeditems']= $q->result_array();
			}


    	$this->load->view('favorites_view',$data);
 	}
 	
 	public function myitems(){
 		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav
        //footer
			$about=$this->db->where('id','1')->get('information');
			$data['about_r']=$about->result_array();

			$d_i=$this->db->where('id','2')->get('information');
			$data['d_i_r']=$d_i->result_array();

			$p_p=$this->db->where('id','3')->get('information');
			$data['p_p_r']=$p_p->result_array();

			$t_c=$this->db->where('id','4')->get('information');
			$data['t_c_r']=$t_c->result_array();
		//footer
 		$data['title']='My Items | ThemesHaven';
 		$data['tab']='tab3';
    	$data['t1']=array(
		     			'name'=> 'Dashboard',
		     			'url' => '../dashboard'
		     			);
    	$data['t2']=array(
		     			'name'=> 'Favorites',
		     			'url' => 'favorites'
		     			);
    	$data['t3']=array(
		     			'name'=> 'My Items',
		     			'url' => ''
		     			);
    	$data['t4']=array(
		     			'name'=> 'Account Settings',
		     			'url' => 'accountsettings'
		     			);
    	$data['tabheader']='MY ITEMS';

    	$id=$this->session->userid;
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
		$this->db->from('product');
		$this->db->join('product_description','product.product_id = product_description.product_id');
		$product=$this->db->where('author','0')->where('author_id',$id)->get();
		$data['my_product'] = $product->result_array();
		$data['mypro_row'] = $product->num_rows();


    	if($id)
			{
				$q= $this->db->where('customer_id',$id)->get('favorite');
				$data['likeditems']= $q->result_array();
			}
    	$this->load->view('my_items_view',$data);

 	}
 	public function accountsettings(){
 		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav
        //footer
			$about=$this->db->where('id','1')->get('information');
			$data['about_r']=$about->result_array();

			$d_i=$this->db->where('id','2')->get('information');
			$data['d_i_r']=$d_i->result_array();

			$p_p=$this->db->where('id','3')->get('information');
			$data['p_p_r']=$p_p->result_array();

			$t_c=$this->db->where('id','4')->get('information');
			$data['t_c_r']=$t_c->result_array();
		//footer
 		$data['title']='Downloads | ThemesHaven';
 		$data['tab']='tab4';
    	$data['t1']=array(
		     			'name'=> 'Dashboard',
		     			'url' => '../dashboard'
		     			);
    	$data['t2']=array(
		     			'name'=> 'Favorites',
		     			'url' => 'favorites'
		     			);
    	$data['t3']=array(
		     			'name'=> 'My Items',
		     			'url' => 'myitems'
		     			);
    	$data['t4']=array(
		     			'name'=> 'Account Settings',
		     			'url' => ''
		     			);
    	$data['tabheader']='Account Settings';

    	$id=$this->session->userid;
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
		$query=$this->db->where('id',$id)->from('customer')->get();
		$data['result']=$query->result_array();


    	$this->load->view('account_settings_view',$data);
 	}
 	public function updatesettings(){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('firstname', 'FirstName', 'required');
			$this->form_validation->set_rules('lastname', 'LastName', 'required');

			if ($this->form_validation->run())
			{
				$id=$this->session->userid;
				$password = $this->input->post('password',TRUE);
				$p=crypt($password,'$6$rounds=4567$abcdefghijklmnop$');
				$row = $this->db->where('id',$id)->where('password',$p)->from('customer')->get()->num_rows();

				if($row == '1')
				{
					if($this->input->post('newpassword') != null && $this->input->post('confirmpassword') != null && $this->input->post('newpassword')==$this->input->post('confirmpassword'))
					{
						$newpassword= $this->input->post('newpassword',TRUE);

						$id=$this->session->userid;
						$p=crypt($newpassword,'$6$rounds=4567$abcdefghijklmnop$');
						$pass = array(
						'password' => $p,
						);
						$this->db->where('id',$id)->update('customer',$pass);
					}
					
						//image code
			        if (!empty($_FILES['image']['name']))
			        {
						$config['upload_path'] = './site_elements/avater';
			            $config['allowed_types'] = 'png';
			            $config['max_size'] = 400;
			            $config['max_width'] = 200;
			            $config['max_height'] = 200;
			            $config['encrypt_name'] = TRUE;

			            $this->load->library('upload', $config);
			            $image=$this->input->post('image');

			            $this->upload->do_upload('image'); 

                		$fileInfo = $this->upload->data();
               			$image_name = $fileInfo['file_name'];

               			$imgInfo = getimagesize('./site_elements/avater/'.$image_name);
						if ($imgInfo[0] == 200 && $imgInfo[1] == 200)
               			{
               				$arrayName = array(
							'avater' => $image_name
							);
               				//delete old file
							$id=$this->session->userid;
							$q=$this->db->where('id',$id)->get('customer')->result_array();
							foreach ($q as $key) {
								$oldfilename=$key['avater'];
							}
							unlink('./site_elements/avater/'.$oldfilename);
							//delete old file
							$this->db->where('id',$id)->update('customer',$arrayName);
               			}
               			else
               			{
               				unlink('./site_elements/avater/'.$image_name);
               				$this->session->set_flashdata('msg','<p class="msg text-danger">Invalid Image</p>');
							redirect('dashboard/accountsettings');
               			}
               		}
               			//image code
					


					$firstName = $this->input->post('firstname',TRUE);
					$lastName = $this->input->post('lastname',TRUE);
					$username = $this->input->post('username',TRUE);
					$email = $this->input->post('email',TRUE);	
	
					$arrayName = array(
						'firstname' => $firstName,
						'lastName' => $lastName,
						'username' => $username,
						'email' => $email
						);

					$this->db->where('id',$id)->update('customer',$arrayName);
					$this->session->set_flashdata('msg','<p class="msg text-success">Account Information Updated Successfully,</p>');
					redirect('dashboard/accountsettings');
				}
				else
				{
					$this->session->set_flashdata('msg','<p style=" text-align:center;" class="msg text-warning">Invalid Information</p>');
					redirect('dashboard/accountsettings');
				}
			}
			else
			{
				$this->session->set_flashdata('msg','<p class="text-warning">'.validation_errors().'</p>');
				redirect('dashboard/accountsettings');
			}
			
	}
 	public function submitdesign(){
 		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories4nav']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags4nav']=$tag_query->result_array();
        //dropdown nav
        //footer
			$about=$this->db->where('id','1')->get('information');
			$data['about_r']=$about->result_array();

			$d_i=$this->db->where('id','2')->get('information');
			$data['d_i_r']=$d_i->result_array();

			$p_p=$this->db->where('id','3')->get('information');
			$data['p_p_r']=$p_p->result_array();

			$t_c=$this->db->where('id','4')->get('information');
			$data['t_c_r']=$t_c->result_array();
		//footer
 		$data['title']='Submit Design | ThemesHaven';
 		$data['tab']='tab3';
    	$data['t1']=array(
		     			'name'=> 'Dashboard',
		     			'url' => '../dashboard'
		     			);
    	$data['t2']=array(
		     			'name'=> 'Favorites',
		     			'url' => 'favorites'
		     			);
    	$data['t3']=array(
		     			'name'=> 'My Items',
		     			'url' => ''
		     			);
    	$data['t4']=array(
		     			'name'=> 'Account Settings',
		     			'url' => 'accountsettings'
		     			);
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
    	$this->ckeditor->basePath = base_url().'site_elements/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
		                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
		                                                    );
		$this->ckeditor->config['language'] = 'it';
		$this->ckeditor->config['width'] = '730px';
		$this->ckeditor->config['height'] = '300px';            

		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../site_elements/ckfinder/'); 

		$query= $this->db->where('status','enabled')->from('category')->group_by('name')->get();
		$data['categories']=$query->result_array();

		$q= $this->db->where('status','enabled')->from('tag')->group_by('name')->get();
		$data['tags']=$q->result_array();

     			


    	$data['tabheader']='Submit Your Design';
 		$this->load->view('design_submit',$data);
 	}

	public function f_addpr()
	{
		if ($this->input->post('prosubmit') !== null)
		{
			$this->form_validation->set_rules('prTitle','Title','required');
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
            $author=$this->session->userid;
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
                'author' => '0',
                'author_id' => $author,
                'is_approved' => '0',
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
       			redirect('dashboard/submitdesign');
    	}
    	else
    	{
    		$this->session->set_flashdata('msg','<span class="text-danger">'.validation_errors().'</span>');
   			redirect('dashboard/submitdesign');
    	}
		}
	}

    public function withdraw($id){
    		$user= $this->session->userid;
    		if($this->db->where('product_id',$id)->where('author','0')->where('author_id',$user)->delete('product'))
    		{
    			$this->db->where('product_id',$id)->delete('product_description');
    			
    		}
    		redirect('dashboard/myitems');

    		
    	}

}