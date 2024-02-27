<?php
class tes_relatLanc {

function __construct() {
		$this->var_string  = 'SELECT l.lancamento,DATE_FORMAT(l.data,"%d/%m/%Y") AS data,l.igreja,';
		$this->var_string .= 'l.valor,l.hist,h.referente,l.debitar,l.creditar, i.razao ';
		$this->var_string .= 'FROM lanc AS l, igreja AS i, lanchist AS h ';
		$this->var_string .= 'WHERE l.igreja=i.rol AND l.lancamento=h.idlanca ';
	}

function histLancamentos ($igreja,$mes,$ano,$dia,$cta,$deb,$cred,$ref,$numLanc,$vlrLanc) {
	$queryContas = mysql_query('SELECT id,acesso,titulo,codigo FROM contas') or die (mysql_error());
	while ($ctas = mysql_fetch_array($queryContas)) {
		$conta[$ctas['id']] = array ('acesso'=>$ctas['acesso'],'titulo'=>$ctas['titulo'],'codigo'=>$ctas['codigo'],
			'tipo'=>$ctas['tipo']);
	}
/*
	$queryIgrejas = mysql_query('SELECT rol,razao FROM igreja') or die (mysql_error());
	while ($igrejaNome = mysql_fetch_array($queryIgrejas)) {
		$dadosIgreja[$igrejaNome['rol']] = array ('nome'=>$igrejaNome['razao']);
	}
*/
	//print_r ($conta);
	#Filtro por igreja
	if ($igreja>'0' ) {
		$opIgreja= $this->var_string.'AND l.igreja = "'.$igreja.'" ';
	}else {
		$opIgreja = $this->var_string;
	}
	#Filtro por data
	$dataFiltro = $dia.'/'.$mes.'/'.$ano;
	if (checadata ($dataFiltro)) {
		$opIgreja .= 'AND DATE_FORMAT(l.data,"%d%m%Y")="'.$dia.$mes.$ano.'" ';
	}elseif ($mes>'0' && $mes<'13' && ($ano=='' || $ano<'2011')) {
		$opIgreja .= 'AND DATE_FORMAT(l.data,"%m")="'.$mes.'" ';
	}elseif (($mes<'1' || $mes>'12') && $ano!='' && $ano<=date('Y') && $cta!='') {
		$opIgreja .= 'AND DATE_FORMAT(l.data,"%Y")="'.$ano.'" ';
	} elseif ($mes>='1' && $mes<='12' && $ano!='' && $ano<=date('Y') ) {
		$opIgreja .= 'AND DATE_FORMAT(l.data,"%m%Y")="'.$mes.$ano.'" ';
	}else {
		$opIgreja .= 'AND DATE_FORMAT(l.data,"%Y")="'.$ano.'" ';
	}
	#filtro por conta
	if ($cta!='') {
		if ($deb=='1' && $cred=='') {
			$opIgreja .= 'AND debitar="'.$cta.'" ';
		}elseif ($cred=='1' && $deb=='') {
			$opIgreja .= 'AND creditar="'.$cta.'" ';
		}else {
			$opIgreja .= 'AND (creditar="'.$cta.'" OR debitar="'.$cta.'") ';
		}
		//$opIgreja .= 'AND DATE_FORMAT(l.data,"%m%Y")="'.$mes.$ano.'" ';
	}
	#Filtro para campo referente
	if ($ref!='') {
		$opIgreja .= 'AND h.referente LIKE "%'.$ref.'%" ';
	}
	#Filtro por valor
	if ($vlrLanc != '') {
		$opIgreja .= 'AND l.valor = "'.$vlrLanc.'" ';
	}
	#Filtro por número de lançamento
	if ($numLanc!='') {
		$opIgreja = $this->var_string.' AND l.lancamento = "'.$numLanc.'" ';
	}
	$opIgreja .= 'ORDER BY l.data,l.igreja,l.lancamento,l.valor,l.debitar ';
	$dquery = mysql_query($opIgreja) or die (mysql_error());
	$tabela = '';
	$tabModeloExt = '';
	$lancAtual = '';  $lancamento = $lancAtual;$valorCaixaDeb=0;$CaixaCentral='';
	$CaixaMissoes ='';$CaixaOutros='';$vlrTotal =0;
	while ($linha = mysql_fetch_array($dquery)) {
		//$bgcolor = 'class="odd"';
		$lancAtual = $linha['lancamento'];
		if ($lancLog=='') {
			list($dtLog,$horaLog,$cpfLog) = explode(' ', $linha['hist']);
			if (checadata ($dtLog)) {
				list($dd,$mm,$YY) = explode('/', $dtLog);
				$d = new DateTime("$YY-$mm-$dd $horaLog");
				$dtLog = strftime(", (%A) %d de %B de %Y &agrave;s %T",$d->getTimestamp());
				$lancLog = ' Lan&ccedil;amento usando CPF n&ordm; '.$cpfLog.$dtLog;
			} else {
				$lancLog = ' '.$linha['hist'];
			}
		}
		if ($lancAtual!=$lancamento && $lancamento!='') { //Verificar se ainda estar no mesmo lançamento
			if ($valorCaixaDeb<=0) {
				$CaixaDep='';
			}
			//$bgcolor = $cor ? 'class="odd"' : 'class="odd3"';
			$valores='';
			$valorCaixaDeb = number_format($valorCaixaDeb,2,',','.');
			$lancValorCaixa = '<p id="moeda">'.$valorCaixaDeb.'C</p>';//Formata o valor p/ ser apresentado
			$dataLanc  = '<span class="badge">Data do Lan&ccedil;amento: ';
			$dataLanc  .= $dtLanc.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$numLanc.'</span>';
			$referente .= $dataLanc;
			$referente .= $CaixaCentral.$CaixaMissoes.$CaixaOutros.$titulo1;
			$historico  = '<tr class=""><td colspan="2"><strong>Hist&oacute;rico:</strong>'.$historico.'</td></tr>';
			if (!isset($_GET['tipo'])) {
				list($dtLog,$horaLog,$cpfLog) = explode(' ', $linha['hist']);
				if (checadata ($dtLog)) {
					list($dd,$mm,$YY) = explode('/', $dtLog);
					$d = new DateTime("$YY-$mm-$dd $horaLog");
					$dtLog = strftime(", (%A) %d de %B de %Y &agrave;s %T",$d->getTimestamp());
					$lancLog = ' Lan&ccedil;amento usando CPF n&ordm; '.$cpfLog.$dtLog;
				} else {
					$lancLog = ' '.$linha['hist'];
				}
				$historico .='<tr class="bg-danger"><td colspan="2"><strong>Log:</strong>'.$lancLog.'</td></tr>';
			}
			$tabela .= '<tr class="active"><td colspan="2">'.$referente.'</td></tr>'.$historico;
			//Modelo extrato bamcário
			$histExtr = '<p>'.$linha['referente'].', '.$linha['razao'].'</p>';
			if ($conta[$linha['debitar']]['tipo']=='D') {
				if ($conta[$linha['creditar']]['tipo']=='C') {
					$sld = 'C';
				} else {
					$sld = 'D';
				}
			} else {
				if ($conta[$linha['creditar']]['tipo']=='C') {
					$sld = 'D';
				} else {
					$sld = 'C';
				}
			}
			$ctaDupla = $conta[$linha['debitar']]['titulo'].'<br /> à <br />';
			$ctaDupla .= $conta[$linha['creditar']]['titulo'].$histExtr;
			if (empty($cabData) || $cabData!=$dtLanc) {
				$viewCabTr = '<tr class="active"><td colspan="2">'.$dtLanc.'</td>';
				$cabData = $dtLanc;
			}
			$tabModeloExt .= $viewCabTr.'<tr><td>'.$ctaDupla.'</td>';
			$viewCabTr = '';
			$tabModeloExt .= '<td class="text-right" >'.$linha['valor'].$sld.'</td></tr>';
			//$cor = !$cor;
			$referente  = '';$CaixaMissoes ='';$CaixaOutros='';$valorMissoes=0;
			$titulo1  = '';$lancValor = '';$valorCentral=0;$historico='';$CaixaCentral='';
		}
		$dtLanc = $linha['data'];
		//Texto do histórico de cada lançamento
		if ($lancamento != $lancAtual) {
			$historico  = '<p>'.$linha['referente'].', '.$linha['razao'].'</p>';
		}
		$lancamento = $lancAtual;
		$histAnterior = $linha['referente'];
			if ($conta[$linha['debitar']]['codigo']=='1.1.1.001.001') {
				# Acumula o total para o Caixa Central
				$valorCentral += $linha['valor'];
				$CaixaCentral  = '<tr><td>'.$conta[$linha['debitar']]['codigo'].' &bull; '
					.$conta[$linha['debitar']]['titulo']
					.'</td><td class="text-right">'.number_format($valorCentral,2,',','.').'D</td></tr>';
			} elseif ($conta[$linha['debitar']]['codigo']=='1.1.1.001.002') {
				# Acumula o total para o Caixa Missões
				$valorMissoes += $linha['valor'];
				$CaixaMissoes  = '<tr><td>'.$conta[$linha['debitar']]['codigo'].' &bull; '
					.$conta[$linha['debitar']]['titulo']
					.'</td><td class="text-right">'.number_format($valorMissoes,2,',','.').'D</td></tr>';
			}else {
				# Cria a linha dos demais débitos
				$valorOutros = $linha['valor'];
				$CaixaOutros  .= '<tr><td>'.$conta[$linha['debitar']]['codigo'].' &bull; '
					.$conta[$linha['debitar']]['titulo']
					.'</td><td class="text-right">'.number_format($valorOutros,2,',','.').'D</td></tr>';
			}
			$titulo1  .= '<tr><td>'.$conta[$linha['creditar']]['codigo'].' &bull; '
							.$conta[$linha['creditar']]['titulo']
							.'</td><td class="text-right">'.number_format($linha['valor'],2,',','.').'C</td></tr>';
			$valor = number_format($linha['valor'],2,',','.');
			//$valores ='<p id="moeda">'.$valor.' D</p>';//Valores das demais cta's que não sejam do caixa
			//$lancValor .= $valores;
		$numLanc = sprintf ("N&ordm;: %'05u",$lancamento);
		if (!empty($cta) && $linha['debitar']==$cta) {
			$vlrTotal -=$linha['valor'];
		}else {
			$vlrTotal +=$linha['valor'];
		}
		}
		if ($titulo1 != '') {
			$dataLanc  = '<p><span class="badge">Data do Lan&ccedil;amento: ';
			$dataLanc  .= $dtLanc.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$numLanc.'</span></p>';
			$referente .= $dataLanc.$CaixaCentral.$CaixaMissoes.$CaixaOutros.$titulo1;
			$historico = '<tr><td colspan="2"><strong>Hist&oacute;rico:</strong>'.$historico.'</td></tr>';
			if (!isset($_GET['tipo'])) {
				$historico .='<tr class="bg-danger"><td colspan="2"><strong>Log:</strong>'.$lancLog.'</td></tr>';
			}
			$tabela .= '<tr class="active"><td colspan="2">'.$referente.'</td></tr>'.$historico;
			//Modelo Extrato Bancario
			$tabModeloExt .= $viewCabTr.$CaixaMissoes.$CaixaOutros.$titulo1;
			$tabModeloExt .= '<td class="text-right" >'.$linha['valor'].'</td></tr>';
			if (!empty($cta) && $linha['debitar']==$cta) {
				$vlrTotal -=$linha['valor'];
			}else {
				$vlrTotal +=$linha['valor'];
			}
		}
	$vlrTotal = abs($vlrTotal);
	$resultado = array($tabela,$tabModeloExt,$vlrTotal);
	return $resultado;
	}
}
