<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-12-31 20:04:52
 */

class Logout extends CI_Controller {
    function __construct(){
    	parent::__construct();
        
    }
    public function index(){
		$this->session->sess_destroy();
		redirect('home');
	}
}