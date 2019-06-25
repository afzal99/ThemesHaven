<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-11 00:59:28
 */

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->view('admin/AdminHeaderView');
	}

	public function index(){
   		redirect('user/Profile/deshboard');
	}

	public function deshboard(){
		$data['title']='User Panel: Deshboard';
		$data['header']='Deshboard';
		$data['a1']= 'active';
		$data['a2']='';
		$data['a3']='';
		$data['a4']='';
		$data['a5']='';
		$data['a6']='';
		$data['a7']='';
		
		$this->load->view('user/Profile_View',$data);
	}

	public function ProfileSettings(){
		$data['header']='Profile Settings';
		$data['title']='User Panel: Profile Settings';
		$data['a1']= '';
		$data['a2']='active';
		$data['a3']='';
		$data['a4']='';
		$data['a5']='';
		$data['a6']='';
		$data['a7']='';

		$this->load->view('user/Profile_View',$data);
	}

	public function AccountSettings(){
		$data['title']='User Panel: Account Settings';
		$data['header']='Account Settings';
		$data['a1']= '';
		$data['a2']='';
		$data['a3']='active';
		$data['a4']='';
		$data['a5']='';
		$data['a6']='';
		$data['a7']='';

		$this->load->view('user/Profile_View',$data);
	}

	public function Downloads(){
		$data['title']='User Panel: Downloads';
		$data['header']='Downloads';
		$data['a1']= '';
		$data['a2']='';
		$data['a3']='';
		$data['a4']='active';
		$data['a5']='';
		$data['a6']='';
		$data['a7']='';

		$this->load->view('user/Profile_View',$data);
	}

	public function Favourites(){
		$data['title']='User Panel: Favourites';
		$data['header']='Favourites';
		$data['a1']= '';
		$data['a2']='';
		$data['a3']='';
		$data['a4']='';
		$data['a5']='active';
		$data['a6']='';
		$data['a7']='';

		$this->load->view('user/Profile_View',$data);
	}

	public function Uploads(){
		$data['title']='User Panel: Uploads';
		$data['header']='Uploads';
		$data['a1']= '';
		$data['a2']='';
		$data['a3']='';
		$data['a4']='';
		$data['a5']='';
		$data['a6']='active';
		$data['a7']='';

		$this->load->view('user/Profile_View',$data);
	}

	public function Statement(){
		$data['title']='User Panel: Statement';
		$data['header']='Statement';
		$data['a1']= '';
		$data['a2']='';
		$data['a3']='';
		$data['a4']='';
		$data['a5']='';
		$data['a6']='';
		$data['a7']='active';

		$this->load->view('user/Profile_View',$data);
	}
	
	
	



}