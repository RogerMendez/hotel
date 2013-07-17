<br><br>
<h2><?= $title ?></h2><br><br>

<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
<?= form_open('servicio/guardar')?>
<div class="control-group">
    <?= form_label('Nombre servicio:', 'num');?>
    <div class="controls">
        <?=form_input(array('name'=>'nombre', 'value'=>set_value('nombre') ,'required'=>'required', 'placeholder'=>'Nombre'));?>
    </div>
</div>
<div class="control-group">
    <?= form_label('Descripcion:', 'piso');?>
    <div class="controls">
        <?=form_input(array('name'=>'descripcion', 'value'=>set_value('descripcion') ,'required'=>'required', 'placeholder'=>'Ingrese la descripcion'));?>
    </div>
</div>
<div class="control-group">
    <?= form_label('Costo Unidad:', 'costo');?>
    <div class="controls">
        <?=form_input(array('name'=>'costo', 'value'=>set_value('costo') ,'required'=>'required', 'placeholder'=>'En Bolivianos'));?>
    </div>
</div>

<div class="control-group">
    <?= form_label('Cantidad:', 'costo');?>
    <div class="controls">
        <?=form_input(array('name'=>'numero', 'value'=>set_value('numero') ,'required'=>'required', 'placeholder'=>'Cantidad de entrada'));?>
    </div>
</div>

<div class="controls">
    <?=form_submit('save', 'Guardar');?>
</div>
<?= form_close()?>