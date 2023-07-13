
<!DOCTYPE html>
<html lang="es">
<link href = "<?php echo base_url(); ?>css/estilo.css" rel = "stylesheet" type = "text/css">
<head>
	<?php
	include ("_titulo.php");
	?>
</head>
	<body>

	<h1><a href="<?php echo base_url(); ?>"><h1>TiendaOnline</h2></a></h1>
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
									<li><a href="<?php echo base_url(); ?>index.php/Welcome/informacion" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px">Informacion</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/Welcome/contacto" style="font-size:large;padding-left: 3px;border:solid;border-color:black;border-width:2px;">Contacto</a></li>
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

			<div id="imagen">
					<?php
					if (isset($h1)){
						foreach ($h1->result() as $row) {
								?>
									<img alt="<?php echo base_url(); ?>" style="margin:1%;width:313px;height:350px;" src="<?php echo base_url(); ?>img/<?php echo($row->Producto); ?>.jpg">

								<?php
								}
					}
						?>

			</div>

			<div id="propiedades" style="float:left;width:50%;" >
        <?php
				if (isset($h1)){
					foreach ($h1->result() as $row) {
							?>
								<h4>Producto:<?php echo(ucfirst($row->Producto)); ?></h4>
								<h4>Precio:<?php echo($row->Precio); ?>$</h4>
								<?php	if($row->Velocidad!=0){	?>
								<h4>Velocidad:<?php echo($row->Velocidad); ?></h4>
								<?php if(str_contains($row->RAM,'MB')){$string='Cache';}else{$string='RAM';} ?>
								<h4><?php echo $string?>:<?php echo($row->RAM); ?></h4>
								<?php	}	?>
								<h4>Año:<?php echo($row->año); ?></h4>
								<h4>Descripcion:<?php echo($row->descripcion); ?></h4>
							<?php
							}
				}

          ?>
			</div>

			<?php echo form_open('Welcome/anadir_carrito/'.urldecode($this->uri->segment(3))); ?>
			<input type="submit" style=" margin-bottom: 1%;margin-top: 20%;padding:10px;" name="submit" value="Añadir al carrito">
		</form>
		</section>
		<footer>
			<?php
			include ("_pie.php");
			?>
		</footer>
	</body>
</html>
