  

<h2><?= $title ?></h2>
<section id="formulario">
    
    <?php echo validation_errors('<div class="errors">','</div>'); ?>
    <br>
    <?=form_open("cliente/lis_cliente/1")?>
      
      <?=form_label('Buscar', 'ci')?>

      <?php
      if ($aux == 0 )
      {	
      ?>
      <?= form_input(array('name' => 'buscar', 'id'=>'buscar', 'size'=>'20', 'value'=>set_value('buscar'), 'placeholder'=>'Buscar por CI o APELLIDOS NOMBRES', 'required'=>'required'))?>
      <?php
  	  }
  	  else 
  	  {
  	  	?>

  	  	<?= form_input(array('name' => 'buscar', 'id'=>'buscar', 'size'=>'20', 'value'=>$wwe, 'placeholder'=>'Buscar por CI o APELLIDOS NOMBRES', 'required'=>'required'))?>
  	  	<?php

  	  }	
      ?>
         
      
      <?= form_submit(array('name'=>'guardar', 'value'=>'Buscar', 'class'=>'botoncss3'))?>
    <?form_close()?>
    
  </section>
   
	<?$anchor = array('class' => 'ink-label info' );?>
	<?= anchor('cliente/new_cliente', 'Nuevo cliente', $anchor);?>
	<?php 

	if($selec == 1)
	{ 
		
		?>


  	   <center><table border="1" width="100%" aling="center">
			<tr>
						
				<th width="15%">APELLIDOS</th>
				<th width="12%">NOMBRE</th>
				<th width="5%">DOCUMENTO</th>
				<th width="16%">NUMERO DE DOCUMENTO</th>
				<th width="8%">TELEFONO</th>
				<th width="10%">PROCEDENCIA</th>
				<th width="10%">FECHA NACIMIENTO</th>
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
					<td> <?= $fila->fecha_nac_cli?></td>
                    <td> <?$anchor = array('class' => 'ink-label info' );?>
                        <?= anchor("cliente/modifi_cli/$fila->id_cli", 'MODIFICAR');?>
                    </td>
					
									
				</tr>
			<?endforeach?> 
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