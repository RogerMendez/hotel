
<br><br>
<h2><?= $title ?></h2><br><br>
	
	<section  id="contactForm" >
		
		<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
		<?=form_open('personal/registrar_personal')?>
	<div class="control-group">	
			<?=form_label('C.I.', 'ci')?>

			<div class="controls">
			<?= form_input(array('name' => 'ci', 'id'=>'ci', 'size'=>'20', 'value'=>set_value('ci'), 'placeholder'=>'Ingrese el numero de ci', 'required'=>'required'))?>
			</div>
		</div>	
	<div class="control-group">		
			<?=form_label('Apellidos', 'ap_pol')?>
			<div class="controls">

			<?= form_input(array('name' => 'apellido', 'id'=>'apellido', 'size'=>'20', 'value'=>set_value('apellido'), 'placeholder'=>'Ingrese los Apellidos', 'required'=>'required'))?>
 			</div>
 		</div>
	<div class="control-group">
			<?=form_label('Nombres', 'nombre')?>
			<div class="controls">
			<?= form_input(array('name' => 'nombre', 'id'=>'nombre', 'size'=>'20', 'value'=>set_value('nombre'), 'placeholder'=>'Ingrese los nombres', 'required'=>'required'))?>
			</div>
		</div>
	<div class="control-group">
			<?=form_label('Celular', 'Telefono')?>
			<div class="controls">
			<?= form_input(array('name' => 'celular', 'id'=>'telefono', 'size'=>'20', 'value'=>set_value('celular'), 'placeholder'=>'Ingrese el numero de celular', 'required'=>'required'))?>
			</div>
		</div>
	<div class="control-group">
			<?=form_label('Direccion', 'direccion')?>
			<div class="controls">
			<?= form_input(array('name' => 'direccion', 'id'=>'direccion', 'size'=>'20', 'value'=>set_value('direccion'), 'placeholder'=>'Ingrese la direccion', 'required'=>'required'))?>
			</div>
		</div>
	<div class="control-group">
			<?=form_label('Email', 'direccion')?>
			<div class="controls">
			<?= form_input(array('name' => 'email', 'id'=>'direccion', 'size'=>'20', 'value'=>set_value('email'), 'placeholder'=>'Ingrese la direccion email', 'required'=>'required'))?>
			</div>
		</div>
			
					
			
			<br><br>
			<p><input   name="submit" type="submit"  value="Guardar" id="submit" />


			
		<?form_close()?>
		
	</section>
