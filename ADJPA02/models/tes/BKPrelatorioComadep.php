<?php
$nivel1 = '';
$nivel2 = '';
$nivel3 = '';
$planoCta=array();
$cor=true;
$sldGrupo=array();
$sldNivel3 = array();
$sldGrupoN4 = '';

#Monta array com informa��es das contas atualmente
$plano = mysql_query('SELECT * FROM contas ORDER BY codigo ');
while ($cta = mysql_fetch_array($plano)) {
	$planoCta[$cta['id']]=array($cta['titulo'],$cta['acesso'],$cta['codigo'],$cta['tipo'],
		$cta['nivel4'],$cta['nivel3']);
	$planoGrupo[$cta['codigo']]=array($cta['titulo'],$cta['codigo'],$cta['tipo'],$cta['nivel4'],
		$cta['nivel3']);
}
//print_r($planoCta);
//Busca do movimento no m�s
$queryLanc  = 'SELECT l.*,DATE_FORMAT(l.data,"%Y%m") AS dt FROM lanc AS l';
$queryLanc .= ' WHERE DATE_FORMAT(data,"%Y%m")<="'.$a.$m.'"';
if ($idIgreja>'0' && $idIgreja!='-1') {
$queryLanc .= ' AND igreja="'.$idIgreja.'"';
}elseif ($idIgreja=='-1') {
$queryLanc .= ' AND igreja!="1"';
}
//$queryLanc .= ' AND c.id=l.creditar';
//$queryLanc .= ' ORDER BY ';
$lista = mysql_query($queryLanc) or die(mysql_error());
while ($contas = mysql_fetch_array($lista)) {

	$ctaDeb   = $planoCta[$contas['debitar']]['2'];#Codigo da cta
	$tipoDeb  = $planoCta[$contas['debitar']]['3'];#Tipo da Cta -> D/C
	$ctaCred  = $planoCta[$contas['creditar']]['2'];#Codigo da cta
	$tipoCred = $planoCta[$contas['creditar']]['3'];#Tipo da Cta -> D/C
				//$credito += $contas['valor'];
	$dataLancDeb[] = array( 'Cod'=>$ctaDeb,'Data'=>$contas['data'], 'Vlr'=>$contas['valor']);
	$dataLancCred[] = array( $ctaCred,$contas['data'], $contas['valor']);
#echo $ctaDeb." -- ";
#echo $ctaCred."<br />";
	if ($contas['dt']==$a.$m) {
			//Movimento do m�s atual
			//Contas debitadas
			$saldo[$ctaDeb] += $contas['valor'];
			$sldGrupo [$planoCta[$contas['debitar']]['4']] += $contas['valor'];
			//Contas creditadas
			$saldo[$ctaCred] -= $contas['valor'];
			$sldGrupo [$planoCta[$contas['creditar']]['4']] -= $contas['valor'];
			//$debito  += $contas['valor'];//Movimento do
		}else {
			//saldo meses anteriores
			//Contas debitadas
				$saldoDisp[$ctaDeb] += $contas['valor'];
				$sldGrupoDisp [$planoCta[$contas['debitar']]['4']] += $contas['valor'];
			//Contas creditadas
				$saldoDisp[$ctaCred] -= $contas['valor'];
				$sldGrupoDisp [$planoCta[$contas['creditar']]['4']] -= $contas['valor'];

			/*Quando houver saldo, mas sem movimento no mes, aqui � for�ado
			 * a aparecer
			*/
			if ($saldo[$ctaCred]==0) {
				$saldo[$ctaCred] = 0;
			}
			if ($saldo[$ctaDeb]==0) {
				$saldo[$ctaDeb] = 0;
			}
		}
}
$ctaAtual = '';
//print_r($sldGrupo);
//echo $planoCta['5']['4'];
//$saldo = array_merge($saldoDisp,$saldo);
//print_r($saldo);
ksort($saldo); #Ordena o array pela chave
//echo "<br />";
//print_r($saldo);

