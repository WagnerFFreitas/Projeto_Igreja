<table class="table table-hover table-condensed table-striped table-bordered">
	<caption class='text-left'>Lan&ccedil;amento Realizado!
		<?php
			$reg = (empty($reg)) ? '' : ' Reg. N&ordm; '.$reg  ;
			echo $reg;
		?>
	</caption>
		<colgroup>
			<col id="Conta">
			<col id="D&eacute;bito">
			<col id="Cr&eacute;dito">
			<col id="Valor (R$)">
			<col id="albumCol"/>
		</colgroup>
	<thead>
		<tr>
			<th scope="col">Conta</th>
			<th scope="col" class="text-center">D&eacute;bito (R$)</th>
			<th scope="col" class="text-center">Cr&eacute;dito (R$)</th>
			<th scope="col" class="text-center">Saldo Atual</th>
			<th scope="col" class="text-center">Saldo Anterior</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php
				echo $exibideb;//Valor retirado do script models/feccaixaculto.php
				echo $exibicred;//Valor retirado do script models/feccaixaculto.php
			?>
		</tr>
	</tbody>
	<tfoot>
		<?php
			echo $exibiRodape;
		?>
	</tfoot>
</table>
