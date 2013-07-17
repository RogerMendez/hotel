
<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
<?=form_open('usuarios/logued')?>
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
   
     
   	
   	<div class="controls">
   		<?=form_submit('save', 'Enviar');?>
   	</div>
<?= form_close()?>