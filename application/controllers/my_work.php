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
        $this->load->helper('twitter');
        $this->load->library('session');
        $this->load->model('Widget_model','',true);
    }
    

    public function index()
    {
        $data['content'] = '<h1>Фотогаллерея находится в разработке...</h1>';
        
        $this->load->view('header');
        $this->Widget_model->get_widgets();
        $this->load->view('content', $data);
        $this->load->view('footer');
    }
    
    
}

?>
