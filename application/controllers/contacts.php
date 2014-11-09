<?php

/* ////////////////////////////
 * @author Vladislav Kutskaylis
 * @email kutskaylis@gmail.com
 * @site http://kutskaylis.com
*/ ////////////////////////////

class Contacts extends CI_Controller {
    
    function Contacts()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('instagram');
        $this->load->library('session');
        $this->load->model('Widget_model','',true);
    }
    

    public function index()
    {  
        $this->load->view('header');
        $this->Widget_model->get_widgets();
        $this->load->view('contacts');
        $this->load->view('footer');
    }
    
    
}

?>
