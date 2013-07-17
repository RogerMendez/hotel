<?$form = array('class' => 'form-horizontal', );?>
<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
<?= form_open('tipo/save', $form)?>
	<div class="control-group">

     	<?= form_label('Numero Tipo:', 'name');?>
     	<div class="controls">
       		<?=form_input(array('name'=>'name', 'value'=>set_value('name') ,'required'=>'required', 'placeholder'=>'Nombre de Tipo'));?>
     	</div>
   	</div>
   	<div class="control-group">
     	<?= form_label('Descripcion Tipo:', 'desc');?>
     	<div class="controls">
       		<?=form_textarea(array('name'=>'desc', 'value'=>set_value('des'), 'placeholder'=>'Descripcion'));?>
     	</div>
   	</div>
   	<div class="controls">
   		<?=form_submit('save', 'Guardar');?>
   	</div>
<?= form_close()?>