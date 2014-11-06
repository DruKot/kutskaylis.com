
<div id="content">
    <?php
        foreach ($content->result() as $row)
        {
            echo '<div class="note_prev">';
            echo "<p class='date'>".$row->date."</p>";
            echo "<h1>".anchor('blog/note/'.$row->id,$row->title)."</h1>";
            echo "<p>".cut_string($row->body,900)."</p>";
            echo "<h2>".anchor('blog/note/'.$row->id,'Читать->')."</h2>";
            echo '<div class="note_discription">';
            echo "<h1 class='c_title'>".$this->Blog_model->get_comments_num($row->id)."</h1>";
            echo '<p class="tags">';
            $tags = $this->Blog_model->get_tags($row->id);
            foreach ($tags as $row2)
                echo $row2->tag;
            echo '</p>';
            echo '</div>';
            echo '</div>';
        }

        echo  "<div>".$pager."</div> ";
    ?>
</div>