/* print_r($dataLancDeb);
echo "<br/><br/><br/>";
print_r($dataLancCred);
*/
#print_r($saldo);
$grpFim = FALSE;
foreach ($saldo AS $chave => $valor){
		//$acesso = sprintf("[%04s]\n", $planoCta[$chave]['1']);
		$acesso = '';
		$vlrSaldo = abs($saldo[$chave]);
/*
		if ($planoGrupo[$chave]['2']=='D') {
				$debito += $vlrSaldo;
			}elseif ($planoGrupo[$chave]['2']=='C') {
				$credito += $vlrSaldo;
			} else {
				$grupoFora .= $chave.' - '.$planoGrupo[$chave]['2'].' ** ';
				$sldFora .= $vlrSaldo.' - ';
			}
*/
		$vlrSaldo = number_format($vlrSaldo,2,',','.');
		if ($saldo[$chave]<0) {
				$vlrSaldo .= 'C';
			}elseif ($saldo[$chave]>0) {
				$vlrSaldo .= 'D';
			}

		$vlrSaldoDisp = number_format(abs($saldoDisp[$chave]),2,',','.');
		if ($saldoDisp[$chave]<0) {
				 $vlrSaldoDisp .= 'C';
			}elseif ($saldoDisp[$chave]>0) {
				$vlrSaldoDisp .= 'D';
			}

		$vlrSaldoAtual = number_format(abs($saldo[$chave]+$saldoDisp[$chave]),2,',','.');
		if (($saldo[$chave]+$saldoDisp[$chave])<0) {
				$vlrSaldoAtual  .= 'C';
			}elseif (($saldo[$chave]+$saldoDisp[$chave])>0) {
				$vlrSaldoAtual .= 'D';
			}

	//	$grupoAtualForm = number_format(abs($sldGrupoAtual),2,',','.');
		if ($sldGrupoAtual<0) {
				$grupoAtualForm .= 'C';
			}elseif ($sldGrupoAtual>0) {
				$grupoAtualForm .= 'D';
			}

		//echo $planoCta[$chave]['4'].' -- ';
		if ($ctaAtual==$planoGrupo[$chave]['3'] || $ctaAtual==''){
				//Contas simples
			$nivel1 .='<tr><td>'.$planoGrupo[$chave]['1'].'</td><td title="'.$title.'">'.$acesso.$planoGrupo[$chave]['0'].
				'</td><td id="moeda">'.$vlrSaldo.'</td><td id="moeda">'.$vlrSaldoAtual.'</td><td id="moeda">'.$vlrSaldoDisp.'</td></tr>';
		}else {

		//Contas Nivel 3
			$sldNivel3Atual[$sldGrupoN4] += $sldGrupoAtual;//Sld atual grupo n�vel 3
			$sldNivel3Mov[$sldGrupoN4] += $sldGrupoCta;//Sld do movimento grupo n�vel 3
			$sldNivel3Ant[$sldGrupoN4] += $sldGrupoCtaDisp;//Sld anterior grupo n�vel 3
			if ($sldNivel3Mov[$sldGrupoN4]>'0') {
				$movSld = 'D';
			} elseif ($sldNivel3Mov[$sldGrupoN4]<'0') {
				$movSld = 'C';					
			}else {
				$movSld = '';
			}
			
			if ($sldNivel3Atual[$sldGrupoN4]>'0') {
				$saldoAtl = 'D';
			} elseif ($sldNivel3Atual[$sldGrupoN4]<'0') {
				$saldoAtl = 'C';					
			}else {
				$saldoAtl = '';
			}

			if ($sldNivel3Ant[$sldGrupoN4]>'0') {
				$saldoAntr = 'D';
			} elseif ($sldNivel3Ant[$sldGrupoN4]<'0') {
				$saldoAntr = 'C';					
			}else {
				$saldoAntr = '';
			}

			
			//echo ' - Conta -> '.$planoGrupo[$sldGrupoN3]['3'].'-'.$planoGrupo[$sldGrupoN3]['0'].' - '.$sldNivel3Atual[$sldGrupoN3];
			$n3Grupo ='<tr class="danger"><td>'.$sldGrupoN4.'</td><td title="'.$title.'">'
				.$planoGrupo[$sldGrupoN4]['0'].'</td><td id="moeda">'.number_format(abs($sldNivel3Mov[$sldGrupoN4]),2,',','.').$movSld
				./*$planoGrupo[$ctaAtual]['2'].*/'</td><td id="moeda">'.number_format(abs($sldNivel3Atual[$sldGrupoN4]),2,',','.').$saldoAtl.'</td>
				<td id="moeda">'.number_format(abs($sldNivel3Ant[$sldGrupoN4]),2,',','.').$saldoAntr/*$planoGrupo[$ctaAtual]['2']*/.'</td></tr>';

			//Grupo de contas//Contas Nivel 4
			$sldNivel4Atual[$ctaAtual] += $sldGrupoAtual;//Sld atual grupo n�vel 4
			if ($sldGrupoCta>'0') {
				$movSld = 'D';
			} elseif ($sldGrupoCta<'0') {
				$movSld = 'C';					
			}else {
				$movSld = '';
			}

			if ($sldGrupoAtual>'0') {
				$saldoAtl = 'D';
			} elseif ($sldGrupoAtual<'0') {
				$saldoAtl = 'C';					
			}else {
				$saldoAtl = '';
			}

			if ($sldGrupoCtaDisp>'0') {
				$saldoAntr = 'D';
			} elseif ($sldGrupoCtaDisp<'0') {
				$saldoAntr = 'C';					
			}else {
				$saldoAntr = '';
			}

			$nivelGrupo ='<tr class="primary"><td>'.$planoGrupo[$ctaAtual]['1'].'</td><td title="'.$title.'">'
				.$planoGrupo[$ctaAtual]['0'].'</td><td id="moeda">'.number_format(abs($sldGrupoCta),2,',','.').$movSld
				./*$planoGrupo[$ctaAtual]['2'].*/'</td><td id="moeda">'.number_format(abs($sldGrupoAtual),2,',','.').$saldoAtl.'</td>
				<td id="moeda">'.number_format(abs($sldGrupoCtaDisp),2,',','.').$saldoAntr/*$planoGrupo[$ctaAtual]['2']*/.'</td></tr>';
			
			if ($nivel2 == '') {
				$nivel2 = $n3Grupo.$nivelGrupo.$nivel1;
				$nivelTipo .= $nivelGrupo; //Sem n�vel de codigo
				//$sldGrupoN4 = $planoGrupo[$chave]['4'];
			}elseif ($sldGrupoN4 != $planoGrupo[$chave]['4']) {
				$nivel3 .= $nivel2./*$n3Grupo.*/$nivelGrupo.$nivel1;
				$nivelTipo .= $nivelGrupo;//Sem n�vel de codigo
				$nivel2 = '';
			}else {
				$nivel2 = $nivel2.$nivelGrupo.$nivel1;			
				//$nivel2 = $nivelGrupo;
				$nivelTipo .= $nivel2;//Sem n�vel de codigo
				$nivelGrupo ='';
				$grpFim = FALSE;
			}

			if ($sldGrupoN4!='' && $sldGrupoN4!=$planoGrupo[$chave]['4']) {
				$nivel4 = $n3Grupo.$nivel4;
				//$sldGrupoN4 = $planoGrupo[$chave]['4'];
			}else {
				$nivel4 .= $nivel2;
			}

			$saldoAtual=0;
			//Contas simples
			$nivel1 ='<tr><td>'.$planoGrupo[$chave]['1'].'</td><td title="'.$title.'">'.$acesso.$planoGrupo[$chave]['0'].
			'</td><td id="moeda">'.$vlrSaldo.'</td><td id="moeda">'.$vlrSaldoAtual.'</td><td id="moeda">'.$vlrSaldoDisp.'</td></tr>';

		}

		$sldGrupoCta = $sldGrupo [$planoGrupo[$chave]['3']];
		$sldGrupoCtaDisp = $sldGrupoDisp [$planoGrupo[$chave]['3']];
		$sldGrupoAtual = $sldGrupoCtaDisp+$sldGrupoCta;//Sld atual grupo n�vel
		$ctaAtual = $planoGrupo[$chave]['3'];//Conta de n�vel 4

		$sldGrupoN4 = $planoGrupo[$chave]['4'];//Conta de n�vel 3

}

