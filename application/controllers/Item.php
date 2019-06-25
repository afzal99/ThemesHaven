<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2016-01-01 12:04:19
 */

class Item extends CI_Controller {
    
    function __construct(){
    	parent::__construct();
        
    }
     public function index(){
        redirect('home');
     }
     public function Template($id){
     	if($id == null)
     	{
     		redirect('home');
     	}
     	else 
     	{
            $this->db->from('product');
            $this->db->join('product_description','product.product_id = product_description.product_id');
            $query= $this->db->where('product.product_id',$id)->get();
            $result=$query->result_array();
            $data['result']=$result;

            $row=$query->num_rows();

            if($row == '1')
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
                foreach ($result as $key) {
                    $ca_id=$key['category_id'];
                    $tags=$key['tag'];
                    $author=$key['author'];
                    $author_id=$key['author_id'];
                }
                $ca=$this->db->where('id',$ca_id)->get('category');
                $caresult=$ca->result_array();
                foreach ($caresult as $cname) {
                    $data['ca_name']=$cname['name'];
                }

                $tag_ids = explode(',', $tags);


                for ($i=0; $i < sizeof($tag_ids); $i++) {
                    $que= $this->db->where('id',$tag_ids[$i])->get('tag');
                    $r=$que -> result_array();
                    foreach ($r as $tagname){
                        $tn=$tagname['name'];
                    }
                    $d[]['n']=$tn.', ';
                }
                $data['tagnames']=$d;

                //author
                    if($author == '0')
                    {
                        $author=$this->db->where('id',$author_id)->get('customer');
                        $data['author']=$author->result_array();
                    }
                //author
                $this->load->view('Items_View',$data);
            }
            else{
                redirect('home');
            }
		}

}
}