
	 <?php
	 if($selec == 1)
	{
  	?>
    	

  	  <center><table border="1" width="100%" aling="center">
			<tr>
				<th width="5%">CI</th>	
					
				<th width="12%">APELLIDOS</th>
				<th width="10%">NOMBRE</th>
				
				<th width="8%">CELULAR</th>
				<th width="10%">DIRECCION</th>
				<th width="20%">OPCIONES</th>
			</tr>
			<? foreach($filas as $fila):?>
				<tr>
					<td> <?= $fila->ci_per?></td>
						
					<td> <?= $fila->apellidos_per?></td>
					<td> <?= $fila->nombres_per?></td>
				
					<td> <?= $fila->celular_per?></td>
					<td> <?= $fila->direccion_per?></td>
					<td><?= anchor("usuarios/nuevo_user/$fila->id_per","Seleccionar")?>
						

					</td>
									
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
