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
        $data['content'] = '<p><strong>Скайп -&nbsp;</strong>DruKot</p>
                            <p><a href="mailto:kutskaylis@gmail.com" target="_blank"><strong>Почта -&nbsp;</strong>kutskaylis@gmail.com</a></p>
                            <p><a href="http://vk.com/drukot" target="_blank"><strong>ВКонтакте</strong></p>
                            <p><a href="https://www.facebook.com/vkutskaylis" target="_blank"><strong>facebook</strong></p>
                            <p><a href="plus.google.com/114470174082301760149" target="_blank"><strong>Google+</strong></p>';
        
        $this->load->view('header');
        $this->Widget_model->get_widgets();
        $this->load->view('content', $data);
        $this->load->view('footer');
    }
    
    
}

?>
