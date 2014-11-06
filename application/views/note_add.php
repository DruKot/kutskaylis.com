
<div id="content">
    <?php
        echo "<h1>Добавление записи</h1>";
        echo form_open('admin/note_add'); // здесь обработчик добавления комментария
    ?>
    <br />
    <div>
        <input type="text" id="title" name="title" value="Заголовок"/>
    </div>
    <br />
    <?=tinymce();?>
    <div>
        <textarea name="body" id="body" rows="20" cols="80">Текст записи</textarea>
    </div>
    <br />
    <input type="submit" value="Добавить запись" /> 
    <?=form_close();?> 
</div>
