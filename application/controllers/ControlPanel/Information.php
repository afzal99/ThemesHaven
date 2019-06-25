<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @authors ahmed_monjur (ahmed.monjur21@gmail.com)
 * @date    2015-10-21 15:40:20
 */

class information extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('ControlPanel/Session_a');
        $this->Session_a->check_s();
        $this->load->library('ckeditor');
		$this->load->library('ckfinder');
    }
    public function index(){
        redirect('controlpanel/information/aboutus');
    }
    public function aboutus(){
                $data['tab']='tab6';
                $data['prefixLN']='../';
                $data['prefix']='';
                

                $data['title']='Informations';
                $data['t1']=array(
                        'name'=> 'About Us',
                        'url' => 'aboutus'

                    );
                $data['t2']=array(
                        'name'=> 'Delivery information',
                        'url' => 'deliveryinformation'
                    );
                $data['t3']=array(
                        'name'=> 'Privacy Policy',
                        'url' => 'privacyinformation'
                    );
                $data['t4']=array(
                        'name'=> 'Terms & Conditions',
                        'url' => 'termsAndconditions'
                    );;
                $data['t5']='';
                $data['t6']='';
                $data['t7']='';

                $data['s_tab']='s_tab1';
                $this->load->view('controlpanel/menu_view',$data);

                $data['page']="aboutus";
                $query=$this->db->where('id','1')->from('information')->get();
                $data['r']=$query->result_array();
                $this->load->view('controlpanel/info_view',$data);


                $this->load->view('controlpanel/left_nav',$data);

    }
    public function deliveryinformation(){
            $data['tab']='tab6';
            $data['prefixLN']='../';
            $data['prefix']='';
            

            $data['title']='Informations';
            $data['t1']=array(
                    'name'=> 'About Us',
                    'url' => 'aboutus'

                );
            $data['t2']=array(
                    'name'=> 'Delivery information',
                    'url' => 'deliveryinformation'
                );
            $data['t3']=array(
                    'name'=> 'Privacy Policy',
                    'url' => 'privacyinformation'
                );
            $data['t4']=array(
                    'name'=> 'Terms & Conditions',
                    'url' => 'termsAndconditions'
                );;
            $data['t5']='';
            $data['t6']='';
            $data['t7']='';

            $data['s_tab']='s_tab2';
            $this->load->view('controlpanel/menu_view',$data);

            $data['page']="deliveryinformation";
            $query=$this->db->where('id','2')->from('information')->get();
            $data['r']=$query->result_array();
            $this->load->view('controlpanel/info_view',$data);

            $this->load->view('controlpanel/left_nav',$data);
}
public function privacyinformation(){
            $data['tab']='tab6';
            $data['prefixLN']='../';
            $data['prefix']='';
            

            $data['title']='Informations';
            $data['t1']=array(
                    'name'=> 'About Us',
                    'url' => 'aboutus'

                );
            $data['t2']=array(
                    'name'=> 'Delivery information',
                    'url' => 'deliveryinformation'
                );
            $data['t3']=array(
                    'name'=> 'Privacy Policy',
                    'url' => 'privacyinformation'
                );
            $data['t4']=array(
                    'name'=> 'Terms & Conditions',
                    'url' => 'termsAndconditions'
                );;
            $data['t5']='';
            $data['t6']='';
            $data['t7']='';

            $data['s_tab']='s_tab3';
            $this->load->view('controlpanel/menu_view',$data);

            $data['page']="privacyinformation";
            $query=$this->db->where('id','3')->from('information')->get();
            $data['r']=$query->result_array();
            $this->load->view('controlpanel/info_view',$data);

            $this->load->view('controlpanel/left_nav',$data);
}
public function termsAndconditions(){
            $data['tab']='tab6';
            $data['prefixLN']='../';
            $data['prefix']='';
            

            $data['title']='Informations';
            $data['t1']=array(
                    'name'=> 'About Us',
                    'url' => 'aboutus'

                );
            $data['t2']=array(
                    'name'=> 'Delivery information',
                    'url' => 'deliveryinformation'
                );
            $data['t3']=array(
                    'name'=> 'Privacy Policy',
                    'url' => 'privacyinformation'
                );
            $data['t4']=array(
                    'name'=> 'Terms & Conditions',
                    'url' => 'termsAndconditions'
                );;
            $data['t5']='';
            $data['t6']='';
            $data['t7']='';

            $data['s_tab']='s_tab4';
            $this->load->view('controlpanel/menu_view',$data);

            $data['page']="termsAndconditions";
            $query=$this->db->where('id','4')->from('information')->get();
            $data['r']=$query->result_array();
            $this->load->view('controlpanel/info_view',$data);

            $this->load->view('controlpanel/left_nav',$data);
}
    
    public function update(){
        if($this->input->post('infosubmit') !== null)
        {
            $id=$this->input->post('id', TRUE);
            $page=$this->input->post('page', TRUE);
            $title=$this->input->post('title', TRUE);
            $des=$this->input->post('des', TRUE);

            $info=array(
                'title' => $title,
                'description' => $des
                );

            $this->db->where('id',$id)->update('information',$info);

            $this->session->set_flashdata('message','<p class="text-success" style="text-align:center;"> Updated Successfully</p>');
            redirect('controlpanel/information/'.$page.'');
        }
        else
        {
            $this->session->set_flashdata('message','<p class="text-danger" style="text-align:center;"> Update Failed</p>');
            redirect('controlpanel/information/aboutus');
        }
    }


}
?>