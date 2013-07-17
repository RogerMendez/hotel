	<? foreach($filas as $fila):?>
	<? $id = $fila->id_per ?>
	<? $apellido = $fila->apellidos_per?>

	<? $nombre = $fila->nombres_per?>

	<? $cargo = $fila->cargo_per?>
	<?endforeach?>

	<?php  $id;?>

	
	


      	
<center>
  	   <table border="0" width="50%" aling="center">
			
			
			<tr>
					<td width="35%" > <?php echo $apellido;?></td>	
					<td width="35%" ><?php echo $nombre;?></td>
					<td width="30%" ><?php echo $cargo;?></td>
			</tr>
			
		</table>				
</center>			
				
			<section  id="contactForm" >

				<?php echo $error ;?>
				

				<?php echo form_open_multipart("personal/do_upload/$id");?>
				
				<?= form_label("Seleccionar imagen:", "descripcion")?>
				<input type="file" name="userfile" size="20" />
			
				<input   name="submit" type="submit"  value="Cargar" id="submit" />
				
			</section>
			
					

