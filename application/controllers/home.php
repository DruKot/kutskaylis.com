<?php

/* ////////////////////////////
 * @author Vladislav Kutskaylis
 * @email kutskaylis@gmail.com
 * @site http://kutskaylis.com
*/ ////////////////////////////

class Home extends CI_Controller {

    function Home()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('instagram');
        $this->load->model('Widget_model','',true);
    }
    
    public function index()
    {
        $this->load->view('header');
        $this->Widget_model->get_widgets();
        $this->load->view('home');
        $this->load->view('footer');
    }
    
    
}

?>
