<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->helper('download');
        $this->load->model('Session');       
        $this->Session->check_s();
    }
	public function index(){
		redirect('home');

	}
	public function item($id){
		if($id != "")
		{
			$this->db->from('product');
			$this->db->join('product_description','product.product_id = product_description.product_id');
			$q=$this->db->where('product.product_id',$id)->get();
			$result=$q->result_array();

			if($result != "")
			{
				foreach ($result as $key){
					$title=$key['title'].'.zip';
					$is_paid=$key['price'];
					$link=$key['mainfile'];
				}
				
				if($this->session->userid !="")
				{
					$download_link=site_url().'site_elements/zipstore/'.$link;
					$data = file_get_contents($download_link);
					// echo $title.'<br/>';
					// echo $download_link;
					force_download($title, $data);
					// redirect($download_link);
				
				}
				else
				{
					redirect('home');
				}
			}
			else
			{
				redirect('home');
			}
			
		}
		else
		{
			redirect('home');
		}
	}
}