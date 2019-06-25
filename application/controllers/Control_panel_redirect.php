<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-21 10:58:30
 */

class Control_panel_redirect extends CI_Controller {
	    public function index(){
    	redirect('controlpanel/Dashboard');
}
}