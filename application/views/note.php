
<div id="content">    
    <?php
        foreach ($notes as $row1)
        {
          echo "<h1 class='n_title'>".$row1->title."</h1>";
          echo "<p>".$row1->body."</p>";
          $id = $row1->id;
        }
        
        echo '<div class="note_pannel">';
        echo '<p class="tags">';
            $tags = $this->Blog_model->get_tags($row1->id);
            foreach ($tags as $row3)
                echo $row3->tag;
            echo '</p>';
        if ($this->session->userdata('logon'))
        {
            echo anchor('admin/note_update/'.$id,'<img src="/data/img/red.png"/>');
            echo anchor('admin/note_delete/'.$id,'<img src="/data/img/del.png"/>');
        }
        echo '</div>';
        
        echo anchor('blog','Вернуться'); // возврат на главную страницу
    ?>
    <div id="comments">
        <?php
            echo "<h1 class='c_title' >Комментарии(".$c_num.")</h1>";

            foreach ($comments as $row2)
            {
              echo "<h4 class='author'>".$row2->author."</h4>";
              echo "<p class='date'>".$row2->date."</p>";
              echo "<p class='message'>".$row2->body."</p>";
              if ($this->session->userdata('logon'))
                echo anchor('admin/comment_delete/'.$row2->id,'<img src="/data/img/del.png"/>'); // возврат на главную страницу
            echo '<hr />';
            }

            echo "<br /><h1>Оставить свой комментарий</h1>";
            echo form_open('blog/comment_add');
            echo form_hidden('note_id', $this->uri->segment(3));           
        ?>
        <br />
        <p><input type="text" id="author" name="author" value="Имя"/></p>
        <?php echo form_error('author'); ?>
        <p><textarea name="body" id="comment_body" rows="10" cols="40">Текст сообщения</textarea></p>
        <?php echo form_error('body'); ?>
        <p><input type="submit" value="Добавить комментарий" /></p>
        <? echo form_close(); ?>
    </div>
</div>
