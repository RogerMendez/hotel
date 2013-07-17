	<? foreach($filas as $fila):?>
	<? $id = $fila->id_per ?>
	<? $apellido = $fila->apellidos_per?>

	<? $nombre = $fila->nombres_per?>

	
	<? $celular = $fila->celular_per?>
	<? $direccion = $fila->direccion_per?>
	<? $email = $fila->email_per?>
	


	<?endforeach?>

	<?php  $id;?>


    <br><br>
    <h2><?= $title ?></h2><br><br>
<div class = "ver_persona">
      	
<div class ="datos">
	
  	  		
						
					 <?= "APELLIDOS:" ?><?= $fila->apellidos_per?><br>
					<?= "NOMBRE:"?>	<?= $fila->nombres_per?><br>
					
					<?= "CELULAR:"?>	<?= $celular?><br>
					<?= "DIRECCION:"?>	<?= $direccion?><br>
					<?= "TELEFONO FIJO:"?>	<?= $email?><br>
									
		
</div>

				
			
					

