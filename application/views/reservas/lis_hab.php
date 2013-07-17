  

<h2><?= $title ?></h2>
<section id="formulario">
    
    <?php echo validation_errors('<div class="errors">','</div>'); ?>
     <?=form_open("asignacion/lista_habitaciones/1")?>
       <div class="control-group">
     	<?= form_label('Buscar:', 'tipo');?>
     	<div class="controls">
       		<select name='buscar' id="buscar">
       			
       			<option value="LIBRE">LIBRE</option>
       			<option value="RESERVADO">RESERVADO</option>
       			<option value="OCUPADO">OCUPADO</option>
       			
       		</select>
     	</div>
   	</div>	
      
         
      
      <p><input   name="submit" type="submit"  value="Buscar" id="submit" />
    <?form_close()?>
   
    
  </section>
   
	
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
					<?php
					if($fila->estado_asig == 'LIBRE')
					{	
						?>		
							<?$anchor = array('class' => 'ink-label info' );?>
						<?= anchor("reserva/lista_cliente_asig/0/$fila->id_hab", 'Seleccionar');?>
					<?php
					}
						?>						
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