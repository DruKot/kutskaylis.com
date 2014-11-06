<?php

//Умная обрезка по колличеству слов, работает с utf-8
function cut_string($string, $length)
{
    //создаем переменную для сравнения
    $temp_string = $string;
    
    //режим по заданной длине
    $string = mb_substr($string, 0, $length,'UTF-8');
    
    //если строка изменилась, значит добавляем многоточие
    strcmp($temp_string, $string) ? $continue = '...' : $continue = '';
    
    //ищем последний пробел и режем до него
    $pos = mb_strrpos($string, ' ', 'UTF-8');
    $string = mb_substr($string, 0, $pos, 'UTF-8');
    
    //возвращаем результат с многоточием, или без
    return $string.$continue;
}

?>
