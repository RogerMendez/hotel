<h2>Tipos de Habitacion</h2>
<?$anchor = array('class' => 'ink-label info' );?>
	<?= anchor('tipo/new_tipo', 'Nuevo Tipo', $anchor);?>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Descripcion</th>
		</tr>
	</thead>
	<tbody>
		<?$num = 1?>
		<?foreach ($tipos as $fila):?>
			<tr>
				<td><?=$num++?></td>
				<td><?=$fila->nombre_tipo?></td>
				<td><?=$fila->descrip_tipo?></td>
			</tr>
		<?endforeach?>
	</tbody>
</table>