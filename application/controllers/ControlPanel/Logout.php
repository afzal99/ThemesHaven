<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function index(){
		$this->load->model('ControlPanel/Logout_model');
        $this->Logout_model->ses_destroy();

	}
}
?>