

<!DOCTYPE html>
<html lang="es">
<link rel = "stylesheet" type = "text/css"href = "<?php echo base_url(); ?>css/estilo.css">
<head>
	<?php
	include ("_titulo.php");
	?>
</head>
	<body>


	<h1><a href="<?php echo base_url(); ?>"><h1>TiendaOnline</a></h1></h1>
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
									<li><a href="<?php echo base_url(); ?>index.php/Welcome/perfil" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px">Perfil</a></li>
                  <li><a href="<?php echo base_url(); ?>index.php/Welcome/informacion" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px;background-color:green;">Informacion</a></li>
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

            <div id="carrito">
				<a href="<?php echo base_url(); ?>index.php/Welcome/carrito"><img style="float:right;width:50px;height:50px;margin:10px;" src="<?php echo base_url(); ?>img/carrito.jpg" alt="carrito"></a>
            </div>
		</div>

		<section>
			<h2>Web de compras</h2>
			<p>Pagina creada por Alexander Van Den Heuvel Cabeza</p>

		</section>
		<footer>
			<?php
			include ("_pie.php");
			?>
		</footer>
	</body>
</html>
