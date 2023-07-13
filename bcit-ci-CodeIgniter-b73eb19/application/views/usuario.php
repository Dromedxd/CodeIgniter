<!DOCTYPE html>
<html>

<ul>


Usuario:&nbsp; <?php echo $this->session->userdata('username');?><br>
<a href='<?php echo base_url(); ?>index.php/Welcome/logout'><input  type="submit" value="Logout"></a>
<a href='<?php echo base_url(); ?>index.php/Welcome/compras'><input  type="submit" value="Compras"></a>

    </li>
		</ul>

</html>
