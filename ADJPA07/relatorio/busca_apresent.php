<link rel="stylesheet" type="text/css" media="screen, projection" href="tabs.css" />
<fieldset>
<legend>Certid&atilde;o de Apresenta&ccedil;&atilde;o </legend>
<?PHP
controle ("consulta");
$_urlLi="?escolha=relatorio/busca_apresent.php&menu=top_formulario&campo=".trim($_GET["campo"]);//Montando o Link para ser passada a classe
//echo "<h1>".trim($_GET["valor"])."</h1>";
if (!empty($_GET['campo']))
	{
		$query = "SELECT * FROM cart_apresentacao WHERE ";
		switch ($_GET["campo"]) {
			case "dt_nasc":
				$query .= " DATE_FORMAT(dt_nasc,'%d/%m/%Y') = '".trim($_GET["valor"])."' ";
				break;
			case "dt_apresent":
				$query .= " DATE_FORMAT(dt_apresent,'%d/%m/%Y') = '".trim($_GET["valor"])."' ";
				break;
			case "id_cong":
				$query .= " {$_GET["campo"]} = '".trim($_GET["valor"])."' ";
				break;
			default:
				$query .= "{$_GET["campo"]} LIKE '%".trim($_GET["valor"])."%'  ";
				break;
		}
		$query .= 'ORDER BY rol DESC,nome';

		$nmpp="10"; //N�mero de mensagens por p�rginas
		$paginacao = Array();
		$paginacao['link'] = "?"; //Pagina��o na mesma p�gina
		//Faz os calculos na pagina��o
		$sql2 = mysql_query ("$query") or die (mysql_error());
		$total = mysql_num_rows($sql2) ; //Retorna o total de linha na tabela
		$paginas = ceil ($total/$nmpp); //Retorna o total de p�ginas
		if ($_GET["pagina1"]<1) {
			$_GET["pagina1"] = 1;
		} elseif ($_GET["pagina1"]>$paginas) {
			$_GET["pagina1"] = $paginas;
		}
		$pagina = $_GET["pagina1"]-1;
		if ($pagina<0) {$pagina=0;} //Especifica um valor p vari�vel p�gina caso ela esteja setada
		$inicio=$pagina * $nmpp; //Retorna qual ser� a primeira linha a ser mostrada no MySQL
		$sql3 = mysql_query ("$query"." LIMIT $inicio,$nmpp") or die (mysql_error());
		//Executa a query no MySQL com limite de linhas para ser usado pelo while e montar a array
		 //inicia o cabe�alho de pagina��o
		{
		$dadIgrej = new igreja();
	//print_r($dadIgrej->Arrayigreja());
		$detIgreja = $dadIgrej->Arrayigreja();
		?>
		<table class='table table-striped table-bordered'>
			<colgroup>
				<col id="Reg.">
				<col id="Data">
				<col id="Crian&ccedil;a">
				<col id="Congregacao">
				<col id="albumCol"/>
			</colgroup>
			<thead>
				<tr>
					<th scope="col">Reg.</th>
					<th scope="col">Data</th>
					<th scope="col">Crian&ccedil;a</th>
					<th scope="col">Congrega&ccedil;&atilde;o</th>
					<th scope="col">M&atilde;e</th>
				</tr>
			</thead>
			<tbody>
		<?PHP
			while($coluna = mysql_fetch_array($sql3))
			{
			$ls+=1;
			if ($ls>1)
					{
					$cor="class='odd'";
					$ls=0;
					}
					else
					{$cor="class='od2'";
					}
			?>
        <tr "<?php echo $cor;?>">
				<td><?php printf ("%'04u",$coluna["rol"]);?></td>
				<td><?php echo conv_valor_br ($coluna["dt_apresent"]);?></td>
				<td><a href="./?escolha=relatorio/dados_apresent.php&menu=top_formulario
					&id=<?php echo $coluna["rol"];?>" target="_blank"><?php echo $coluna["nome"];?>
				<span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a>
				</td>
				<td><?php echo $detIgreja[$coluna["id_cong"]]['0'];?></td>
				<td><?php echo $coluna["mae"];?></td>
			</tr>
			<?PHP
			}//loop while produtos
	?>
		</tbody>
		</table>
<?PHP
	}
	//Classe que monta o rodape
	$_rod = new rodape($paginas,$_GET["pagina1"],"pagina1",$_urlLi,8);//(Quantidade de p�ginas,$_GET["pag_rodape"],mesmo nome dado ao parametro do $_GET anterior  ,"$_urlLi",links por p�gina)
	$_rod->getRodape();$_rod->form_rodape_get ("Ir para P&aacute;gina: ","campo");
	//$_rod->getDados();
	if ($paginas>1)
		echo "<br><span class='style4'>Total de $paginas p&aacute;ginas";
		else
		echo "<br><span class='style4'>Total de $paginas p&aacute;gina";

	echo "<br />";
	if ($total>"1"){
		if ($total>"100"){
			printf("Com %s ocorr&ecirc;ncias! Tente melhorar seu argumento de pesquisa, para restringir um pouco mais o resultado!",number_format($total, 0, ',', '.'));
		}else{
			printf("Com %s ocorr&ecirc;ncias!",number_format($total, 0, ',', '.'));
		}
	}elseif ($total=="1"){
		echo "Com apenas uma ocorr&ecirc;ncias!";
	}else{
		echo "Com este crit&eacute;rio n&atilde;o obtivemos nenhum resultado, tente melhorar seu argumento de pesquisa!";
	}
}else{
	echo "Voc&ecirc; n&atilde;o colocou nenhum crit&eacute;rio de pesquisa!";
}
?>
</fieldset>
