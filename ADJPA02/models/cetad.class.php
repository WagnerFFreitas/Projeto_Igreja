<?php
class cetad {

	function __construct (){
	
		$this->mes = (int) $_GET["mes"];
		//m�s inicial para listagem
		
		if ($this->mes<1 || $this->mes>12){
		//Se n�o for atribuido qualquer m�s inicial ou se estiver fora da faixa ter� janeiro como in�cio.
			$this->mes = "01";
		}
	}
	
	function caixa() {
	
	//$semana = date('W') + $_GET["proxima"];
	//if ($semana<10 && $semana>0) {$semana="0".$semana;}
		
	/*if ($semana < "1"){
		echo "<script> alert('Voc� j� atingiu o Ano anterior!');</script>";
		echo "Voc� j� atingiu o Ano anterior!";
	} elseif ($semana > "53") {
		echo "<script> alert('Voc� j� atingiu o Ano seguinte!');</script>";
		echo "Voc� j� atingiu o Ano seguinte!";
	}*/
		
		$sql_aluno = mysql_query ("SELECT p.id_aluno,m.nome,a.rol FROM cetad_pgto AS p, cetad_aluno AS a, membro AS m WHERE a.rol = m.rol AND a.id = p.id_aluno GROUP BY p.id_aluno ORDER BY m.nome") or die (mysql_error());
		
		while($this->nome=mysql_fetch_array($sql_aluno))
		{
			$inc++;
			$item++;
			
			if ($inc==1) { echo "<tr class='odd'>"; } else {echo "<tr class='dados'>"; $inc=0;}
			
			echo "<td>$item</td><td><a href='./?escolha=adm/dados_pessoais.php&bsc_rol={$this->nome["rol"]}'>{$this->nome["nome"]}</a></td>";
			
			for ($loop_mes = 1 ; $loop_mes < 13; $loop_mes ++){
			
				$this -> pgto = mysql_query ("SELECT pgto FROM cetad_pgto WHERE id_aluno = '{$this->nome ["id_aluno"]}' AND DATE_FORMAT(data_pgto,'%m')= $loop_mes ") or die (mysql_error());
				
				$this -> valor = mysql_fetch_array($this -> pgto);
		
				printf ("<td>%s</td>",number_format($this->valor["pgto"], 2, ',', '.'));
				$total_mes[$loop_mes] += $this->valor["pgto"];
				$total_ano += $this->valor["pgto"];
			}
			echo "</tr>";
			
			
		}
		echo "<tr><td colspan='2'>Totais</td>";
		for ($totais = 1 ; $totais < 13; $totais ++){
			printf ("<td>%s</td>",number_format($total_mes[$totais], 2, ',', '.'));
		}
		echo "</tr>";
		printf  ("Total de recebimentos no ano: R$ %s",number_format($total_ano, 2, ',', '.'));
	}
	
}
