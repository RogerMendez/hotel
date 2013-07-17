<br><br>
<h2><?= $title?></h2>
<h3><?= "FECHA DE INGRESO"; echo $fec_ini; ?></h3>

<section  id="contactForm" >

		
		<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
		<?=form_open("asignacion/cambiar_asignacion/$id_hab")?>
		

		<div class="control-group">	
			<?=form_label('Fecha de salida', 'ci')?>

			<div class="controls">
			<input type = "date" name = "hasta" id = "hasta" value = <?= $fecha?> >
			</div>
		</div>	

		
			<p><input   name="submit" type="submit"  value="Guardar" id="submit" />


			
		<?form_close()?>
		
	</section>
