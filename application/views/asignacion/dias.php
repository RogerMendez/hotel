<br><br>
<h2>Tiempo de estadia</h2>
<section  id="contactForm" >
		
		<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
		<?=form_open("asignacion/realizar_asignacion/$id_hab")?>
		<div class="control-group">	
			<?=form_label('Fecha de entrada', 'ci')?>

			<div class="controls">
			<input type = "date" name = "desde" id = "desde" value = <?= $fecha?> >
			</div>
		</div>	

		<div class="control-group">	
			<?=form_label('Fecha de salida', 'ci')?>

			<div class="controls">
			<input type = "date" name = "hasta" id = "hasta" value = <?= $fecha?> >
			</div>
		</div>	

		
			<p><input   name="submit" type="submit"  value="Guardar" id="submit" />


			
		<?form_close()?>
		
	</section>
