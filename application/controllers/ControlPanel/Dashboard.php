<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-16 01:20:30
 */

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('ControlPanel/Session_a');
        $this->Session_a->check_s();
    }
    
    public function index(){
    	redirect('controlpanel/Dashboard/General');
}
    public function General(){
            

     		$data['tab']='tab1';
            $data['prefixLN']='../';
     		$data['prefix']='';
     		$this->load->view('controlpanel/left_nav',$data);

     		$data['title']='Dashboard';
     		$data['s_tab']='s_tab1';

     		$data['t1']=array(
                        'name'=> 'General',
                        'url' => 'General'

                    );
            $data['t2']='';  
            $data['t3']='';
            $data['t4']='';
            $data['t5']='';
            $data['t6']='';
            $data['t7']='';


            $data['category'] = $this->db->get('category')->num_rows();
            $data['product'] = $this->db->get('product')->num_rows();
            $data['customer'] = $this->db->get('customer')->num_rows();
            
            
            $this->db->from('product');
            $this->db->join('product_description','product.product_id = product_description.product_id');
            $q=$this->db->where('is_approved','0')->order_by('date_added','desc')->limit(10)->get();
            $data['pending_products']=$q->result_array();

            $cquery=$this->db->select('id,name')->get('category');
            $data['ca']=$cquery->result_array();

            $cus=$this->db->select('id,username')->get('customer');
            $data['cus']=$cus->result_array();

            $sales_q=$this->db->order_by('date','desc')->limit(10)->get('sales');
            $data['sales']=$sales_q->result_array();

            $ca=$this->db->select('id,name')->get('category');
            $data['category']=$ca->result_array();

            $data['w_rows']= $q->num_rows();
            $data['s_rows']= $sales_q->num_rows();



     		$this->load->view('controlpanel/menu_view',$data);
     		$this->load->view('controlpanel/dashboard_view',$data);
     }



}
