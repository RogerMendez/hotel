<? foreach($habitacion as $fila):?>
    <? $id_hab = $fila->id_hab ?>
    <? $numero = $fila->num_habi?>
    <? $piso = $fila->piso?>
    <? $costo = $fila->costo?>
    <? $camas = $fila->num_camas?>
    <? $tipo = $fila->nombre_tipo?>
    <? $descrip = $fila->descrip_tipo?>



<?endforeach?>

<?php
$cont = 0;

?>

<h2><?= $title ?></h2><br><br>
<?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
<?= form_open("habitacion/modificar_hab/$id_hab")?>
<div class="control-group">
    <?= form_label('Numero de Habitacion:', 'num');?>
    <div class="controls">
        <?=form_input(array('name'=>'num', 'value'=>$numero ,'required'=>'required', 'placeholder'=>'Numero de Habitacion'));?>
    </div>
</div>
<div class="control-group">
    <?= form_label('Piso de Habitacion:', 'piso');?>
    <div class="controls">
        <?=form_input(array('name'=>'piso', 'value'=>$piso ,'required'=>'required', 'placeholder'=>'Ingrese Piso de Habitacion'));?>
    </div>
</div>
<div class="control-group">
    <?= form_label('Costo Por Persona:', 'costo');?>
    <div class="controls">
        <?=form_input(array('name'=>'costo', 'value'=>$costo ,'required'=>'required', 'placeholder'=>'En Bolivianos'));?>
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
        <?=form_input(array('name'=>'numero', 'value'=>$camas ,'required'=>'required', 'placeholder'=>'Numero de personas'));?>
    </div>
</div>

<div class="controls">
    <?=form_submit('save', 'Modificar');?>
</div>
<?= form_close()?>