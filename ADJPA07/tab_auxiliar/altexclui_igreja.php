<?php
  require_once 'forms/manutencao.php';
 ?>
<table class='table table-condensed table-striped' summary="Lista de todos as igrejas da Cidade." >
    <colgroup>
		<col id="Nome da atual">
		<col id="Ativa/Desativar">
		<col id="Excluir igreja!">
	</colgroup>
    <thead>
      <tr>
        <th scope="col">Nome da atual</th>
        <th scope="col">Ativa/Desativar</th>
        <th scope="col">Editar igreja!</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $options = new igreja();
	$lista = $options->Arrayigreja();
	while ($chave=key($lista)) {
		?>
		<tr>
			<td><?php echo '<b>'.$lista[$chave]['0'].'</b><br />'.$lista[$chave]['3'].', N&ordm;: '.$lista[$chave]['4'];?></td>
			<td>
				<?php
					if ($lista[$chave]['1']=='1')/*Status ativo da igreja*/{
						$status = '0';$scrStatus ='Desativar Igreja...';
						$titleButton = 'Encerra o funcionamento desta Igreja!';
						$butao = '<button type="submit" title="'.$titleButton.'" class="btn btn-danger btn-sm">'.$scrStatus.'</button>';
					}else {
						$status = '1';$scrStatus ='Ativar Igreja...';
						$titleButton = 'Reativar o funcionamento desta Igreja!';
						$butao = '<button type="submit" title="'.$titleButton.'" class="btn btn-success btn-sm">'.$scrStatus.'</button>';
					}

					if ($chave!='1') {
						?>
							<form method="post" action="">
								<input type="hidden" name="escolha" value="sistema/atualizar_rol.php">
								<input type="hidden" name="campo" value="status">
								<input type="hidden" name="tabela" value="igreja">
								<input type="hidden" name="id" value="<?php echo $chave;?>">
								<input type="hidden" name="status" value="<?php echo $status;?>">
								<?php echo $butao;?>
							</form>
						<?php
					}else {
						echo '<span class="divider" title="A sede n&atilde;o pode ser exclu&iacute;da!">Sede</span>';
					}
				?>
				</td>
				<td>
				<a href="./?escolha=forms/editar_igreja.php&tabela=igreja&bsc_rol=<?php echo $chave;?>"
				 title="Editar as informa&ccedil;&otilde;es gerais desta Igreja: Dirigente, secret�rio, tesoureiro, etc." >
				 <button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				&nbsp;Editar/Alterar dados... </button></a>
			</td>
    	</tr>
    		<?PHP
    		next($lista);
    	}
    ?>
    </tbody>
  </table>
