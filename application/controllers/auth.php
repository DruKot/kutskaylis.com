<?php

/* ////////////////////////////
 * @author Vladislav Kutskaylis
 * @email kutskaylis@gmail.com
 * @site http://kutskaylis.com
*/ ////////////////////////////

class Auth extends CI_Controller {
	
    //Регистрация пользователя
    function registr()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('System_model','',true);
        $this->load->library('form_validation');
        
        $this->form_validation->set_error_delimiters('<span style="color: red;">', '</span>');

        $this->form_validation->set_rules('username', 'Логин',
                'trim|required|min_length[3]|max_length[12]|is_unique[users.username]|xss_clean');
        $this->form_validation->set_rules('password', 'Пароль', 'trim|required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'Подтверждение пароля', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/registr');
        }
        else
        {
            $this->system_model->user_insert();
            $this->load->view('auth/success');
        }
    }
    
    function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('system_model','',true);
        $this->load->library('form_validation');
        $this->load->library('session');
        
        $this->form_validation->set_error_delimiters('<span style="color: red;">', '</span>');

        $this->form_validation->set_rules('username', 'Логин','required|min_length[3]|max_length[20]|xss_clean');
        $this->form_validation->set_rules('password', 'Пароль', 'required|md5');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/login');
        }
        else
        {
            $result = $this->system_model->auth();
            if ($result == 'kutskaylis@gmail.com')
            {
                // записываем в сессию признак логона
                $session_data = array('logon' => '1');
                $this->session->set_userdata($session_data);

                redirect(''); // редирект на главную страницу
            }
            else
            {
                $data = array('error' => 'Неверный логин / пароль');
                $this->load->view('auth/login', $data);
            }
        }
    }
}

?>
