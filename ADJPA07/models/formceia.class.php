<?php
class formceia {

	function formceia($igreja){

		$cong = new	DBRecord('igreja', $igreja, 'rol');
		$this->semana = substr($cong->ceia(), -2,1);    // retorna a numero da semana
		$this->dia = substr($cong->ceia(), -1);    // retorna a numero do dia da semana 2-seg, 3-ter ...

	}

	function formulario ($ind){

		$cong = new	DBRecord('igreja', $igreja, 'rol');
		$semana = substr($cong->ceia(), -2,1);    // retorna a numero da semana
		$dia = substr($cong->ceia(), -1);    // retorna a numero do dia da semana 2-seg, 3-ter ...
		switch ($this->semana) {
			case 4:
			$s4 = 'checked="checked"';
			break;
			case 3:
			$s3 = 'checked="checked"';
			case 2:
			$s2 = 'checked="checked"';
			default:
			$s1 = 'checked="checked"';
			break;
		}

		switch ($this->dia) {
			case 6:
			$d7 = 'checked="checked"';//S�bado
			break;
			case 5:
			$d6 = 'checked="checked"';//Sexta
			break;
			case 4:
			$d5 = 'checked="checked"';//Quinta
			break;
			case 3:
			$d4 = 'checked="checked"';//Quarta
			break;
			case 2:
			$d3 = 'checked="checked"';//Ter�a
			break;
			case 1:
			$d2 = 'checked="checked"';//Segunda
			break;
			default:
			$d1 = 'checked="checked"';
			break;
		}
		?>
		<fieldset>
  		<legend>Santa Ceia</legend>
		<table class='table' >
			<tbody>
				<tr class="primary">
				<td><div class="radio"><label>
		  		<input type="radio" id="semana" autofocus='autofocus' <?php echo $s1;?> name="semana" value="1"
		  			tabindex="<?php echo ++$ind; ?>" >1&ordf; Semana</label></div></td>
		  		<td><div class="radio"><label>
		  		<input type="radio" id="semana" <?php echo $s2;?> name="semana" value="2"
		  			tabindex="<?php echo ++$ind; ?>" >2&ordf; Semana</label></div></td>
		  		<td><div class="radio"><label>
		  		<input type="radio" id="semana" <?php echo $s3;?> name="semana" value="3"
		  			tabindex="<?php echo ++$ind; ?>" >3&ordf; Semana</label></div></td>
		  		<td><div class="radio"><label>
		  		<input type="radio" id="semana" <?php echo $s4;?> name="semana" value="4"
		  			tabindex="<?php echo ++$ind; ?>" >4&ordf; Semana</label></div></td>
		  		</tr>
	  		</tbody>
	  	</table>
		<table class='table' >
			<tbody>
				<tr class="primary">
				<td><div class="radio"><label>
		  		<input type="radio" id="dia" <?php echo $d2;?> name="dia" value="1" tabindex = "<?php echo ++$ind; ?>" >Segunda</label></div></td>
		  		<td><div class="radio"><label>
		  		<input type="radio" id="dia" <?php echo $d3;?> name="dia" value="2" tabindex = "<?php echo ++$ind; ?>" >Ter&ccedil;a</label></div></td>
		  		<td><div class="radio"><label>
		  		<input type="radio" id="dia" <?php echo $d4;?> name="dia" value="3" tabindex = "<?php echo ++$ind; ?>" >Quarta</label></div></td>
		  		<td><div class="radio"><label>
		  		<input type="radio" id="dia" <?php echo $d5;?> name="dia" value="4" tabindex = "<?php echo ++$ind; ?>" >Quinta</label></div></td>
		  		<td><div class="radio"><label>
		  		<input type="radio" id="dia" <?php echo $d6;?> name="dia" value="5" tabindex = "<?php echo ++$ind; ?>" >Sexta</label></div></td>
		  		<td><div class="radio"><label>
		  		<input type="radio" id="dia" <?php echo $d7;?> name="dia" value="6" tabindex = "<?php echo ++$ind; ?>" >S&aacute;bado</label></div>
				</td>
		  		</tr>
	  		</tbody>
	  	</table>
  		</fieldset>
		<?php
		return $ind;
	}

	function mostradiasemana () {


		switch ($this->semana) {
			case 4:
			$semana = '4&ordf Semana';
			break;
			case 3:
			$semana = '3&ordf Semana';
			break;
			case 2:
			$semana = '2&ordf Semana';
			break;
			case 1:
			$semana = '1&ordf Semana';
			break;
			default:
			$semana = 'Semana N�o Informada!';
			break;
		}

		switch ($this->dia) {
			case 6:
			$dia = 'todo S�bado';//S�bado
			break;
			case 5:
			$dia = 'toda Sexta-Feira';//Sexta
			break;
			case 4:
			$dia = 'toda Quinta-Feira';//Quinta
			break;
			case 3:
			$dia = 'toda Quarta-Feira';//Quarta
			break;
			case 2:
			$dia = 'toda Ter�a-Feira';//Ter�a
			break;
			case 1:
			$dia = 'toda Segunda-Feira';//Ter�a
			break;
			case 0:
			$dia = 'todo Domingo';//Ter�a
			break;
			default:
			$dia = 'Dia N�o Informado';//Segunda
			break;
		}

		return 'Mensalmente '.$dia.' da '.$semana;

	}
}

?>
