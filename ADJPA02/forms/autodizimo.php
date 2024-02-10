<?php
//Texto de alerta
$alerta = '<br  /><div class="alert alert-danger alert-dismissible fade in" role="alert"> ';
$alerta .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
$alerta .='<span aria-hidden="true" >&times;</span></button> <strong>Culto de Miss&otilde;es!</strong>';
$alerta .='<br />Of. p/ miss&otilde;es. '.arrayDia($diaSema).' - ';
$alertaFild = ' &bull; <span class="text-danger text-blink"><span class="glyphicon glyphicon-exclamation-sign" ';
$alertaFild .= 'aria-hidden="true"></span> <strong>Culto de Miss&otilde;es</strong> ';
$alertaFild .= '<span class="glyphicon glyphicon-bell"aria-hidden="true"></span></span>';
//Alerta para o culto de miss�es
	$semLan = diaSem($dtlanc);
	list($diaLan,$mesLan,$anoLanc) = explode('/', $dtlanc);
	$diaSem = new DateTime("$anolanc-$mesLan-$diaLan 11:14:15.638276");
	$diaSema = $diaSem->format('w');
	if ($roligreja=='1' && $diaSema=='0' && $semLan=='2' ) {
		//2� domingo do m�s
		$alerta .='Sede</div>';
	} elseif ($diaSema=='0' && $semLan=='1'&& $roligreja!='1' ) {
		//1� domingo do m�s
		$alerta .='Congrega&ccedil;&atilde;o</div>';
	} else {
		$alertaFild = '';
		$alerta = arrayDia($diaSema).' - '.$dtlanc;
	}

 ?>
<!-- Desenvolvido por Wellington Ribeiro o autocompletar-->
<!-- O calculo da data do proximo lancamento caso n�o seja passsado esta no script 'forms/concluirdiz.php' -->
<fieldset>
<legend>D&iacute;zimo e Ofertas</legend>
<form method="post" name="" action="">
	<?php
		$bsccredor = new List_sele('igreja', 'razao', 'rolIgreja');
		$listaIgreja = $bsccredor->List_Selec(++$ind,$_GET['igreja'],'class="form-control" required="required" ');
		echo $listaIgreja;
	?>
