<fieldset>
<legend>Alterar Per�odo</legend>
<form method="get" name='limpeza'>
	<table id="listTable" style="width: 100%;">
		<tbody>
			<tr>
				<td><label>M�s de Referencia:</label>
					<select name='mes' id='mes' autofocus='autofocus' class="form-control" tabindex="<?PHP echo ++$ind;?>"  >
						<option>N�o Alterar</option>
						<option value="02">De: Fev � Mar</option>
						<option value="04">De: Abr � Mai</option>
						<option value="06">De: Jun � Jul</option>
						<option value="08">De: Ago � Set</option>
						<option value="10">De: Out � Nov</option>
						<option value="12">De: Dez � Jan</option>
					</select>
				</td>
				<td><label>Ano</label>
					<input type="text" name="ano" class="form-control" tabindex="<?PHP echo ++$ind;?>" value="<?php echo date('Y');?>" />
				</td>
				<td><label>&nbsp;</label>
					<input type="submit"  tabindex="<?PHP echo ++$ind;?>" class="btn btn-primary" value="OK!" />
					<input type="hidden"  name="escolha" value="controller/limpeza.php" />
					<input type="hidden"  name="menu" value="top_tesouraria" />
				</td>
			</tr>
		</tbody>
	</table>
</form>
</fieldset>