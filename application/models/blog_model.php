<?php

/* ////////////////////////////
 * @author Vladislav Kutskaylis
 * @email kutskaylis@gmail.com
 * @site http://kutskaylis.com
*/ ////////////////////////////

class Blog_model extends CI_Model {

    function _construct()
    {
        parent::_construct();
    }
    
    //Получение следующих 10 записей после записи с id = $from
    function get_notes($id)
    {
        $from=intval($id); // выделяем из URL номер первой записи на странице
        $this->db->limit(10,$from); // устанавливаем количество записей на странице
        $this->db->order_by("id", "desc"); // устанавливаем порядок следования записей
        
        return $this->db->get('notes');
    }
    
    //Получение записи по id
    function get_note($id)
    {
        $query = $this->db->query('SELECT * FROM vk_notes WHERE id = '.$id);
        return $query->result();
    }
    
    function num_of_notes()
    {
        $query = $this->db->count_all('notes');
        return $query;
    }

    //Добавление новой записи
    function insert_note()
    {
        $this->title    = $_POST['title'];
        $this->body     = $_POST['body'];

        $this->db->insert('notes', $this);
    }

    //Изменение записи
    function update_note()
    {
        $this->title    = $_POST['title'];
        $this->body     = $_POST['body'];

        $this->db->update('notes', $this, array('id' => $_POST['id']));
    }
       
    //удаление записи по id
    function note_delete($id)
    {
        $this->db->query('DELETE FROM vk_comments WHERE note_id ='.$id);
        $this->db->query('DELETE FROM vk_notes WHERE id ='.$id);
    }
    
    //получение комментариев
    function get_comments($id)
    {
        $query = $this->db->query('SELECT * FROM vk_comments WHERE note_id = '.$id);
        return $query->result();
    }
    
    //Получение колличества комментариев
    function get_comments_num($id)
    {
        $query = $this->db->query('SELECT * FROM vk_comments WHERE note_id = '.$id);
        return $query->num_rows();
    }
    
    //добавление комментария
    function insert_comment()
    {
        $this->note_id  = $_POST['note_id'];
        $this->author   = $_POST['author'];
        $this->body     = $_POST['body'];

        $this->db->insert('comments', $this);
    }
    
    //удаление комментария по id
    function comment_delete($id)
    {
        $this->db->query('DELETE FROM vk_comments WHERE id ='.$id);
    }
    
    //получение тегов
    function get_tags($id)
    {
        $query = $this->db->query('SELECT * FROM vk_tags WHERE id = (SELECT tag_id FROM vk_tags_relations WHERE note_id ='.$id.')');
        return $query->result();
    }
   
}

?>
