<? foreach($filas as $fila):?>
	<? $id = $fila->id_per ?>
	<? $ci = $fila->ci_per ?>
	<? $apellido = $fila->apellidos_per?>
	<? $nombre = $fila->nombres_per?>
	
	<? $telefono = $fila->celular_per?>
	<? $direccion = $fila->direccion_per?>

	

	
<?endforeach?>
<?php
 $ci;
?>



	<section  id="contactForm" >
	
		<?php echo validation_errors('<div class="errors">','</div>'); ?> 
		<br>
		<?=form_open("usuarios/registrar_usuario/$id")?>
			
			
					
		<div class="control-group">	
	<?=form_label('TIPO USUARIO', 'unidad')?> 
	<div class="controls">
			<SELECT NAME="tipo_user" id = "tipo_user"  >

						
				<option VALUE= "ADMINISTRADOR">ADMISTRADOR</OPTION>
				<option VALUE= "ENCARGADO">ENCARGADO</OPTION>
				
				
			</SELECT>
</div>
   	</div>
			

			<div class="control-group">
     	<?=form_label('Nombre de Usuario', 'username')?>
     	<div class="controls">
       		<?= form_input(array('name' => 'username', 'id'=>'username', 'size'=>'20', 'value'=>set_value('username'), 'placeholder'=>'Ingrese el Nombre de Usuario', 'required'=>'required'))?>
     	</div>
   	</div>
   	<div class="control-group">
     	<?=form_label('Contraseña', 'pass')?>
     	<div class="controls"> 
       		<?= form_input(array('type'=>'password', 'name' => 'pass','id'=>'pass', 'required'=>'required', 'placeholder'=>'Ingrese Su Contraseña'))?>
     	</div>
   	</div>
			
			
			<p><input   name="submit" type="submit"  value="Guardar" id="submit" />


			<?php echo validation_errors(' <span id="error" class="warning">','</span>'); ?></p>

			
			
		<?= form_close()?>
		
	</section>
	<br><br><br><br>