/*
echo ' <br /><br /><br /> ';
print_r ($sldNivel3Atual);
echo ' <br /><br /><br /> ';
print_r ($sldNivel3Ant);
echo ' <br /><br /><br /> ';
print_r ($sldNivel3Mov);
echo ' <br /><br /><br /> '.$sldNivel3Atual['1.1.1'];
print_r ($planoGrupo);
*/
//Testar pq n�o est� entrando no loop
//Exibe a �ltima passagem das contas e finaliza os dados da tabela
//Esta acresntando na ultima passagem, no final do relatorio e repetindo o grupo, as contas fora do grupos qdo elas tem saldo ap�s o loop
//Rever para agrupar dentro de seu grupo



	if ($sldGrupoCta>'0') {
		$saldoCta = 'D';
	} elseif ($sldGrupoCta<'0') {
		$saldoCta = 'C';					
	}else {
		$saldoCta = '';
	}

	if ($sldGrupoAtual>'0') {
		$saldoAtl = 'D';
	} elseif ($sldGrupoAtual<'0') {
		$saldoAtl = 'C';					
	}else {
		$saldoAtl = '';
	}

	if ($sldGrupoCtaDisp>'0') {
		$saldoCtaDisp = 'D';
	} elseif ($sldGrupoCtaDisp<'0') {
		$saldoCtaDisp = 'C';					
	}else {
		$saldoCtaDisp = '';
	}

	$nivelGrupo ='<tr class="primary"><td>'.$planoGrupo[$ctaAtual]['1'].'</td><td title="'.$title.'">'.$planoGrupo[$ctaAtual]['0'].'</td><td id="moeda">
				'.number_format(abs($sldGrupoCta),2,',','.').$saldoCta.'</td><td id="moeda"> '
				.number_format(abs($sldGrupoAtual),2,',','.').$saldoAtl.'</td><td id="moeda">
				'.number_format(abs($sldGrupoCtaDisp),2,',','.').$saldoCtaDisp.'</td></tr>';

	//Contas Nivel 3
			$sldNivel3Atual[$sldGrupoN4] += $sldGrupoAtual;//Sld atual grupo n�vel 3
			$sldNivel3Mov[$sldGrupoN4] += $sldGrupoCta;//Sld do movimento grupo n�vel 3
			$sldNivel3Ant[$sldGrupoN4] += $sldGrupoCtaDisp;//Sld anterior grupo n�vel 3
			if ($sldNivel3Mov[$sldGrupoN4]>'0') {
				$movSld = 'D';
			} elseif ($sldNivel3Mov[$sldGrupoN4]<'0') {
				$movSld = 'C';					
			}else {
				$movSld = '';
			}
			
			if ($sldNivel3Atual[$sldGrupoN4]>'0') {
				$saldoAtl = 'D';
			} elseif ($sldNivel3Atual[$sldGrupoN4]<'0') {
				$saldoAtl = 'C';					
			}else {
				$saldoAtl = '';
			}

			if ($sldNivel3Ant[$sldGrupoN4]>'0') {
				$saldoAntr = 'D';
			} elseif ($sldNivel3Ant[$sldGrupoN4]<'0') {
				$saldoAntr = 'C';					
			}else {
				$saldoAntr = '';
			}

			
			//echo ' - Conta -> '.$planoGrupo[$sldGrupoN3]['3'].'-'.$planoGrupo[$sldGrupoN3]['0'].' - '.$sldNivel3Atual[$sldGrupoN3];
			$n3Grupo ='<tr class="primary"><td>'.$sldGrupoN4.'</td><td title="'.$title.'">'
				.$planoGrupo[$sldGrupoN4]['0'].'</td><td id="moeda">'.number_format(abs($sldNivel3Mov[$sldGrupoN4]),2,',','.').$movSld
				./*$planoGrupo[$ctaAtual]['2'].*/'</td><td id="moeda">'.number_format(abs($sldNivel3Atual[$sldGrupoN4]),2,',','.').$saldoAtl.'</td>
				<td id="moeda">'.number_format(abs($sldNivel3Ant[$sldGrupoN4]),2,',','.').$saldoAntr/*$planoGrupo[$ctaAtual]['2']*/.'</td></tr>';

	$nivel3 .= $n3Grupo.$nivelGrupo.$nivel1;
	$nivelTipo .= $nivelGrupo;//Sem n�vel de codigo


$nivel1=$nivelTipo;//Para op��o de exibir contas sem c�digo de acesso (c�digo completo)
//echo $grupoFora;
$nivel2 = $nivel3;
?>
