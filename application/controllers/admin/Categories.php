<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-05 19:04:35
 */

class Categories extends CI_Controller {
   public function index(){

    redirect('admin/categories/allcategories');
}
    public function allcategories(){
   		$this->load->view('admin/AdminHeaderView');

      $this->load->model('admin/Category_Model');
// pagination code start
        $this->load->library('pagination');

        $config['base_url'] = site_url('admin/categories/allcategories');
        $config['total_rows'] = $this->db->get('tbl_category')->num_rows();
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

        if ($this->input->get('page')) {
            $sgm = (int) trim($this->input->get('page'));
            $data['segment'] = $config['per_page'] * ($sgm - 1);
        } else {
            $data['segment'] = 0;
        }

        $this->pagination->initialize($config);

        $query = $this->db->limit($config['per_page'], $data['segment'])->order_by('name', 'asc')->get('tbl_category');
        $data['categories'] = $query->result_array();





// pagination code ends
      // $data['categories']=$this->Category_Model->get_all('tbl_category');



      $this->load->view('admin/categories_view',$data);
	 	  $this->load->view('Footer_View');






    }
    public function addNew(){



      $this->load->view('admin/AdminHeaderView');
      $this->load->view('admin/new_category');
		  $this->load->view('Footer_View');

    }
   public function Create(){

        $data['title'] = 'Create New Category';
        
      if($this->input->post('caName'))
      {
          $caname = $this->input->post('caName');
          $id='10';

          $info = array(
             'name' => $caname
          );
          $this->db->insert('tbl_category',$info);

          $this->session->set_flashdata('msg','Category Added Successfully');

      
         redirect('admin/Categories/addNew');

      }


     }
}