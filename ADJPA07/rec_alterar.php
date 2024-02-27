<?PHP
$ind=1; //Define o indice dos campos do formul�rio
$id = (int) $_GET["id"];
if ($_SESSION["setor"]==2 || $_SESSION["setor"]>50){

if ($_POST['Submit']!='Listar Recibos...') {

$tab="sistema/atualizar_sistema.php";//link q informa o form quem chamar p atualizar os dados
$tab_edit='tesouraria/rec_alterar.php&menu=top_tesouraria&tabela=tes_recibo&id='.$_GET["id"].'&pag_mostra='.$_GET["pag_mostra"].'&campo=';//Link de chamada da mesma p�gina para abrir o form de edi��o do item


$rec_alterar = new DBRecord("tes_recibo", $id, "id");
list($anov, $mesv, $diav) = explode("-", $rec_alterar->data());
//echo '<br />  - Data atual - ultimo Vencimento: '.$rec_alterar->data().' ---- '. ceil( (mktime() - mktime(0,0,0,$mesv,$diav,$anov))/(3600*24));
$diasemissao = ceil( (mktime() - mktime(0,0,0,$mesv,$diav,$anov))/(3600*24)); //quantidade de dias ap�s a emiss�o do recibo

if ($diasemissao>'2') {
	echo '<h2>O prazo para altera��o deste recibo est� expirado!</h2> <h4>Voc&ecirc; poder&aacute imprimir como novo ou re-imprimir como est�.</h4>';
}

?>
<div id="tabs">
	<ul>
	  <li><a <?PHP link_ativo($_GET["rec"], "1");?> href="./?escolha=tesouraria/recibo.php&menu=top_tesouraria&rec=1"><span>Membros da Igreja</span></a></li>
	  <li><a <?PHP link_ativo($_GET["rec"], "2");?> href="./?escolha=tesouraria/recibo.php&menu=top_tesouraria&rec=2"><span>Pessoa Jur&iacute;dica</span></a></li>
	  <li><a <?PHP link_ativo($_GET["rec"], "3");?> href="./?escolha=tesouraria/recibo.php&menu=top_tesouraria&rec=3"><span>N�o Membros</span></a></li>
	</ul>
</div>
<fieldset>
	<div id="lst_cad">
		<table width="100%">
	      <tr style="background-color: transparent;">
			<td>Nome do Beneficiado:
				<?PHP
					switch ($rec_alterar->tipo)
					{
						case 1:
							$beneficiado = new DBRecord("membro", $rec_alterar->recebeu(), "rol");
							$recebeu = $beneficiado->nome();
							$form = new formmembro("recebeu",$recebeu,$tab,$tab_edit);
							$form->formcab();
							$form->getMostrar($rec_alterar->recebeu());	
							
							break;
						case 2:
							$beneficiado = new DBRecord("fornecedores", $rec_alterar->recebeu(), "id");
							$recebeu = $beneficiado->razao();
							$recebeu_CNPJ = $beneficiado->cnpj_cpf();
							$nome = new editar_form("recebeu",$recebeu,$tab,$tab_edit);
							$nome->getMostrar();
												
							if ($_GET["campo"]=='recebeu'){
								?>
									<form name="fornec" id="fornec" action="" method="post">
									<?php
									$for_num = new list_fornecedor("fornecedores", "alias", "recebeu");
									echo $for_num->List_sel($ind++);
									?>
									<input name="escolha" type="hidden" id="escolha" value="sistema/atualizar_sistema.php">
									<input name="campo" id="campo" type="hidden" value="recebeu">
									<input name="tabela" id="tabela" type="hidden" value="tes_recibo">
									<input name="id" id="id" type="hidden" value="<?php echo $id;?>">
									<input name="Submit" type="submit" value="Alterar..." >
									</form>
								<?php
							}				
							
							break;
						default:
							$recebeu = $rec_alterar->recebeu();
							$nome = new editar_form("recebeu",$recebeu,$tab,$tab_edit);
							$nome->getMostrar();$nome->getEditar();
							break;
					}
				?>
			</td>
	        <td>Recibo N&uacute;mero:
			<?PHP
			printf ("<p> %'05u</p>",$id);
			?>
			</td>
		</tr>
		<tr style="background-color: transparent;">
	        <td>Motivo do pagamento:
			<?PHP
			$nome = new editar_form("motivo",$rec_alterar->motivo(),$tab,$tab_edit);
			$nome->getMostrar();$nome->getEditar();
			?>
			</td>
	        <td>Fonte do Recurso:
	          <?PHP
			$nome = new editar_form("fonte",$rec_alterar->fonte(),$tab,$tab_edit);
			$fonte = new DBRecord("fontes", $rec_alterar->fonte(), "id");
			echo "<p>".$fonte->discriminar()."</p>";
			
			if ($_GET["campo"]=="fontes"){
				$for_num = new selfonte("fontes", "discriminar", "fonte");
				echo $for_num->List_sel($ind);
			
			//$nome->getEditar();
			}
			?></td>
	      </tr>
	      <tr style="background-color: transparent;">
	        <td>Data da emiss&atilde;o: 
	        <?PHP
			$nome = new editar_form("data",$rec_alterar->data(),$tab,$tab_edit);
			echo "<p>".conv_valor_br ($rec_alterar->data())."</p>";
			?>
			</td>
			<td>Valor: 
	        <?PHP
			$nome = new editar_form("valor",$rec_alterar->valor(),$tab,$tab_edit);
			echo "<p><a href='./?escolha={$tab_edit}valor'>R$ ".number_format($rec_alterar->valor(),2,",",".")."</a></p>";
			$nome->getEditar();
			
	
			?>
			</td>
			<td></td>
	      </tr>
	      <tr style="background-color: transparent;">
	        <td >Para Igreja:
				<?PHP
				if ($rec_alterar->igreja()<'1') {
					echo "<p>Templo Sede</p>";
				}else {
					$rec_igreja = new DBRecord('igreja',$rec_alterar->igreja(),'rol');
					echo "<p><a href='./?escolha={$tab_edit}igreja'>".$rec_igreja->razao()."</a></p>";}
											
				if ($_GET["campo"]=="igreja"){
				?>
				  <form id="form1" name="form1" method="post" action="">
		         <?PHP
				 	$congr = new List_sele ("igreja","razao","igreja");
				 	$congr->List_Selec ("$ind++;");
				 ?>
					<input name="escolha" type="hidden" id="escolha" value="sistema/atualizar_sistema.php">
					<input name="campo" id="campo" type="hidden" value="igreja">
					<input name="tabela" id="tabela" type="hidden" value="tes_recibo">
					<input name="id" id="id" type="hidden" value="<?php echo $id;?>">
					<input name="Submit" type="submit" value="Alterar..." >
				  </form>
				  <?php
					 }
				  ?>
			</td>
			<td >Recibo emitido por:
			<?PHP
				echo "<p>".$rec_alterar->hist()."</p>";
			?>
			</td>
	      </tr>
	      <tr style="background-color: transparent;">
			<?PHP
				require_once 'forms/alt_rec.php';
			?>
		</tr>
	    </table>	
	   </div>
</fieldset>
<?php			
	
}else {
	$listarecibos = new menutes();
	$listarecibos ->recibosmembros();
}
}
?>