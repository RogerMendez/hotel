<br><br>
<h2>Tiempo de reservacion</h2>
<section  id="contactForm" >

    <?php echo validation_errors('<div class="ink-alert basic error">', '</div>'); ?>
    <?=form_open("reserva/guardar_reservacion/$id_hab/$id_cli")?>
    <div class="control-group">
        <?=form_label('Fecha de entrada', 'ci')?>

        <div class="controls">
            <input type = "date" name = "desde" id = "desde" value = <?= $fecha?> >
        </div>
    </div>

    <div class="control-group">
        <?=form_label('Fecha de salida', 'ci')?>

        <div class="controls">
            <input type = "date" name = "hasta" id = "hasta" value = <?= $fecha?> >
        </div>
    </div>


    <p><input   name="submit" type="submit"  value="Guardar" id="submit" />



        <?form_close()?>

</section>
