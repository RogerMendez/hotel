
	 <?php
	 if($selec == 1)
	{
  	?>
    	

  	  <center><table border="1" width="100%" aling="center">
			<tr>
				<th width="5%">CI</th>	
					
				<th width="12%">APELLIDOS</th>
				<th width="10%">NOMBRE</th>
				
				<th width="8%">EMPRESA</th>
				<th width="10%">CARGO</th>
				<th width="20%">OPCIONES</th>
			</tr>
			<? foreach($filas as $fila):?>
				<tr>
					<td> <?= $fila->ci_per?></td>
						
					<td> <?= $fila->apellidos_per?></td>
					<td> <?= $fila->nombres_per?></td>
				
					<td> <?= $fila->celular_per?></td>
					<td> <?= $fila->direccion_per?></td>
					<td><?= anchor("personal/modificar/$fila->id_per","Modificar")?>
						<?= anchor("personal/ver_personal/$fila->id_per","Ver")?>
						

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
