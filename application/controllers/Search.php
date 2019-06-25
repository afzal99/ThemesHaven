<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct(){
        parent::__construct();
    }
	public function action(){
		
			$key=$this->input->post('search',true);
			$query = $this->db->like('title',$key)->get('product');
			$results = $query->result_array();
			echo json_encode ($results);
			//echo $key;
	}
		public function result(){
			if ($this->input->post('category'))
			{
				$c=$this->input->post('category');
			}

			if ($this->input->post('ca'))
			{
			    $c = $this->input->post('ca');
			}


			$keyword=$this->input->post('search',true);  
			$this->db->from('product');
			$this->db->join('product_description','product.product_id = product_description.product_id');
			if(isset($c))
			{
				$query = $this->db->where_in('category_id',$c)->like('title',$keyword)->get();
			}
			else
			{
				$query = $this->db->like('title',$keyword)->get();
			 }

			$data['results'] = $query->result_array();
			$data['row']=$query->num_rows();
           	//all categories
                $ca_sn= $this->db->limit('9')->order_by('name')->get('category');
                $data['ca_sn']= $ca_sn->result_array();
            //all categories
			//all categories
			$q= $this->db->limit('9')->order_by('name')->get('category');
			$data['categories']= $q->result_array();
			//all categories
			//dropdown nav
                    $c_query=$this->db->limit(25)->order_by('name')->get('category');
                    $data['categories']=$c_query->result_array();

                    $tag_query=$this->db->limit(10)->get('tag');
                    $data['tags']=$tag_query->result_array();

            //dropdown nav
			//already liked
				if($this->session->userid)
				{
					$q= $this->db->where('customer_id',$this->session->userid)->get('favorite');
					$data['likeditems']= $q->result_array();
				}
			//already liked
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
			$data['name']='Search result';
			$data['searchkey']=' for "'.$keyword.'"';
			$this->load->view('search_result',$data);
	}

}