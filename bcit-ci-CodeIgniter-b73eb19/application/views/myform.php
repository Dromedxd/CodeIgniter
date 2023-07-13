<html>
<head>
<title>My Form</title>
</head>
<body>

<h1>Tienda Online</h1>

<h2>Paso final - Direccion de envio</h2>

<?php echo validation_errors('<div class="error" style="color:red;">', '</div>'); ?>

<?php echo form_open('form'); ?>

<h5>Direccion</h5>
<?php echo form_error('direccion', '<div class="error" style="color:red;">', '</div>'); ?>
<input type="text" name="direccion" value="<?php echo set_value('direccion'); ?>" size="50" />

<h5>Codigo Postal</h5>
<?php echo form_error('codigopostal', '<div class="error" style="color:red;">', '</div>'); ?>
<input type="text" name="codigopostal" value="<?php echo set_value('codigopostal'); ?>" size="50" />

<h5>Ciudad</h5>
<?php echo form_error('ciudad', '<div class="error" style="color:red;">', '</div>'); ?>
<input type="text" name="ciudad" value="<?php echo set_value('ciudad'); ?>" size="50" />

<h5>Telefono</h5>
<?php echo form_error('telefono', '<div class="error" style="color:red;">', '</div>'); ?>
<input type="text" name="telefono" value="<?php echo set_value('telefono'); ?>" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>