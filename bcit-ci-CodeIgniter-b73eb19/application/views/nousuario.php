<!DOCTYPE html>
<html>

<ul>
	<?php echo validation_errors();
	//$string='index.php'.base_url().'form';
	 ?>

	<?php echo form_open('Welcome/login_validation'); ?>

	Usuario:&nbsp;<input type="text" name="username" class="form-control">
	 <span class="text-danger"><?php echo form_error('username'); ?></span><br>
Contraseña:&nbsp;<input type="password" name="password">
	 <span class="text-danger"><?php echo form_error('password'); ?></span><br>
<input type="submit" name="submit" value="Iniciar sesion">
	</form>
    </li>
		</ul>

</html>
