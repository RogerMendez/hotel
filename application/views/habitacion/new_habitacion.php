<br><br>
<h2><?= $title ?></h2><br><br>
<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
<?= form_open('habitacion/save')?>
	<div class="control-group">
     	<?= form_label('Numero de Habitacion:', 'num');?>
     	<div class="controls">
       		<?=form_input(array('name'=>'num', 'value'=>set_value('num') ,'required'=>'required', 'placeholder'=>'Numero de Habitacion'));?>
     	</div>
   	</div>
   	<div class="control-group">
     	<?= form_label('Piso de Habitacion:', 'piso');?>
     	<div class="controls">
       		<?=form_input(array('name'=>'piso', 'value'=>set_value('piso') ,'required'=>'required', 'placeholder'=>'Ingrese Piso de Habitacion'));?>
     	</div>
   	</div>
   	<div class="control-group">
     	<?= form_label('Costo Por Persona:', 'costo');?>
     	<div class="controls">
       		<?=form_input(array('name'=>'costo', 'value'=>set_value('costo') ,'required'=>'required', 'placeholder'=>'En Bolivianos'));?>
     	</div>
   	</div>
   	<div class="control-group">
     	<?= form_label('Tipo de Habitacion:', 'tipo');?>
     	<div class="controls">
       		<select name='tipo' id="tipo">
       			<?foreach ($tipos as $tipo):?>
       				<option value="<?=$tipo->id_tipo?>"><?=$tipo->nombre_tipo?></option>
       			<?endforeach?>
       		</select>
     	</div>
   	</div>
      <div class="control-group">
      <?= form_label('Numero de personas:', 'costo');?>
      <div class="controls">
          <?=form_input(array('name'=>'numero', 'value'=>set_value('numero') ,'required'=>'required', 'placeholder'=>'Numero de personas'));?>
      </div>
    </div>
   	
   	<div class="controls">
   		<?=form_submit('save', 'Guardar');?>
   	</div>
<?= form_close()?>