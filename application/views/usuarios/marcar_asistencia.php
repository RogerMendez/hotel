<div class = "hora">HORA: <?= $hora ?></div> 




		
						<!-- form -->
						
	<section  id="contactForm" >
							
							
							<?=form_open('usuarios/marcar_asistencia')?>
							<?=form_label('seleccionar', 'pass')?>
							<SELECT NAME="turno" id = "turnos"  >
								<option VALUE= "ENTRADA">ENTRADA</OPTION>
								<option VALUE= "SALIDA">SALIDA</OPTION>
							</SELECT>

								
								<?=form_label('Contraseña', 'pass')?>
								<?= form_input(array('type'=>'password', 'name' => 'pass','id'=>'pass', 'required'=>'required', 'placeholder'=>'Ingrese Su Contraseña'))?>
								<br><br><br>
								<p><input   name="submit" type="submit"  value="MARCAR" id="submit" />

								 <span id="error" class="warning"><?= $error ?></span></p>
							<?= form_close()?>
							
						</section>
