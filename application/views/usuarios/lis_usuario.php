 <?php
	 if($selec == 1)
	{
  	?>
    	

  	  <center><table border="1" width="100%" aling="center">
			<tr>
				<td>#</td>
				<th>Nombre Usuario</th>	
					
				<th>Tipo Usuario</th>
			</tr>
			<? foreach($filas as $fila):?>
				<tr>
					<td> <?= $fila->id_user?></td>
						
					<td> <?= $fila->username?></td>
					<td> <?= $fila->tipo_user?></td>
				</tr>
			<?endforeach?>
			</table></center>
	<?php
	}
	else
	{
		?>
			<center><?php echo $error ?><center>
		<?php
	}		
	?>
