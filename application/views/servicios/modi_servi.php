<? foreach($filas as $fila):?>
    <? $id_ser = $fila->id_ser ?>
    <? $nombre = $fila->nombre_ser?>
    <? $descripcion = $fila->descripcion_ser?>
    <? $costo = $fila->costo_ser?>
    <? $saldo = $fila->saldo_ser?>

<?endforeach?>

<?php
$cont = 0;
?>

    <br><br>
    <h2><?= $title ?></h2><br><br>





<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
<?= form_open("servicio/modificar/$id_ser")?>
<div class="control-group">
    <?= form_label('Nombre servicio:', 'num');?>
    <div class="controls">
        <?=form_input(array('name'=>'nombre', 'value'=>$nombre ,'required'=>'required', 'placeholder'=>'Nombre'));?>
    </div>
</div>
<div class="control-group">
    <?= form_label('Descripcion:', 'piso');?>
    <div class="controls">
        <?=form_input(array('name'=>'descripcion', 'value'=>$descripcion ,'required'=>'required', 'placeholder'=>'Ingrese la descripcion'));?>
    </div>
</div>
<div class="control-group">
    <?= form_label('Costo Unidad:', 'costo');?>
    <div class="controls">
        <?=form_input(array('name'=>'costo', 'value'=>$costo ,'required'=>'required', 'placeholder'=>'En Bolivianos'));?>
    </div>
</div>



<div class="controls">
    <?=form_submit('save', 'Modificar');?>
</div>
<?= form_close()?>