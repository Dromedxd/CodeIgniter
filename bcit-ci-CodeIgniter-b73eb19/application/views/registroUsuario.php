

<!DOCTYPE html>
<html lang="es">
<link rel = "stylesheet" type = "text/css"href = "<?php echo base_url(); ?>css/estilo.css">
<head>
	<?php
	include ("_titulo.php");
	?>
</head>
	<body>


	<h1><a href="<?php echo base_url(); ?>"><h1>TiendaOnline</h1></h1></a>
	<div id="cabecera">
		        <nav id="Inicio">
              <ul>
                  <li><a href="<?php echo base_url(); ?>"  style="font-size:large; padding-left: 3px;border:solid;border-color:black;border-width:2px;" >Inicio</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Welcome/perfil" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px">Perfil</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Welcome/informacion" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px">Informacion</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Welcome/contacto" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px">Contacto</a></li>
									<?php
									if(!isset($_SESSION['username'])){
										?>
									<li><a href="<?php echo base_url(); ?>index.php/Welcome/registro" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px">Registro</a></li>
									<?php
									}
										?>

              </ul>
		        </nav>
		</div>

		<section id="seccionregistro" >

			<div id="menuregistro">

			</div>

			<div id="menu">
				<ul id="registro">
					<h1>Registrarse</h1>


					<?php echo form_open(); ?>

					<h3>Usuario</h3>
					<?php echo form_error('username', '<div class="error" style="color:red;">', '</div>'); ?>
					<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" >

					<h3>Contraseña</h3>
					<?php echo form_error('password', '<div class="error" style="color:red;">', '</div>'); ?>
					<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" >

					<h3>Confirmar contraseña</h3>
					<?php echo form_error('passconf', '<div class="error" style="color:red;">', '</div>'); ?>
					<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" >

					<h3>Correo electronico</h3>
					<?php echo form_error('email', '<div class="error" style="color:red;">', '</div>'); ?>
					<input type="email" name="email" value="<?php echo set_value('email'); ?>" size="50" >

					<h3>Fecha de nacimiento</h3>
					<?php echo form_error('fechanacimiento', '<div class="error" style="color:red;">', '</div>'); ?>
					<input type="date" name="fechanacimiento" value="<?php echo set_value('fechanacimiento'); ?>" size="50" >

					<h3>Codigo postal</h3>
					<?php echo form_error('postal', '<div class="error" style="color:red;">', '</div>'); ?>
					<input type="number" name="postal" value="<?php echo set_value('postal'); ?>" style="margin-bottom:5px;" size="50" >


					<div><input type="submit" value="Submit" /></div>

					</form>
				</ul>
			</div>


		</section>
		<footer>
			<?php
			include ("_pie.php");
			?>
		</footer>
	</body>
	
</html>
