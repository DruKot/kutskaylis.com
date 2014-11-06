<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function tinymce() 
{
   return '      
       <script type="text/javascript" src="/data/plugins/tiny_mce/tiny_mce.js"></script>       
       <script type="text/javascript">tinyMCE.init({mode : "textareas",language : "ru"});</script>   
   ';
}
     
function ckeditor()
{
    return '
        <script type="text/javascript"> src="/data/plugins/ckeditor/ckeditor.js"></SCRIPT>        
        <script type="text/javascript"> 
            CKEDITOR.replace( "body", {
                language: "ru",
                uiColor: "#14B8C4",
                toolbar = "Basic"; //функциональность редактора, Basic-минимум, Full-максимум
            });
        </script>
    ';
}

?>
