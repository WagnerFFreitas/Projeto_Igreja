<?php
class sec_AgendaSec
{
	protected $y;
	protected $m;
	protected $d;
	protected $igreja;

	function __construct($y = '',$m = '',$d = '',$ano = '',$igreja = '') {
    $m = (empty($_GET['month'])) ? '' : intval($_GET['month']) ;
    $y = (empty($_GET['year'])) ? date('Y') : intval($_GET['year']) ;
    $d = (empty($_GET['day'])) ? '' : intval($_GET['day']) ;
    $i = (empty($_GET['igreja'])) ? '' : intval($_GET['igreja']) ;
		$sql  = 'SELECT a.*,i.razao,s.alias,u.nome,u.cargo ';
		$sql .= 'FROM agendamssgs AS a, igreja AS i, setores AS s, usuario AS u ';
		$sql .= 'WHERE (a.igreja = i.rol || a.igreja = "0" || a.igreja = "-1") AND a.uid = u.cpf AND a.setor = s.id ';
		$this->sqlRasc = $sql.'GROUP BY a.id ORDER BY i.razao,a.title';
		if ($i!='') {
			$sql .= 'AND i.rol="'.$i.'" ';
		}
		if ($d!='') {
			$sql .= 'AND a.d="'.$d.'" ';
		}
		if ($m!='') {
			$sql .= 'AND a.m="'.$m.'" ';
		}
		$sql .= 'AND a.y = "'.$y.'" GROUP BY a.id ORDER BY a.m,a.d,a.start_time,i.razao' ;
		$this->sql_lst = mysql_query($sql) or die (mysql_error());
	}

	function listaEventos(){
		return mysql_fetch_assoc($this->sql_lst);
	}

	function listaRascunho(){
		$sql_lst = mysql_query($this->sqlRasc) or die (mysql_error());
		return mysql_fetch_assoc($sql_lst);
	}
}
?>
