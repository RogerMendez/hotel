  

<h2><?= $title ?></h2>

	
	<?php 

	if($selec == 1)
	{ 
		
		?>


  	  <table>
		<thead>
			<tr>
				<th>Descripcion</th>
				<th>Tipo</th>
				<th>Num. Habitacion</th>
				<th>Piso</th>
				<th>Costo</th>
				<th>Opciones</th>
				
			</tr>
		</thead>
		<tbody>
			<?foreach ($filas as $fila):?>
				<tr>
					<td><?=$fila->descrip_tipo?></td>
					<td><?=$fila->nombre_tipo?></td>
					<td><?=$fila->num_habi?></td>
					<td><?=$fila->piso?></td>
					<td><?=$fila->costo?></td>

					<td>
						
							<?$anchor = array('class' => 'ink-label info' );?>
						<?= anchor("asignacion/ver_clientes/$fila->id_hab", 'Ver clientes');?>
					
					</td>
						
				</tr>
			<?endforeach?>
		</tbody>
	</table>
		<?php
		}
		else
		{
		?>
		<BR><BR><BR>
			<div class="errors"><?= $error ?></DIV>

		<?php		
		}
?>