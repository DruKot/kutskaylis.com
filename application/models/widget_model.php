<?php

/* ////////////////////////////
 * @author Vladislav Kutskaylis
 * @email kutskaylis@gmail.com
 * @site http://kutskaylis.com
 * 
 * Фиговая затея использовать для виджетов модель, но не хелпер,
 * ни библиотеку с виджетами реализовать не получилось,
 * так как нужен достум и к базе и к отображению и интегрировалось парой строк
 * если станет известно какое-нибудь решение - срочно реализовать!
 * 
*/ ////////////////////////////

class Widget_model extends CI_Model {

    function _construct()
    {
        parent::_construct();
    }
    

    
    //Виджет выводящий последние записи в блоге
    function last_notes($num)
    {
        $this->db->limit($num); // устанавливаем количество записей на странице
        $this->db->order_by("date", "desc"); // устанавливаем порядок следования записей
        
        return $this->db->get('notes');
                            //Берет сразу всю запись, тк позже будет всплывать
                            //окно с превью записи при наведении мыши
    }
    
    function get_widgets()
    {
        $data['notes'] = $this->last_notes(3);
                
        $this->load->view('widgets', $data);
    }
    
}

?>
