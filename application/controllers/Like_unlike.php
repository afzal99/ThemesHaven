<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like_unlike extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('Session');  
        $this->Session->check_s();
    }
	public function like($user_id,$product_id){
		if($this->session->userid != "" && $this->session->userid != "0")
		{
			$q=$this->db->where('product_id',$product_id)->where('customer_id',$user_id)->get('favorite');
			$row=$q->num_rows();
			if($row=="0")
			{
				$data = array(
					'product_id' => $product_id,
					'customer_id' => $user_id
					);
				$this->db->where('product_id',"0")->where('customer_id',"0")->delete('favorite');
				$this->db->insert('favorite',$data);

				$q=$this->db->where('product_id',$product_id)->get('product_description');
				$r=$q->result_array();
				foreach ($r as $key) {
					$x=$key['total_favorites'];
				}
				$n=$x+'1';
				$u = array(
					'total_favorites' => $n
					);
				$this->db->where('product_id',$product_id)->update('product_description',$u);
			}
		}
		else{
			redirect('Signin');
		}
	}
	public function unlike($user_id,$product_id){
			$q=$this->db->where('product_id',$product_id)->where('customer_id',$user_id)->get('favorite');
			$row=$q->num_rows();
			if($row>"0")
			{
				$this->db->where('product_id',$product_id)->where('customer_id',$user_id)->delete('favorite');

				$q=$this->db->where('product_id',$product_id)->get('product_description');
				$r=$q->result_array();
				foreach ($r as $key) {
					$x=$key['total_favorites'];
				}
				$n=$x-'1';
				$u = array(
					'total_favorites' => $n
					);
				$this->db->where('product_id',$product_id)->update('product_description',$u);
			}

	}

}