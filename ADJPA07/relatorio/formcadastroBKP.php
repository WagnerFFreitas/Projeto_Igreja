<?PHP
	session_start();
	require_once ("../func_class/classes.php");
	//conectar ();
	$igreja = new DBRecord ("igreja","1","rol");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ficha de Membro</title>
<link rel="stylesheet" type="text/css" href="reset.css" />
<link rel="icon" type="image/gif" href="../img/br_igreja.gif">
<style type="text/css">
<!--

body {
  font: 90%/1.6; 
}

.clear {
  clear: both;
}

table {
  border-collapse: collapse;
  width: 50em;
}

col#albumCol {
  border: none;
}

th {
  font-weight: normal;
  text-align: left;
}


th, td {
  padding: 0.1em 1em;
   border: 1px solid #000000;
}

.odd {
  background-color:#edf5ff;
}

.sep {
  background-color:#FFFFFF;
  height: 1em;
   border: 0px;
}

tr:hover {
  background-color:#3d80df;
  color: #fff;
}

thead tr:hover {
  background-color: transparent;
  color: inherit;
}
#header {height: 125px; background-image: url(header2.jpg); background-repeat: no-repeat; background-position: top bottom; margin: 0; padding: 0 20px 0 100px; text-align:center; font-family:"Times New Roman", Times, serif;}
#footer {	color: #636466;
	font-size:65%;
	height: 50px;
	background-repeat: no-repeat;
	background-position: top;
	text-align: left;
	clear: both;
	margin: 0;
	padding-top: 25px;
	padding: 20px 0 0 0;
	background-image: url(horbar.jpg);
	width: 800px;
}


-->
</style>
</head>

<body>

<div id="header"></div>
<table cellspacing="0" id="FormCadastro" summary="Formul�rio para cadastro de membro.">

<tbody>
<tr>
  <td colspan="14"><h3>Formul&aacute;rio para Ficha de Membro </h3></td>
  <td colspan="16"><form id="form1" method="post" action="">
        <label>
        <input type="radio" name="Op��es de Cadstro" value="radio" />
          Novo Cadastro</label>
        <label>
        <input type="radio" name="Op��es de Cadstro" value="radio" />
          Re-Cadastro</label>
        <label>
        <input type="radio" name="Op��es de Cadstro" value="radio" />
          Candidato a Batismo</label>
        <label>
        <input type="radio" name="Op��es de Cadstro" value="radio" />
          Atualiza&ccedil;&atilde;o </label>
  </form></td>
  </tr>
<tr class="odd">
  <td colspan="3">Nome:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="4" rowspan="8"><div align="center">Foto</div></td>
</tr>

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>

<tr >
  <td colspan="26" class="sep"></td>
  </tr>
<tr class="odd">
  <td colspan="3">Pai:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>

<tr >
  <td colspan="26" class="sep"></td>
  </tr>
<tr class="odd">
  <td colspan="3">M&atilde;e:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr class="odd">
  <td colspan="3">Endere&ccedil;o:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="2">N&ordm;</td>
  <td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr class="odd">
  <td colspan="3">Bairro:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr>
  <td colspan="3">Cidade:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="2">UF:</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr class="odd">
  <td colspan="2">CEP</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>-</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="4" bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="3">CPF:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
<td>-</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr>
  <td colspan="2">RG:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="3" bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="3">Org. Exp.  </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr class="odd">
  <td colspan="3">Telefone:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>-</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="6" bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="3">Celular:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>-</td>
  <td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr>
  <td colspan="4">Nacionalidade:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr class="odd">
  <td colspan="3">Naturalidade:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr>
  <td colspan="4">Data Nascimento: </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="2" bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="2">Sexo:</td>
  <td colspan="12"><div align="center">
  			<form id="form1" method="post" action="">
			<input type="checkbox" name="checkbox" value="checkbox" />
        	<label>Masculino</label>
			<input type="checkbox" name="checkbox2" value="checkbox" />
         <label>Feminino</label>
  </form></div>  </td>
  </tr>

<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr class="odd">
  <td colspan="4">Doador de Sangue:</td>
  <td colspan="6"><div align="center">
  			<form id="form1" method="post" action="">
			<input type="checkbox" name="checkbox" value="checkbox" />
			Sim
			<label></label>
			<input type="checkbox" name="checkbox2" value="checkbox" />
         <label>N&atilde;o</label>
  			</form></div></td>
