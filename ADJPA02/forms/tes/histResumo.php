<fieldset>
	<legend>Buscas por Congrega&ccedil;&atilde;o</legend>
	<form method="get" name="" action="">
	<table class='table'>
		<tbody>
			<tr>
				<td colspan="2">
					<label>Por Congrega&ccedil;&atilde;o:</label>
					<?php
					$bsccredor = new List_sele('igreja', 'razao', 'igreja');
					$listaIgreja = $bsccredor->List_Selec(++$ind,$_GET['igreja'],' class="form-control" autofocus="autofocus" ');
					echo $listaIgreja;
					?>
				</td><td>
					<input type="hidden" name="fin"	value="<?php echo $fin;?>" />
					<input type="hidden" name="rec"	value="<?php echo $rec;?>" />
					<br />
  				<button type="submit" class="btn btn-primary btn-sm" tabindex="<?PHP echo ++$ind; ?>" >Listar...</button>
					<input name="escolha" type="hidden" value="tesouraria/receita.php" />
					<input name="menu" type="hidden" value="top_tesouraria" />
				</td>
			</tr>
			<tr>
				<td><label>Dia:</label>
					<input type="text" class="form-control" size="2" maxlength="2" name="dia" value="<?php echo $_GET['dia'];?>"tabindex="<?PHP echo ++$ind; ?>" />
				</td>
				<td><label>M&ecirc;s:</label>
					<select name="mes" tabindex="<?PHP echo ++$ind; ?>" class="form-control" >
					      <?php
					      	$linha1 = '<option value="">Selecione o m&ecirc;s...</option>';
						      foreach(arrayMeses() as $mes => $meses) {
										$linha2 .= '<option value='.$mes.'>'.$meses.'</options>';
										if ($_GET['mes']==$mes) {
										$linha1 = '<option value='.$mes.'>'.$meses.'</options>'.$linha1;
										}
						      }
						      echo $linha1.$linha2;
					      ?>
				      </select>
				</td>
				<td><label>Ano:</label>
					<input type="text" name="ano" class="form-control" value="<?php echo $_GET['ano'];?>"
					placeholder='em branco lista os pendentes e ZERO os confimados'
					tabindex="<?PHP echo ++$ind; ?>" />
				</td>
			</tr>
			<tr>
				<td colspan='3'>
					<h5>No campo ANO: em branco lista os pendentes e ZERO os confimados</h5>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
</fieldset>
