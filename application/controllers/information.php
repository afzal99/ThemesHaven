<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2016-01-14 10:40:19
 */

class Information extends CI_Controller {
    function __construct(){
    	parent::__construct();
                
    }
    public function index(){
    	redirect('information/aboutus');
	}
	public function aboutus(){
		$data['title']="About Us | ThemesHaven";
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
		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav

		$query=$this->db->where('id','1')->from('information')->get();
		$data['result']=$query->result_array();

		$this->load->view('information_view',$data);
	}
	public function deliveryInformation(){
		$data['title']="Delivery Information | ThemesHaven";
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
		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav

		$query=$this->db->where('id','2')->from('information')->get();
		$data['result']=$query->result_array();

		$this->load->view('information_view',$data);
	}

	public function privacy_policy(){
		$data['title']="Privacy Policy | ThemesHaven";
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
		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav

		$query=$this->db->where('id','3')->from('information')->get();
		$data['result']=$query->result_array();

		$this->load->view('information_view',$data);
	}
	public function termsandconditions(){
		$data['title']="Terms & Conditions | ThemesHaven";
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
		//dropdown nav
            $c_query=$this->db->limit(25)->order_by('name')->get('category');
            $data['categories']=$c_query->result_array();

            $tag_query=$this->db->limit(10)->get('tag');
            $data['tags']=$tag_query->result_array();
        //dropdown nav

		$query=$this->db->where('id','4')->from('information')->get();
		$data['result']=$query->result_array();

		$this->load->view('information_view',$data);
	}



}