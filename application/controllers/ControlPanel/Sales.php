<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-21 10:58:30
 */

class Sales extends CI_Controller {
		function __construct(){
        parent::__construct();
        $this->load->model('ControlPanel/Session_a');
        $this->Session_a->check_s();
    }
	    public function index(){

		     	$data['tab']='tab5';
		     	$data['prefixLN']='';
		     	$data['prefix']='';
		     	

		     	$data['title']='Sales';
		     	$data['t1']=array(
		     			'name'=> 'All Sales',
		     			'url' => ''

		     		);
		     	$data['t2']='';
		     	$data['t3']='';
		     	$data['t4']='';
		     	$data['t5']='';
		     	$data['t6']='';
		     	$data['t7']='';

     			$data['s_tab']='s_tab1';
     			$this->load->view('controlpanel/menu_view',$data);



		$this->load->model('ControlPanel/General_Model');
		// pagination code start
		$this->load->library('pagination');

		$config['base_url'] = site_url('controlpanel/sales');
        $config['total_rows'] = $this->db->get('sales')->num_rows();
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
        $query = $this->db->limit($config['per_page'], $data['segment'])->order_by('date', 'asc')->get('sales');
        $data['sales'] = $query->result_array();
        
        


        $this->load->view('controlpanel/sales_view',$data);

        $this->load->view('controlpanel/left_nav',$data);

}
}