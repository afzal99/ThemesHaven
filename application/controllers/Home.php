<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
        parent::__construct();
        // $this->load->model('Session');        No need in this page
        // $this->Session->check_s();
    }
	public function index(){
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
		//all categories
		$q= $this->db->limit('9')->order_by('name')->get('category');
		$data['categories']= $q->result_array();


		//all categories
		//already liked
			if($this->session->userid)
			{
				$q= $this->db->where('customer_id',$this->session->userid)->get('favorite');
				$data['likeditems']= $q->result_array();
			}
		//already liked
		// Featured Items
		$this->db->from('product');
		$this->db->join('product_description','product.product_id = product_description.product_id');
		$this->db->join('featured','product.product_id = featured.product_id');
		$featureditems= $this->db->limit(12)->get();
		$data['featureditems'] = $featureditems->result_array();
		$data['featured_row'] = $featureditems->num_rows();
		// Featured Items

		//Popular Items
		$this->db->from('product');
		$this->db->join('product_description','product.product_id = product_description.product_id');
		$popularitems= $this->db->where('is_approved','1')->order_by('total_favorites','desc')->limit(12)->get();
		$data['popularitems'] = $popularitems->result_array();
		//Popular Items

		//New Items
		$this->db->from('product');
		$this->db->join('product_description','product.product_id = product_description.product_id');
		$newitems= $this->db->where('is_approved','1')->order_by('date_added','desc')->limit(12)->get();
		$data['newitems'] = $newitems->result_array();
		//New Items

		//free Items
		$this->db->from('product');
		$this->db->join('product_description','product.product_id = product_description.product_id');
		$freeitems= $this->db->where('is_approved','1')->where('price','Free')->limit(12)->get();
		$data['freeitems'] = $freeitems->result_array();
		$data['freeitems_row'] = $freeitems->num_rows();
		//free Items

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
		$this->load->view('Home_view',$data);
	}
}
