<!-- Formul�rio para edi��o por item. Neste form os campos s�o recebidos de qualquer 
campo para edi��o da tabela. Bastando para isso o envio do campo por GET-campo, esse campo que � 
passado, tamb�m � respons�vel pelo da tabela que ser� alterado e o GET-tabela traz o nome da tabela
que sofrer� altera��o. Em agumas ocasi�es tamb�m � passado o campo UF.-->

<form id="form1" name="form1" method="post" action="adm/atualizar_dados.php">
<?PHP
if ($_GET["campo"]!="sexo" && $_GET["campo"]!="obs")
{
?>  
  <input type="text" name="<?PHP echo $_GET["campo"];?>" value="
  <?PHP
  //No caso para o campo naturalidade o campo UF � adiconado 
  echo $arr_dad[$_GET["campo"]];if ($_GET["campo"]=="naturalidade" || $_GET["campo"]=="cidade"){echo " - ".$_GET["uf"];}
  ?>" size="30"/>
<?PHP
}elseif ($_GET["campo"]=="sexo")
{
?>
  <select name="select">
    <option value="<?PHP echo $arr_dad[$_GET["campo"]];?>"><?PHP echo $arr_dad[$_GET["campo"]];?></option>
    <option value="M">Masculino</option>
    <option value="F">Femino</option>
  </select>
<?PHP 
}else //Campo para form tipo textarea
{
	echo "<textarea name='{$_GET["campo"]}' cols='50'></textarea>";
}

if ($_GET["campo"]=="pai" || $_GET["campo"]=="mae")
{
//Nos campos Pai e M�e � aberto um segundo campo do form para o rol e a op��o, por JavaScript, de um script para pesquisa de membros e preenchimeto destes campos
?>
Rol:
<input name="<?PHP echo "rol_{$_GET["campo"]}";?>" type="text" value="<?PHP echo $arr_dad["rol_{$_GET["campo"]}"];?>" size="10" />
<a href="javascript:lancarSubmenu('campo=<?PHP echo $_GET["campo"];?>&rol=rol_<?PHP echo $_GET["campo"];?>&form=3')"><img border="0" src="img/lupa_32x32.png" width="18" height="18" align="absbottom" title="Click aqui para pesquisar membros!" /></a>
<?PHP
}
?>
<input type="submit" name="Submit" value="Alterar..." /> 
</form>
