

<h2><?= $title ?></h2><BR><BR><BR><BR>


<?$anchor = array('class' => 'ink-label info' );?>
<?= anchor('servicio/new_servicio', 'Nuevo servicio', $anchor);?><BR>

<table border="1" width="100%" aling="center">
    <tr>


        <th width="12%">DESCRIPCION</th>
        <th width="10%">NOMBRE</th>

        <th width="8%">PRECIO</th>
        <th width="10%">CANTIDAD</th>
        <th width="20%">OPCIONES</th>
    </tr>
    <? foreach($filas as $fila):?>
        <tr>


            <td> <?= $fila->descripcion_ser?></td>

            <td> <?= $fila->nombre_ser?></td>
            <td> <?= $fila->costo_ser?></td>
            <td> <?= $fila->saldo_ser?></td>
            <td><?= anchor("asignacion/cantidad/$fila->id_ser/$id_hab/$numero","Seleccinar")?>



            </td>

        </tr>
    <?endforeach?>
</table>