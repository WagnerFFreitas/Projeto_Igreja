<?php

if (empty($_SESSION['valid_user']))
header("Location: ../");
?>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

<fieldset>
<legend>Dados Eclesi&aacute;sticos - Cadastro de Membro</legend>
<form method="post" action="">
	  <label></label>
	  <label>Batismo UF: </label>
	
	   	<select name="uf_nasc" id="uf_nasc" onchange="MM_jumpMenu('parent',this,0)" tabindex="1" >
			<option value="<?PHP echo $_GET['uf'];?>"><?PHP echo $_GET['uf'];?></option>
			<option value='./?escolha=adm/cad_ecles.php&uf=AC'>Acre</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=AL'>Alagoas</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=AP'>Amap�</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=AM'>Amazonas</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=BA'>Bahia</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=CE'>Cear�</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=DF'>Distrito Federal</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=GO'>Goi�s</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=MA'>Maranh�o</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=MT'>Mato Grosso</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=MS'>Mato Grosso do Sul</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=MG'>Minas Gerais</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=PA'>Par�</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=PB'>Para�ba</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=PR'>Paran�</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=PE'>Pernambuco</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=PI'>Piau�</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=RJ'>Rio de Janeiro</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=RN'>Rio Grande do Norte</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=RS'>Rio Grande do Sul</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=RO'>Rond�nia</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=RR'>Roraima</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=SC'>Santa Catarina</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=SP'>S�o Paulo</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=SE'>Sergipe</option>
			<option value='./?escolha=adm/cad_ecles.php&uf=TO'>Tocantins</option>
	  </select>
  <?PHP
		if (!empty($_GET["uf"])){
	?>
  <table width="557" border="0">
    <tr>
      <td width="223"><?PHP 
		$vl_uf=$_GET["uf"];
		$lst_cid = new sele_cidade("cidade","$vl_uf","coduf","nome","cid_nasc");
		echo "<label>Cidade Batismo:</label>";		
		$vlr_linha=$lst_cid->ListDados ("2");//3 � o indice do formul�rio	  
	  ?></td>
      <td width="296"><label>Congrega��o:
          <input name="congregacao" type="text" id="congregacao" tabindex="3" />
      </label></td>
    </tr>
    <tr>
      <td>Batismo em �guas:<label>
          <input name="batismo_em_aguas" type="text" id="batismo_em_aguas" tabindex="4" />
     </label>(formato dd/mm/aaaa) 
</td>
      <td>Batismo Espirito Santo:<label>
          <input name="batismo_espirito_santo" type="text" id="batismo_espirito_santo" tabindex="5" />
     (ano) </label>
</td>
    </tr>
    <tr>
      <td>Denomina��o de onde veio:<label>
          <input name="veio_qual_denominacao" type="text" id="veio_qual_denominacao" tabindex="6" />
      </label></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <br />
	<?PHP
		}
		?>
  <input name="escolha" type="hidden" value="adm/cad_ecles.php" />
</form>
</fieldset>