<td colspan="2" bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="2">Tipo:</td>
  <td colspan="7"><div align="center">
    <form id="form1" method="post" action="">
			<input type="checkbox" name="checkbox" value="checkbox" />
			
			<label>A</label>
			<input type="checkbox" name="checkbox22" value="checkbox" />
            <label>B</label>
            <input type="checkbox" name="checkbox23" value="checkbox" />
            
            <label>AB</label>
            <input type="checkbox" name="checkbox24" value="checkbox" />
            <label>O</label>
    </form></div></td>
  
  <td bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="2">RH:</td>
  <td colspan="6"><div align="center">
  			<form id="form1" method="post" action="">
			<input type="checkbox" name="checkbox" value="checkbox" />
			
			Positvo
			<label></label>
			<input type="checkbox" name="checkbox2" value="checkbox" />
         <label>Negativo</label>
	  </form></div></td>
  </tr>
<tr >
  <td colspan="30" class="sep"></td>
</tr>
  <td colspan="3">Escolaridade:</td>
  <td colspan="27"><form id="form1" method="post" action="">
    <input type="checkbox" name="checkbox3" value="checkbox" />
    <label>Analfabeto</label>
    <input type="checkbox" name="checkbox222" value="checkbox" />
    <label>Alfabetizado</label>
    <input type="checkbox" name="checkbox232" value="checkbox" />
 Fundamental Incompleto   
 <label></label>
 <input type="checkbox" name="checkbox242" value="checkbox" />
 <label>Fundamental Completo </label>

    
    <input type="checkbox" name="checkbox2322" value="checkbox" />
    M&eacute;dio Incompleto
    <input type="checkbox" name="checkbox2422" value="checkbox" />
    M&eacute;dio
    <label> Completo</label>
  </form></td>
  </tr>

<tr class="odd">
  <td colspan="10"><input type="checkbox" name="checkbox24222" value="checkbox" />
    Superior
      <label> Incompleto
      <input type="checkbox" name="checkbox24223" value="checkbox" />
      Superior
    Completo </label></td>
  <td colspan="7">Gradua&ccedil;&atilde;o Superior (se tiver ?)</td>
  <td colspan="13">&nbsp;</td>
  </tr>
<tr >
  <td colspan="30" class="sep"></td>
</tr>
<tr>
  <td colspan="3">Conjugue:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr class="odd">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="5">Membro desta Igreja ? </td>
  <td colspan="4"><form id="form1" method="post" action="">
    <input type="checkbox" name="checkbox4" value="checkbox" />
    Sim
  <label></label>
  <input type="checkbox" name="checkbox25" value="checkbox" />
  <label>N&atilde;o</label>
  </form></td>
  <td colspan="6">Se n&atilde;o? Qual Religi&atilde;o: </td>
  <td colspan="15">&nbsp;</td>
  </tr>
<tr >
  <td colspan="30" class="sep"><div align="center"><strong>Dados Profissionais </strong></div></td>
</tr>

<tr class="odd">
  <td colspan="3">Profiss&atilde;o:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr >
  <td colspan="30" class="sep"></td>
</tr>
<tr>
  <td colspan="4">Local de Trabalho: </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr >
  <td colspan="30" class="sep"></td>
</tr>
<tr class="odd">
  <td colspan="3">Endere&ccedil;o:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="2">N&ordm;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr >
  <td colspan="30" class="sep"></td>
</tr>

<tr class="odd">
  <td colspan="3">Bairro:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr >
  <td colspan="30" class="sep"></td>
</tr>
<tr>
  <td colspan="3">Cidade:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr >
  <td colspan="30" class="sep"></td>
</tr>
<tr class="odd">
  <td colspan="2">CEP:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>-</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="2" bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="3">Telefone:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr >
  <td colspan="30" class="sep"><div align="center"><strong>Identidade Religiosa </strong></div></td>
</tr>
<tr>
  <td colspan="4">Batismo em &Aacute;guas </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="2">Local:</td>
  <td colspan="13">&nbsp;</td>
  </tr>
