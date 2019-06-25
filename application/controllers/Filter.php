<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2016-01-01 12:04:19
 */

class Filter extends CI_Controller {
    function __construct(){
    	parent::__construct();
        
    }
    public function index(){
    	redirect('home');
    }
    public function scale($name){
	 	if($name == null)
	 	{
	 		redirect('home');
	 	}
	 	else 
	 	{
	     	$data['name'] = $name;
            //dropdown nav
                $c_query=$this->db->limit(25)->order_by('name')->get('category');
                $data['categories']=$c_query->result_array();

                $tag_query=$this->db->limit(10)->get('tag');
                $data['tags']=$tag_query->result_array();

            //dropdown nav
            //all categories
                    $ca_sn= $this->db->limit('9')->order_by('name')->get('category');
                    $data['ca_sn']= $ca_sn->result_array();
            //all categories
			//already liked
				if($this->session->userid)
				{
					$q= $this->db->where('customer_id',$this->session->userid)->get('favorite');
					$data['likeditems']= $q->result_array();
				}
			//already liked
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
			if($name=='category')
			{
				$caid=$this->uri->segment(4);
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
				$popularitems= $this->db->where('category_id',$caid)->where('is_approved','1')->limit(30)->get();
				$r = $popularitems->result_array();
				$data['results'] = $r;
				$data['row'] = $popularitems->num_rows();

				$caquery=$this->db->where('id',$caid)->get('category');
				$category=$caquery->result_array();
				foreach ($category as $key) {
					$data['name']=$key['name'];
				}

			}

			else if($name=='popularitems')
			{
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
		     	//Popular Items
		     	$data['name']='Popular Items';
				$this->db->from('product');
				$this->db->join('product_description','product.product_id = product_description.product_id');
				$popularitems= $this->db->where('is_approved','1')->order_by('total_favorites','desc')->limit(30)->get();
				$data['results'] = $popularitems->result_array();
				$data['row'] = $popularitems->num_rows();
				//Popular Items
			}
			else if($name=='featureditems')
			{
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
				
				// Featured Items
				$data['name']='Featured Items';
				$this->db->from('product');
				$this->db->join('product_description','product.product_id = product_description.product_id');
				$this->db->join('featured','product.product_id = featured.product_id');
				$featureditems= $this->db->where('is_approved','1')->limit(30)->get();
				$data['results'] = $featureditems->result_array();
				$data['row'] = $featureditems->num_rows();
				// Featured Items
			}
			else if($name=='newitems')
			{
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
				//New Items
				$data['name']='New Items';
				$this->db->from('product');
				$this->db->join('product_description','product.product_id = product_description.product_id');
				$newitems= $this->db->where('is_approved','1')->order_by('date_added','desc')->limit(24)->get();
				$data['results'] = $newitems->result_array();
				$data['row'] = $newitems->num_rows();
				//New Items
			}
			else if($name=='freeitems')
			{
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
				//free Items
				$data['name']='Free Items';
				$this->db->from('product');
				$this->db->join('product_description','product.product_id = product_description.product_id');
				$freeitems= $this->db->where('is_approved','1')->where('price','Free')->limit(12)->get();
				$data['results'] = $freeitems->result_array();
				$data['row'] = $freeitems->num_rows();
				//free Items
			}
			else
			{
	 			redirect('home');
			}

			$this->load->view('filter_view',$data);
		}
	}
}