<fieldset>
	<legend>D&iacute;zimos, Votos e Ofertas
		<?php
			echo $alertaFild;
		?>
	</legend>
	<?php

		require_once "forms/EasyAutocomplete.php";

	 ?>
	<table class='table'>
		<tbody>
			<tr>
				<td><label>Data: </label> <input type="text" id="data" name="data"
					value="<?php echo $dtlanc;?>" class="form-control" required="required"/>
					<?php
					//
					echo semana($dtlanc).'&ordf; Semana, ';
	 					list($i,$m,$y) = explode('/', $dtlanc);
	 					echo date('w',mktime(1,0,0,$m,$i,$y))+'1'.' &ordm; dia da semana ';
						// 	echo date ('w',mktime(1,0,0,$m,0,$y)).' ****ultimo dia do m�s';

					?>
				</td>
				<td><label>Referente M&ecirc;s:</label><input type="text" name="mes"
					size="2" value="<?php echo $meslanc;?>" class="form-control"
					 tabindex="<?php
					 	if ($_GET['igreja']=='1') {
					 		echo ++$ind;
					 	}?>" required="required" />
				</td>
				<td>
					 <label>Ano:</label> <input type="text"
					id="ano" name="ano" size="4" value="<?php echo $anolanc;?>"
					 required="required" class="form-control" />
				</td>
				<td><label>Congreg. do membro:</label> <input type="text" id="cong"
					class="form-control" disabled="disabled" value="" />
				</td>
			</tr>
		</tbody>
	</table>
	</fieldset>
	<fieldset>
		<legend>Cultos</legend>
		<table class='table'>
			<tbody>
				<tr>
					<td><label>D&iacute;zimo:</label><input type="text" id="oferta0" autocomplete="off"
						class="form-control money" name="oferta0" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$"  />
					</td>
					<td><label>Oferta:</label><input type="text" id="oferta1" autocomplete="off"
						 class="form-control money" name="oferta1" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$"  />
					</td>
					<td><label>Oferta Extra:</label><input type="text" id="oferta2" autocomplete="off"
						class="form-control money" name="oferta2" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$"  />
					</td>
				</tr>
				<tr>
					<td><label>Voto:</label><input type="text" id="oferta3" autocomplete="off"
						class="form-control money" name="oferta3" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$" />
					</td>
					<td>
						<?php
							echo $alerta;
						?>
					</td>
					<td><label>&nbsp;</label> <input class="btn btn-primary"
					type="submit" name="listar" value="Lan&ccedil;ar..."></td>
				</tr>
				<tr>
					<td colspan="2"><label> Qual Campanha?</label><?php
					$campanha = new List_campanha;
					echo $campanha -> List_Selec(++$ind,(int)$_GET['acescamp']);
					?>
					</td>
					<td><label>Oferta da Campanha:</label><input type="text" id="oferta4" autocomplete="off"
						 class="form-control money" name="oferta4" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$"  />
					</td>
			</tbody>
		</table>
	</fieldset>
	<fieldset>
		<legend>Miss&otilde;es</legend>
		<table class="table">
			<tbody>
				<tr>
					<td><label>Carn&ecirc;s:</label><input type="text" id="oferta8" autocomplete="off"
						class="form-control money" name="oferta8" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$ ( Carn&ecirc;s )"  />
					</td>
					<td><label>Oferta:</label><input type="text" id="oferta5" autocomplete="off"
						class="form-control money" name="oferta5" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$ ( Oferta )"  />
					</td>
					<td><label>Envelopes:</label><input type="text" id="oferta6" autocomplete="off"
						class="form-control money" name="oferta6" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$ ( Envelopes )"  />
					</td>
				</tr>
				<tr>
					<td><label>Cofres:</label><input type="text" id="oferta7" autocomplete="off"
						class="form-control money" name="oferta7" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$ ( Cofres )"  />
					</td>
					<td></td>
					<td> <label>&nbsp;</label> <input class="btn btn-primary"
					type="submit" name="listar" value="Lan&ccedil;ar..."></td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	<fieldset>
		<legend>Circulos de Ora&ccedil;&otilde;o</legend>
		<table class="table">
			<tbody>
				<tr>
					<td><label>Adulto:</label><input type="text" id="oferta9" autocomplete="off"
						class="form-control money" name="oferta9" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$"  />
					</td>
					<td><label>Mocidade:</label><input type="text" id="oferta10" autocomplete="off"
						class="form-control money" name="oferta10" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$"  />
					</td>
					<td><label>Infantil:</label><input type="text" id="oferta11" autocomplete="off"
						class="form-control money" name="oferta11" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$"  />
					</td>
				</tr>
				<tr>
					<td><label>Voto:</label><input type="text" id="oferta12" autocomplete="off"
						class="form-control money" name="oferta12" value="" tabindex="<?php echo ++$ind;?>"
						placeholder="Valor em R$"  />
					</td>
					<td></td>
					<td><label>&nbsp;</label> <input class="btn btn-primary"
					type="submit" name="listar" value="Lan&ccedil;ar..."></td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	<fieldset>
		<legend>Observa&ccedil;&atilde;o:</legend>
	<table class="table">
		<tbody>
			<tr>
				<td colspan="2"><textarea name="obs" id="obs" class="form-control"
						cols="50%" tabindex="<?php echo ++$ind;?>"></textarea>
				</td>
				<td><input type="hidden" name="tipo" id="tipo" value="1"> <input
					type="hidden" name="escolha" value="models/dizoferta.php"> <input
					type="submit" name="listar" value="Lan&ccedil;ar..."
					 class="btn btn-primary" tabindex="<?php echo ++$ind;?>">
				</td>
			</tr>
		</tbody>
	</table>
	</fieldset>
</form>
</fieldset>