<tr class="odd">
  <td colspan="7">Ano de Batizido c/ Espirito Santo: </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="6" bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="6">Membro por Aclama&ccedil;&atilde;o: </td>
  <td colspan="6"><form id="form1" method="post" action="">
    <input type="checkbox" name="checkbox5" value="checkbox" />
    Sim
  <label></label>
  <input type="checkbox" name="checkbox26" value="checkbox" />
  <label>N&atilde;o</label>
  </form></td>
  <td bgcolor="#CCCCCC">&nbsp;</td>
</tr>
<tr>
  <td colspan="9">Se veio de outra Assembleia de Deus, Qual? </td>
  <td colspan="21">&nbsp;</td>
  </tr>
<tr class="odd">
  <td colspan="9">Se veio de outra denomina&ccedil;&atilde;o, Qual? </td>
  <td colspan="21">&nbsp;</td>
  </tr>
<tr>
  <td colspan="5">Carta de Mudan&ccedil;a em: </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="5">Data que foi aceite:</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr class="odd">
  <td colspan="4">Fun&ccedil;&atilde;o na Igreja: </td>
  <td colspan="11">&nbsp;</td>
  <td colspan="5">Cargo Ministerial </td>
  <td colspan="10">&nbsp;</td>
  </tr>
<tr>
  <td colspan="4">Di&aacute;cono em: </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="5">Presb&iacute;tero em </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr class="odd">
  <td colspan="4">Evangelista em: </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="5">Pastor em: </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>/</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="8">Em que &aacute;rea da Igreja gostaria de atuar? </td>
  <td colspan="22"><form id="form1" method="post" action="">
    <input type="checkbox" name="checkbox52" value="checkbox" />
    EBF
    <label></label>
  <input type="checkbox" name="checkbox262" value="checkbox" />
  Circ. de Ora&ccedil;&atilde;o
  <label></label>
  <input type="checkbox" name="checkbox522" value="checkbox" />
  Dep. Infantil 
  <input type="checkbox" name="checkbox2622" value="checkbox" />
Dep. Mocidade
  <input type="checkbox" name="checkbox5222" value="checkbox" />
Miss&otilde;es
   
  <input type="checkbox" name="checkbox26222" value="checkbox" />
M&uacute;sica
  <input type="checkbox" name="checkbox52222" value="checkbox" />
  Serv. Social
  </form></td>
  </tr>

<tr class="odd">
  <td colspan="30"><form id="form1" method="post" action="">
    <input type="checkbox" name="checkbox5222222" value="checkbox" />
Evangelismo
  <input type="checkbox" name="checkbox26222222" value="checkbox" />
Outros, Qual?
  
  </form></td>
  </tr>
<tr>
  <td colspan="6">Se estuda Teologia, Onde? </td>
  <td colspan="24">&nbsp;</td>
 </tr>

<tr class="odd">
  <td colspan="4">Onde Congrega: </td>
  <td colspan="26">&nbsp;</td>
  </tr>

<tr >
  <td colspan="4">Assinat. Dirigente: </td>
  <td colspan="10">&nbsp;</td>
  <td bgcolor="#CCCCCC">&nbsp;</td>
  <td colspan="5">Assinat. Secret&aacute;rio: </td>
  <td colspan="10">&nbsp;</td>
  </tr>
</tbody>
</table>

<div id="footer"> <?PHP echo "Templo SEDE: {$igreja->rua()}, N&ordm; {$igreja->numero()} - {$igreja->cidade()} - {$igreja->uf()}";?><br />
  Copyright &copy; <a href="http://<?PHP echo "{$igreja->site()}";?>/" title="Copyright information"></a> Email: <a rel="nofollow" target="_blank" href="mailton: <?PHP echo "{$igreja->email()}";?>"><?PHP echo "{$igreja->email()}";?></a> <?PHP echo "CNPJ: {$igreja->cnpj()}";?><br />
  <?PHP echo "CEP: {$igreja->cep()} - Fone: {$igreja->fone()} - Fax: {$igreja->fax()}";?><br />
  <p>Designed by <a rel="nofollow" target="_blank" href="mailton: hiltonbruce@gmail.com">Joseilton Costa Bruce.</a></p>
</div>
</body>
</html>
