<?php

/* ////////////////////////////
 * @author Vladislav Kutskaylis
 * @email kutskaylis@gmail.com
 * @site http://kutskaylis.com
*/ ////////////////////////////

class My_Work extends CI_Controller {
    
    function My_Work()
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
        $this->load->view('my_work');
        $this->load->view('footer');
    }
    
    
}

?>
