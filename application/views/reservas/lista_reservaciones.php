

<h2><?= $title ?></h2>



<?php

if($selec == 1)
{

    ?>


    <table>
        <thead>
        <tr>
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Num. Habitacion</th>
            <th>Piso</th>
            <th>Costo</th>
            <th>Opciones</th>

        </tr>
        </thead>
        <tbody>
        <?foreach ($filas as $fila):?>
            <tr>
                <td><?=$fila->nom_cli?>&nbsp<?=$fila->ap_cli?> </td>
                <td><?=$fila->nombre_tipo?></td>
                <td><?=$fila->num_habi?></td>
                <td><?=$fila->piso?></td>
                <td><?=$fila->costo?></td>

                <td>

                    <?php

                    if($fila->estado_res == 'ACTIVO')
                    {
                        ?>
                        <?$anchor = array('class' => 'ink-label info' );?>
                        <?= anchor("reserva/asignar_clientes/$fila->id_res/$fila->id_hab", 'Seleccionar');?>
                    <?php
                    }
                    else
                    {
                        echo "VENCIDA";
                    }
                    ?>
                </td>

            </tr>
        <?endforeach?>
        </tbody>
    </table>
<?php
}
else
{
    ?>
    <BR><BR><BR>
    <div class="errors"><?= $error ?></DIV>

<?php
}
?>