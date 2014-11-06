    
<div id="menu">
    <ul>
        <?php
            echo "<li>".anchor('home','Главная')."</li>";
            echo "<li>".anchor('blog','Блог')."</li>";
            echo "<li>".anchor('my_work','Мои работы')."</li>";
            echo "<li>".anchor('contacts','Контакты')."</li>";
        ?>
    </ul>
</div>

<div id="login">
    <?php
        if(!$this->session->userdata('logon'))
            echo "<p>".anchor('auth','Войти')." ";
        if ($this->session->userdata('logon'))
        {
            echo " ".anchor('admin/logoff','Выйти')." ";
            echo " ".anchor('admin/note_add','Добавить запись')."</p>";
        }     
    ?>
</div>
    
<div id="widgets">
    <div class="widget">
        <h1 class="title">Последние записи:</h1>
        <?php
        foreach ($notes->result() as $row)
            {
                echo '<div id="last_note">';
                echo "<h1>".anchor('blog/note/'.$row->id,$row->title)."</h1>";
                echo "<p class='date'>".$row->date."</p>";
                echo '</div>';
            }
        ?>
    </div>
    <div class="widget">
        <h1 class="title">Я в Instagram:</h1>
        <?=instagramm();?>
    </div>
</div>

