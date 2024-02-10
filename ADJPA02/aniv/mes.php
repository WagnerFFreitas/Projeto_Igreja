<?PHP

$anterior=$_GET["proxima"]-1;
$proximo=$_GET["proxima"]+1;

if ($_GET["Submit"]=="Imprimir") {

	session_start();
	require_once ("../func_class/funcoes.php");
	require_once ("../func_class/classes.php");
	$igSede = new DBRecord('igreja', '1', 'rol');

  // require_once '../views/modeloPrint.php';

	controle ("consulta");
	?>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.print.css" />
	<link rel="icon" type="image/gif" href="../br_igreja.jpg">
	<?php
}else {
?>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<?PHP
	require_once ("aniv/navega.php");
}
$ord = intval($_GET["ord"]);
// $ordDia = ($ord!=3) ? 3 : 4 ;
if ($ord==3) {
  $ordDia = 4;
  $iconDia = '<span class="glyphicon glyphicon-chevron-down text-danger" aria-hidden="true"></span>';
} elseif ($ord==4) {
  $ordDia = 3;
  $iconDia = '<span class="glyphicon glyphicon-chevron-up text-danger" aria-hidden="true"></span>';
}else {
  $iconDia = '';
  $ordDia=3;
}
if ($ord==0) {
  $ordNome = 5;
  $iconNome = '<span class="glyphicon glyphicon-chevron-down text-danger" aria-hidden="true"></span>';
} elseif ($ord==5) {
  $ordNome = 0;
  $iconNome = '<span class="glyphicon glyphicon-chevron-up text-danger" aria-hidden="true"></span>';
}else {
  $iconNome = '';
  $ordNome=0;
}
//C�digo para exibir de qual congrega��o � a lista de aniversariantes
$congrega = new DBRecord ("igreja","{$_GET["congregacao"]}","rol");
if ($_GET["congregacao"]>"0" ) {
	$cong_sele = " - Congrega&ccedil;&atilde;o: ".$congrega->razao();
}
?>
<table class="table table-striped table-bordered">
<caption>
Aniversariantes do M&ecirc;s <?PHP echo $cong_sele;?>
</caption>
<colgroup>
<col id="Dia" />
<col id="Nome" />
<col id="Data" />
<col id="albumCol" />
</colgroup>
<thead>
<tr>
<th scope="col"><a href="./?escolha=aniv/mes.php&menu=top_aniv&ord=<?=$ordDia?>" title="Ordenar por Data">Dia
<?=$iconDia?>
</a></th>
<th scope="col"><a href="./?escolha=aniv/mes.php&menu=top_aniv&ord=<?=$ordNome?>" title="Ordenar por nome">Nome
  <?=$iconNome?>
</a></th>
<th scope="col"><a href="./?escolha=aniv/mes.php&menu=top_aniv&ord=<?=$ordDia?>" title="Ordenar por Dia">Dia
  <?php echo $iconDia;?>
</a></th>
<th scope="col"><a href="./?escolha=aniv/mes.php&menu=top_aniv&ord=<?=$ordNome?>" title="Ordenar por nome">Nome
  <?=$iconNome?>
</a></th>
</tr>
</thead>
<tbody>
<?PHP
$aniv= new aniversario;
$aniv->mes();
?>
</tbody>
</table>
Voc&ecirc; pode ordenar por Rol, Nome e Congrega&ccedil;&atilde;o &quot;click&quot; no cabe&ccedil;alho. Por padr&atilde;o ele ordena pelo nome do membro.
