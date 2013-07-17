  
<? foreach($habitacion as $fila):?>
	<? $id_hab = $fila->id_hab ?>
	<? $numero = $fila->num_habi?>
	<? $piso = $fila->piso?>
	<? $costo = $fila->costo?>
	<? $camas = $fila->num_camas?>
	<? $tipo = $fila->nombre_tipo?>
	<? $descrip = $fila->descrip_tipo?>
	


	<?endforeach?>

	<?php 
	$cont = 0;

	?>

	
	




<h2><?= $title ?></h2>

    
         	
<div class ="datos"> 	  		
						
<?= "Descripcion:" ?><?= $descrip?><br>
<?= "Tipo:"?>	<?= $tipo?><br>
<?= "Numero de habitacion:"?>	<?= $numero?><br>
<?= "Piso:"?>	<?= $piso?><br>
<?= "Numero de perosnas:"?>	<?= $camas ?><br>
<?= "Precio por persona:"?>	<?= $costo ?><br>
						
</div>
<br>
	<?php 

	if($selec == 1)
	{ 
		
		?>


  	   <center><table border="1" width="100%" aling="center">
			<tr>
						
				<th width="15%">APELLIDOS</th>
				<th width="12%">NOMBRE</th>
				<th width="5%">TIPO DOCUMENTO</th>
				<th width="16%">NUMERO DE DOCUMENTO</th>
				<th width="8%">TELEFONO</th>
				<th width="10%">PROCEDENCIA</th>
				<th width="10%">OPCIONES</th>
				
			
			</tr> 	
			<? foreach($filas as $fila):?> 
				<tr>
					<td> <?= $fila->ap_cli?></td>
					<td> <?= $fila->nom_cli?></td>
					<td> <?= $fila->tipo_docu?></td>
					<td> <?= $fila->nro_doc_cli?></td>
					<td> <?= $fila->celular_cli?></td>
					<td> <?= $fila->procedencia_cli?></td>
					<td><?$anchor = array('class' => 'ink-label info' );?>
					<?= anchor("asignacion/quitar_asig/$fila->id_cli/$id_hab", 'QUITAR');?></td>
					<?php $cont = $cont + 1; ?>
									
				</tr>
			<?endforeach?> 
			</table>
		
		<?php
		}
		else
		{
		?>
		<BR><BR><BR>
			<div class="ink-alert basic error"><?= $error?></div>

		<?php		
		}
		?>

		<?php 
			if ($cont < $camas)
			{
				?>

				<br><?$anchor = array('class' => 'ink-label info' );?>
				<?= anchor("asignacion/lista_cliente_asig/0/$id_hab" , 'Seleccionar cliente', $anchor);?>
				<?= anchor("asignacion/asignar_dias/$id_hab" , 'Confirmar asignacion', $anchor);?>
			<?php	
			}
			else
			{
			?><br>
			<?= anchor("asignacion/asignar_dias/$id_hab" , 'Confirmar asignacion', $anchor);?>
			<?php 
			}
			?>