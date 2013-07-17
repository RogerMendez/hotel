<h2>Habitaciones</h2>
	<?$anchor = array('class' => 'ink-label info' );?>
	<?= anchor('habitacion/new_habitacion', 'Nueva habitacion', $anchor);?>
	
	<table>
		<thead>
			<tr>
				<th width="8%">Num. Habitacion</th>
				<th width="12%">Piso</th>
				<th width="20%">Costo</th>
				<th width="20%">Tipo</th>
                <th width="20%">OPCIONES</th>
			</tr>
		</thead>
		<tbody>
			<?foreach ($habitaciones as $fila):?>
				<tr>
					<td><?=$fila->num_habi?></td>
					<td><?=$fila->piso?></td>
					<td><?=$fila->costo?></td>
					<?foreach ($tipos as $tipo):?>
						<?if($fila->id_tipo == $tipo->id_tipo):?>
							<td><?=$tipo->nombre_tipo?></td>
						<?endif?>
					<?endforeach?>
                    <td><?= anchor("habitacion/modif_habi/$fila->id_hab","Modificar")?>
				</tr>
			<?endforeach?>
		</tbody>
	</table>
</div>
