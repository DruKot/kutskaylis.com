
<?=form_open('auth/registr');?>

<h5>Логин</h5>
<input type="text" name="username" value="" size="20" />
    <?php echo form_error('username'); ?>

<h5>Пароль</h5>
<input type="text" name="password" value="" size="20" />
    <?php echo form_error('password'); ?>

<h5>Подтверждение пароля</h5>
<input type="text" name="passconf" value="" size="20" />
    <?php echo form_error('passconf'); ?>

<h5>Email</h5>
<input type="text" name="email" value="" size="20" />
    <?php echo form_error('email'); ?>
<div><input type="submit" value="Отправить" /></div>

</form>
