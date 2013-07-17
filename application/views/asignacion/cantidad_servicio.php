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

<div class ="datos">

    <?= "Descripcion:" ?><?= $descripcion?><br>
    <?= "Nombre:"?>	<?= $nombre?><br>
    <?= "Precio Unitario:"?>	<?= $costo?><br>
    <?= "Cantidad:"?>	<?= $saldo?><br>
</div>


    <br><br>
<div class="ink-alert basic error"><?= $error ?></div>
<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
<?= form_open("asignacion/guardar_cantidad/$id_ser/$id_hab/$numero")?>

    <div class="control-group">
        <?= form_label('Cantidad:', 'costo');?>
        <div class="controls">
            <?=form_input(array('name'=>'numero', 'value'=>set_value('numero') ,'required'=>'required', 'placeholder'=>'Cantidad de entrada'));?>
        </div>
    </div>

    <div class="controls">
        <?=form_submit('save', 'Aceptar');?>
    </div>
<?= form_close()?>