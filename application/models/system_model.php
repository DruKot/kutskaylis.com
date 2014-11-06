<?php

/* ////////////////////////////
 * @author Vladislav Kutskaylis
 * @email kutskaylis@gmail.com
 * @site http://kutskaylis.com
*/ ////////////////////////////

class System_model extends CI_Model {

    function _construct()
    {
        parent::_construct();
    }
    
    //Добавление нового пользователя
    function user_insert()
    {
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $this->email    = $_POST['email'];

        $this->db->insert('users', $this);
    }
    
    function auth()
    {
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        
        $query = $this->db->query("SELECT email FROM vk_users WHERE username = '".$username."' AND password = '".$password."'");
        
        foreach ($query->result() as $row)
           return $email = $row->email;
    }
    
}

?>
