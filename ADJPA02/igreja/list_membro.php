<?PHP
controle ("consulta");
$ordenar = new igreja ();
$arrayIg =$ordenar->Arrayigreja();

$_urlLi="?escolha=igreja/list_membro.php&menu=top_igreja&ord={$_GET["ord"]}&foto={$_GET["foto"]}&cargo={$_GET["cargo"]}&id=".($_GET["id"])."&ig=".($_GET["ig"]);//Montando o Link para ser passada a classe
if ($_GET["cargo"] != "6"){

require_once ('models/sec/listMembro.php');

	$nmpp="20"; //N�mero de mensagens por p�rginas
	$paginacao = Array();
	$paginacao['link'] = "?"; //Pagina��o na mesma p�gina

	//Faz os calculos na pagina��o
	$sql2 = mysql_query ($query) or die (mysql_error());
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
	$sql3 = mysql_query ($query." LIMIT $inicio,$nmpp") or die (mysql_error());
	//Executa a query no MySQL com limite de linhas para ser usado pelo while e montar a array

	 //inicia o cabe�alho de pagina��o

		{
		?>
		<table class='table table-hover table-striped table-bordered' >
		<caption>
		Lista de Membros
			<?PHP
			echo $titTabela;
			require_once ('views/secretaria/titTabIgreja.php');
			?>
		</caption>
			<colgroup>
				<col id="Rol">
				<col id="Nome">
				<col id="Congrega&ccedil;&atilde;o">
				<col id='Setor'>
				<col id="albumCol"/>
			</colgroup>
			<thead>
				<tr>
				<th scope="col"><a href="./?escolha=igreja/list_membro.php&menu=top_igreja&ord=1&cargo=<?PHP echo $_GET["cargo"];?>&id=<?PHP echo $_GET["id"];?>&pagina1=<?PHP echo $_GET["pagina1"]."&ig=".$_GET["ig"];?>" title="Ordenar por ROL">Rol
				<?PHP if ($_GET["ord"]=="1") {?>
				<img src="img/s_desc.png" width="11" height="9" border="0" />
				<?PHP } ?>
				</a></th>
				<th scope="col"><a href="./?escolha=igreja/list_membro.php&menu=top_igreja&cargo=<?PHP echo $_GET["cargo"];?>&id=<?PHP echo $_GET["id"];?>&pagina1=<?PHP echo $_GET["pagina1"]."&ig=".$_GET["ig"];?>" title="Ordenar por nome">Nome<?PHP if ($_GET["ord"]=="") {?>
				<img src="img/s_desc.png" width="11" height="9" border="0" />
				<?PHP } ?>
				</a></th>
				<th scope="col"><a href="./?escolha=igreja/list_membro.php&menu=top_igreja&cargo=<?PHP echo $_GET["cargo"];?>&ord=2&id=<?PHP echo $_GET["id"];?>&pagina1=<?PHP echo $_GET["pagina1"]."&ig=".$_GET["ig"];?>" title="Ordenar por Congrega&ccedil;&atilde;o">Congrega&ccedil;&atilde;o<?PHP if ($_GET["ord"]=="2") {?>
				<img src="img/s_desc.png" width="11" height="9" border="0" />
				<?PHP } ?>
				</a></th>
				<th scope="col">Setor</th>
				<th scope="col">Cargo</th>
				</tr>
			</thead>
			<tbody>
		<?PHP
			while($coluna = mysql_fetch_array($sql3))
			{

				$numRol = sprintf("%'04u", $coluna["membroRol"]);
				?>
	      <tr>
					<td><a href="./?escolha=adm/dados_pessoais.php&bsc_rol=<?php echo $coluna["membroRol"];?>"><?php echo $numRol;?></a></td>
					<td>
						<a href="./?escolha=adm/dados_pessoais.php&bsc_rol=<?php echo $coluna["membroRol"];?>">
							<div class="row">
		  					<div class="col-xs-2">
								<img src='<?php echo foto($coluna["membroRol"]);?>' class='thumb'
								 alt='Foto do Membro' width='24' height='32' />
							</div>
		  				<div class="col-xs-6">
								<?php echo $coluna["nome"];?>
							</div>
						</div>
						</a>
					<td>
						<?php
							echo $arrayIg[$coluna["congregacao"]]['0'];
						?>
					</td>
					<td class='text-center'>
						<?php
							echo nRomano($arrayIg[$coluna["congregacao"]]['5']);
						?>
					</td>
					<td>
						<?php
							echo cargo ($coluna["membroRol"])['0'];
						?>
					</td>
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
	$_rod->getRodape(); $_rod->form_rodape ("Ir para P&aacute;gina: ");
	//$_rod->getDados();
	if ($paginas>1)
		echo "<br><span class='style4'>Total de $paginas p&aacute;ginas";
		else
		echo "<br><span class='style4'>Total de $paginas p&aacute;gina";

		echo "<br />";
		if ($total>"1") {
			if ($total>"100")
				printf("Com %s membros!",number_format($total, 0, ',', '.'));
			else
				printf("Com %s Membros!",number_format($total, 0, ',', '.'));

		}elseif ($total=="1"){
			echo "Com apenas um Membro!";
		}else{
			echo "Com este crit&eacute;rio n&atilde;o obtivemos nenhum resultado, tente melhorar seu argumento de pesquisa!";
		}
	}else {
		require_once 'views/secretaria/dirigentes.php';
	}
?>
