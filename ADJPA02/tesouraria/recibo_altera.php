<?PHP
if ($_SESSION["setor"]=="2" || $_SESSION["setor"]>"50"){
	
$tab="adm/atualizar_dados.php";//link q informa o form quem chamar p atualizar os dados
$tab_edit="adm/recibo_altera.php&tabela=tes_recibo&campo=";//Link de chamada da mesma p�gina para abrir o form de edi��o do item
$dad_cad = mysql_query ("SELECT * FROM profissional WHERE rol='".$_SESSION["rol"]."'");
$arr_dad = mysql_fetch_array ($dad_cad);

$ind=1;

ver_cad();
?>
<div id="lst_cad">
	<?PHP
	if (!empty($_SESSION["rol"]))
	{
		if (!empty($arr_dad["rol"])) {
	?>
	<table width="550">
      <tr>
        <td>Profiss&atilde;o:
		<?PHP
		$nome = new editar_form("profissao",$arr_dad["profissao"],$tab,$tab_edit);
		$nome->getMostrar();$nome->getEditar();
		?>
	</td>
        <td>CPF:
		<?PHP
		$nome = new editar_form("cpf",$arr_dad["cpf"],$tab,$tab_edit);
		$nome->getMostrar();
		if ($_GET["campo"]=="cpf") { ?>
		
		<script language="JavaScript" type="text/javascript">
		alert("Cuidado! O sistema atualizar� o CPF, mesmo se n�mero for considerado INV�LIDO...");
		</script>
		
		<form method="post" action="" >
			<input type="text" name="cpf" id="cpf" maxlength="14" value="<?PHP echo $arr_dad["cpf"];?>" tabindex="<?PHP echo $ind++;?>"/>
			<input type="hidden" name="tabela" value="profissional" />
			<input type="hidden" name="campo" value="cpf" />
			<input type="hidden" name="cpf_atual" value="<?PHP echo $arr_dad["cpf"];?>" />
			<input type="hidden" name="escolha" value="adm/atualizar_dados.php" />
			<input type="hidden" name="menu" value="top_dados" />
			<input type="submit" name="submit" value="Alterar CPF ..." tabindex="<?PHP echo $ind++;?>"/>
		</form>
		<?PHP
		}
		?></td>
        <td>Identidade:
		<?PHP
		$nome = new editar_form("rg",$arr_dad["rg"],$tab,$tab_edit);
		$nome->getMostrar();$nome->getEditar();
		?>		</td>
      </tr>
      <tr>
        <td>Org&atilde;o expedidor:
		<?PHP
		$nome = new editar_form("orgao_expedidor",$arr_dad["orgao_expedidor"],$tab,$tab_edit);
		$nome->getMostrar();$nome->getEditar();
		?></td>
        <td colspan="2">Empresa onde Trabalha:
		<?PHP
		$nome = new editar_form("onde_trabalha",$arr_dad["onde_trabalha"],$tab,$tab_edit);
		$nome->getMostrar();$nome->getEditar();
		?></td>
      </tr>
	  
      <tr>
        <td colspan="3">Observa&ccedil;&otilde;es
		<?PHP
		$nome = new editar_form("obs",$arr_dad["obs"],$tab,$tab_edit);
		$nome->getMostrar();$nome->getEditar();
		?>		</td>
      </tr>
    </table>
	<?PHP
	}//Fim do if !empty($arr_dad["rol"]) quando n�o existe cadastro para este rol � aberto um form para preenchimento
	else {
		require_once ("adm/form_profis.php");
	}
	}}
	?>
</div>
</body>
</html>