
<!DOCTYPE html>
<html lang="es">
<link href = "<?php echo base_url(); ?>css/estilo.css" rel = "stylesheet" type = "text/css">
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
			redirect('/account/login', 'refresh');
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

			<div >
				<h2>Compras realizadas:</h2>
					<?php
          $vacio=0;//esta vacio
					if (isset($h)){
						foreach ($h->result() as $row) {

                    if($row->Usuario==$this->session->userdata('username')){
                      $vacio=1;//Hay algo
                     ?>
              <div  class="">
                <a href="<?php echo base_url(); ?>index.php/Producto/cargar/<?php echo($row->Producto); ?>">  <img style="margin:1%; width:20%;height:350px;" alt="<?php echo base_url(); ?>" src="<?php echo base_url(); ?>img/<?php echo($row->Producto); ?>.jpg"></a>
                <aside style="width:70%;float:right;">
                    <h3>Producto: <?php echo ucfirst($row->Producto) ;?></h3>
                    <h3 style="">Numero de unidades: <?php echo $row->Numero ;?> </h3>
                    <h3 style="">Precio: <?php echo $row->Precio ;?> </h3>
              </aside>
            </div>
                  <?php
                }else if(!isset($_SESSION['username'])){
                   if($row->Usuario=="NoUsuario"){
                     $vacio=1;//Hay algo
										 ?>
                     <div  class="">


                <a href="<?php echo base_url(); ?>index.php/Producto/cargar/<?php echo($row->Producto); ?>">  <img style="margin:1%; width:20%;height:350px;" alt="<?php echo base_url(); ?>" src="<?php echo base_url(); ?>img/<?php echo($row->Producto); ?>.jpg"></a>
                <aside style="width:70%;float:right;">
                    <h3>Producto: <?php echo ucfirst($row->Producto) ;?></h3>
                    <h3 style="">Numero de unidades: <?php echo $row->Numero ;?> </h3>
                    <h3 style="">Precio: <?php echo $row->Precio ;?> </h3>

              </aside>
            </div>
                  <?php
                    }
                  }
								}
					}

          if($vacio==0){
            ?>
            <div  >
              <h2>No tiene ningun producto en la cesta</h2>
            </div>
            <?php
          }
						?>

			</div>

		</section>
		<footer>
			<?php
			include ("_pie.php");
			?>
		</footer>
	</body>
</html>
