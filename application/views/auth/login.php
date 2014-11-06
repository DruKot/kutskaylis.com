
<?php if (isset($error)) echo $error; ?>
<?=form_open('auth');?>

<h5>Логин</h5>
<input type="text" name="username" value="" size="20" />
    <?php echo form_error('username'); ?>

<h5>Пароль</h5>
<input type="password" name="password" value="" size="20" />
    <?php echo form_error('password'); ?>

<div><input type="submit" value="Войти" /></div>

</form>
