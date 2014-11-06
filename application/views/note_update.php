
<div id="content">
    <h1>Изменение записи</h1>
    <?=form_open('admin/note_update') ;?>
    <?php foreach ($data as $row): ?>
    <br />
    <?=form_hidden('id', $row->id);?>
    <div>
        <input type="text" id="title" name="title" value="<?=$row->title?>"/>
    </div>
    <br />
    <?=tinymce();?>
    <div>
        <textarea name="body" id="body" rows="20" cols="80"><?=$row->body?></textarea>
    </div>
    <br />
    <input type="submit" value="Изменить запись" />
    <?php endforeach; ?> 
    <?=form_close();?> 
</div>
