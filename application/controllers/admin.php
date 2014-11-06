<?php

/* ////////////////////////////
 * @author Vladislav Kutskaylis
 * @email kutskaylis@gmail.com
 * @site http://kutskaylis.com
*/ ////////////////////////////

class Admin extends CI_Controller {
    
    function Admin()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('editor');
        $this->load->helper('twitter');
        $this->load->library('session');
        $this->load->model('Blog_model','',true);
        $this->load->model('Widget_model','',true);
        
        // проверяем наличие принака залогинивания в сессии
        // если залогинились - выполняем вызванную функцию
        if ($this->session->userdata('logon') != '') return;
        // переход к обработке логина
        if ($this->uri->segment(2)==='login') return;
        // редирект на логин, если залогинивания не было
        redirect('admin/login');
    }
    
    //Сброс авторизации
    function logoff()
    {
        $this->session->sess_destroy();  // обнуляем сессию
        redirect(''); // редирект на главную страницу
    }
    
    //Добавление новой записи
    function note_add()
    {
        if (isset($_POST['title'])) // проверяем были ли отосланы данные формы
        {
            $this->Blog_model->insert_note();  // если данные были приняты - записываем их в БД
            redirect('blog');  //  редирект в начало
        } 
        else  // если данных нет - выводим форму для добавления новой записи в блог
        {
            //Сборка страницы
            $this->load->view('header');
            $this->Widget_model->get_widgets();
            $this->load->view('note_add');
            $this->load->view('footer');
        }
        
    }
    
    //Изменение существующей записи
    function note_update()
    {  
        if (isset($_POST['id'])) // проверяем были ли отосланы данные формы
        {
            $this->Blog_model->update_note();
            redirect('admin/note_update/'.$_POST['id']);
        } 
        else
        {
            //Получение записи по 3-му сегменту url
            $id     = $this->uri->segment(3);
            $data   = $this->Blog_model->get_note($id);

            //Сборка страницы
            $this->load->view('header');
            $this->Widget_model->get_widgets();
            $this->load->view('note_update', array('data' => $data));
            $this->load->view('footer');
        }
    }
    
    //Удаление выбраного комментария
    function comment_delete()
    {
        $id = $this->uri->segment(3);
        $this->Blog_model->comment_delete($id);
        redirect('blog');
    }
    
    //Удаление выбраной записи
    function note_delete()
    {
        $id = $this->uri->segment(3);
        $this->Blog_model->note_delete($id);
        redirect('blog');
    }
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////Заполнение тестовыми записями///////////////////////////////////////////////////
    function note_add_test()
    {
        for ($i=1;$i<50;$i++)
        {
            $this->db->insert('notes',array('title'=>'TITLE #'.$i,'body'=>'#'.$i.' Lorem ipsum dolor'));
            for ($j=1;$j<5;$j++)
            {
                $this->db->insert('comments',array('note_id'=>$i,'author'=>'NAME #'.$j,'body'=>'#'.$j.'quis autem'));
            }
        }     
        redirect('');  //редирект в начало
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
}

?>
