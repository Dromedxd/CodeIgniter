<html>
<head>
<title>Conectandose a UMAPal</title>
</head>
<body onload="document.umapal.submit()">
<!-- <body onload="document.forms['member_signup'].submit()"> -->

<h3>Conectandose a UMAPal, espere unos instantes...</h3>

<!-- Ver https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/formbasics/ -->
<form name="umapal" action="<?php echo base_url(); ?>umapal/procesar.php" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="tiendaonline@negocio.com">
  <input type="hidden" name="item_name" value="Carro">
  <input type="hidden" name="item_number" value="IDPRODUCTO">
  <input type="hidden" name="amount" value="<?php echo $precio; ?>">
  <input type="hidden" name="quantity" value="<?php echo $cantidad; ?>">
  <input type="hidden" name="currency_code" value="EUR">
  <!-- Indicamos que la direccion viene dada por la web -->
  <input type="hidden" name="address_override" value="1">
  <input type="hidden" name="first_name" value="<?php echo $nombre; ?>">
  <input type="hidden" name="last_name" value="<?php echo $nombre; ?>">
  <input type="hidden" name="address1" value="<?php echo set_value('direccion'); ?>">
  <input type="hidden" name="city" value="<?php echo set_value('ciudad'); ?>">
  <input type="hidden" name="zip" value="<?php echo set_value('codigopostal'); ?>">
  <input type="hidden" name="country" value="ES">
  <input type="hidden" name="return" value="<?php echo base_url(); ?>index.php/FormSuccess">
  <input type="hidden" name="cancel_return" value="<?php echo base_url(); ?>index.php/FormCancel">
  <!-- Este valor no existe en paypal, pero nos ayudara a la hora de simular peticiones unicas -->
  <input type="hidden" name="cartID" value="<?php echo $PeticionActual; ?>">
  <input type="submit" value="Enviar a UMAPal" />
</form>

</body>
</html>
