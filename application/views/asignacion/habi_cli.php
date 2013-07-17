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
<?php
$hotel = 0;
$servi = 0;

?>
</div>
<br>
 <center><table border="1" width="100%" aling="center">
			<tr>
						
				<th width="15%">APELLIDOS</th>
				<th width="12%">NOMBRE</th>
				<th width="5%">NUMERO DE DIAS</th>
				<th width="16%">COSTO</th>
				<th width="8%"> TOTAL</th>
				
				<th width="10%">OPCIONES</th>
			
			</tr> 	
			<? foreach($filas as $fila):?> 
				<tr>
					<td> <?= $fila->ap_cli?></td>
					<td> <?= $fila->nom_cli?></td>
					<td> <?= $fila->num_dias?></td>
					<td> <?= ($fila->costo_total/$fila->num_dias )?></td>
					<td> <?= $fila->costo_total?> <? $num =  $fila->num_asig; $hotel = $hotel + $fila->costo_total ?></td>
					<td>
						
						<?$anchor = array('class' => 'ink-label info' );?>
					<?= anchor("asignacion/salir_habitacion/$fila->id_asig/$id_hab/$fila->id_cli", 'CANCELACION');?></td>
					
									
				</tr>
			<?endforeach?> 
			</table>

<br><br><h2><?= 'LISTA DE SERVICIO A LA HABITACION' ?></h2><br>
     <?$anchor = array('class' => 'ink-label info' );?>
     <?= anchor("asignacion/asignar_servicio/$id_hab/$num", 'Nuevo servicio', $anchor);?><br><br><br>
     <?php
     if($selec == 1)
     {
         ?>


         <table border="1" width="100%" aling="center">
             <tr>


                 <th width="12%">DESCRIPCION</th>
                 <th width="10%">NOMBRE</th>

                 <th width="8%">PRECIO</th>
                 <th width="10%">CANTIDAD</th>
                 <th width="10%">COSTO TOTAL</th>

             </tr>
             <? foreach($servicio as $fila):?>
                 <tr>


                     <td> <?= $fila->descripcion_ser?></td>

                     <td> <?= $fila->nombre_ser?></td>
                     <td> <?= $fila->costo_ser?></td>
                     <td> <?= $fila->cant_ser?></td>
                     <td> <?= $fila->costo_total?><? $servi = $servi + $fila->costo_total ?></td>

                     </td>

                 </tr>
             <?endforeach?>
         </table>
     <?php
     }
     else
     {
     ?>
     <?php echo $error ?>

       <?php
        }
      ?>
     <table border="1" width="100%" aling="center">
         <tr>


             <th width="80%">TOTAL DE CONSUMO</th>
             <th width="20%"><?= ($hotel + $servi)  ?></th>



         </tr>
     </table>