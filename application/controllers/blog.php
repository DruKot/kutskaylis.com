<?php

/* ////////////////////////////
 * @author Vladislav Kutskaylis
 * @email kutskaylis@gmail.com
 * @site http://kutskaylis.com
*/ ////////////////////////////

class Blog extends CI_Controller {
    
    function Blog()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('note_cut');
        $this->load->helper('instagram');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Blog_model','',true);
        $this->load->model('Widget_model','',true);
    }

    //Главная страница блога
    public function index()
    {
        // Настройка пейджера
        $config['base_url'] = '/blog/index/'; // путь к страницам в пейджере
        $config['total_rows'] = $this->Blog_model->num_of_notes(); // всего записей
        $config['per_page'] =  10;   // количество записей на странице
        $config['num_links'] = 5;    // количество ссылок в пейджере
        $config['uri_segment'] = 3;  // указываем где в URL номер страницы
        $this->pagination->initialize($config);
        $data['pager'] = $this->pagination->create_links();
        
        //Получение списка записей по 10 на страницу
        $data['content'] = $this->Blog_model->get_notes($this->uri->segment(3));
        
        
        //Сборка страницы
        $this->load->view('header');
        $this->Widget_model->get_widgets();
        $this->load->view('notelist', $data);
        $this->load->view('footer');
    }
    
    //Страница просмотра записи
    public function note()
    {        
        //Получение записи и комментариев по 3-му сегменту url
        $id         = $this->uri->segment(3);
        $notes      = $this->Blog_model->get_note($id);
        $comments   = $this->Blog_model->get_comments($id);
        $c_num      = $this->Blog_model->get_comments_num($id); //Получение количества комментариев для данной записи
        $tags       = $this->Blog_model->get_tags($id);
        
        //Сборка страницы
        $this->load->view('header');
        $this->Widget_model->get_widgets();
        $this->load->view('note', array('notes' => $notes, 'comments' => $comments, 'c_num' => $c_num, 'tags' => $tags));
        $this->load->view('footer');
    }

    //Добавление комментариев
    function comment_add()
    {
        //проверка вводимой информации
        $this->form_validation->set_error_delimiters('<span style="color: red;">', '</span>');
        $this->form_validation->set_rules('author', 'Автор',
                'trim|required|min_length[3]|max_length[60]|xss_clean');
        $this->form_validation->set_rules('body', 'Сообщение',
                'trim|required|min_length[10]|xss_clean');
        
        //Если введеная информация не в порятке редирект в ту же запись
        if ($this->form_validation->run() == FALSE)
        {
            redirect('blog/note/'.$_POST['note_id']);
        }
        //Если в порядке добавить комментарий и редирект в ту же запись
        else
        {
            $this->Blog_model->insert_comment();
            redirect('blog/note/'.$_POST['note_id']);
        }
                            //Вывод ошибок введеных данных не работает,
                            // позже будет реализован с помощью Ajax
    }
    
}

?>
