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
        $this->load->helper('twitter');
        $this->load->model('Widget_model','',true);
    }
    
    public function index()
    {        
        $data['content'] = "<h1 class='n_title'>Добро пожаловать</h1><p><p>Данный сайт - это в первую очередь моя 'рабочая тетрадь'. Тут я пробую все свои навыки в программировании, испытываю интересные фичи, записываю нужную мне информацию в виде блога, копирую интересные мне статьи.</p>
                            <p>Вы можете чувствовать себя тут свободно, можете тыкать, пробовать, ломать.</p>
                            <p>Весь код есть в открытом доступе <a title='github' href='https://github.com/DruKot/kutskaylis.com.git' target='_blank'>тут</a>,
                            все вопросы можете задавать <a title='e-mail' href='mailto:kutskaylis@gmail.com' target='_blank'>сюда</a>.</p>";

        $this->load->view('header');
        $this->Widget_model->get_widgets();
        $this->load->view('content', $data);
        $this->load->view('footer');
    }
    
    
}

?>
