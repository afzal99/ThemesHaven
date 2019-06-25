<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHeader extends CI_Controller {
	public function index(){
		$this->load->view('admin/AdminHeaderView');
	}
}