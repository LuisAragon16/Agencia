<meta charset="utf-8">
<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
	if(!isset($_SESSION['NO_EMPLEADO']))
  	header('location: login.php');
?>

<ul class="sidebar-menu">
<li class="header">MEN&Uacute;</li>

<?php

	require('traeMenu.php');

	$datos = traeMenu($_SESSION['ID_ROL'],$_SESSION['id_usuario']);
	$cabHist = "";



	foreach ($datos as $key) {
		if ($cabHist != $key['padre']) {
			if ($cabHist != "") {
				echo "</ul>";
				echo "</li>";
			}
			$cabHist = $key['padre'];
			/*if ($key['PPAL_CLASS_CAB'] != "") {
				echo "<li class=\"" . $key['PPAL_CLASS_CAB'] . "\">";
			} else {
				echo "<li>";
			}*/

			echo "<li>";

			?>

	  				<a href="<?php echo $key['liga']; ?>">
	    				<i class="<?php echo $key['icono']; ?>"></i> <span><?php echo $key['titulo']; ?></span> <i class="fa fa-angle-left pull-right"></i>
	  				</a>

	  				<ul class="treeview-menu">
  	<?php
  		}//fin de if de comprobacion $cabHist != $key['PANTALLA']
  	?>
				
				    	<li><a href="<?php echo $key['liga_hijo']; ?>"><i class="<?php echo $key['icono_hijo']; ?>"></i> <?php echo $key['titulo_hijo']; ?></a></li>
				


<?php
		
	}//end for

	echo "</ul>";
	echo "</li>";
?>

</ul>