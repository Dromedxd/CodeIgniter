

<!DOCTYPE html>
<html lang="es">
<link rel = "stylesheet" type = "text/css"href = "<?php echo base_url(); ?>css/estilo.css">
<head>
	<?php
	include ("_titulo.php");
	?>
</head>
	<body>


	<h1><a href="<?php echo base_url(); ?>"><h1> TiendaOnline</h2></a></h1>		
		<aside id="usuario">
			<?php
			if(isset($_SESSION['username'])){
        include ("usuario.php");
      }else{
			include ("nousuario.php");
      }
			?>
		</aside>
	<div id="cabecera">
		        <nav id="Inicio">
              <ul>
                  <li><a href="<?php echo base_url(); ?>"  style="font-size:large; padding-left: 3px;border:solid;border-color:black;border-width:2px;" >Inicio</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Welcome/perfil" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px;background-color:green;">Perfil</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Welcome/informacion" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px;">Informacion</a></li>
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

		<section>
			<h2>Para acceder al perfil de usuario, debe iniciar sesion</h2>

		</section>
		<footer>
			<?php
			include ("_pie.php");
			?>
		</footer>
	</body>
</html>
