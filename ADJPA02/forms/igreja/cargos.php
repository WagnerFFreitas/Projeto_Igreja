<?php $ind=1; 
if ($_SESSION["setor"]==2 || $_SESSION["setor"]>50){
?>

<fieldset>
<legend>Fun��es e Cargos na Igreja - Cadastro</legend>
<form id="form1" name="form1" method="post" action="tesouraria/recibo_print.php">

	<?php 
		require_once 'forms/autoCompletaMembro.php';
	?>

	<table>
		<tbody>
			<tr>
				<td>
					<label>Valor que recebe (R$):</label>
					<input name="valor" type="text" class="form-control" id="valor" size="14" 
					tabindex="<?PHP echo ++$ind; ?>" value="<?php echo $_GET["valor"];?>"
					 placeholder="Zero ou em branco p/ volunt�rio" />
				</td><td colspan="2">
					<label>Frequ�ncia (em dias)</label>
					<input name="frequencia" type="text" class="form-control" tabindex="<?PHP echo ++$ind; ?>" 
					placeholder="A cada quantos dias � pago" />
				</td>
			</tr>
			<tr>
				<td>	
					<label>Fonte para pgto:</label>
					<?php 						
						$congr = new List_sele ("fontes", "discriminar", "fonte");
		 				echo $congr->List_Selec (++$ind,$_GET['fonte'],' class="form-control"');
					?>
				</td>
				<td colspan="2">
					<label>Hierarquia</label>
					<?php 
						$congr = new List_sele ("igreja","razao","igreja");
		 				echo $congr->List_Selec (++$ind,$_GET['igreja'],' class="form-control"');
					?>
				</td>
			</tr>
				<td>	
					<label>Cargo/Fun��o na Igreja:</label>
					<?php 						
						$congr = new List_sele ("fontes", "discriminar", "fonte");
		 				echo $congr->List_Selec (++$ind,$_GET['fonte'],' class="form-control"');
					?>
				</td>
				<td colspan="2">
					<label>Igreja que exerce a fun��o:</label>
					<?php 
						$congr = new List_sele ("igreja","razao","igreja");
		 				echo $congr->List_Selec (++$ind,$_GET['igreja'],' class="form-control"');
					?>
				</td>
			</tr>
			<tr>
				<td colspan="3">
				<label>Referente a/motivo do recibo</label>
   <textarea class="text_area form-control" name="referente" cols="25" id="referente" tabindex="<?PHP
   echo $ind++;?>" onKeyDown="textCounter(this.form.referente,this.form.remLen,255);" 
		onKeyUp="textCounter(this.form.referente,this.form.remLen,255);progreso_tecla(this,255);"
		><?php echo $_GET["referente"];?></textarea>
   
   <div id="progreso"></div>
   (Max. 255 Carateres)
  <input readonly type=text class="btn" name=remLen size=3 maxlength=3 value="255"> 
Caracteres restantes
	<input type="submit" class="btn btn-primary" name="Submit" value="Emitir..." tabindex="<?PHP echo ++$ind; ?>"/>
				</td>
			</tr>
		</tbody>
	</table>
	
	<label></label>
	<input type="hidden" name="rec" value="<?php echo $rec;?>">
	<input type="hidden" name="transid" value="<?php echo (get_transid());?>">
</form>
</fieldset>
<?php 
} else {
	echo "<script> alert('Sem permiss�o de acesso! Entre em contato com o Tesoureiro!');location.href='../?escolha=adm/cadastro_membro.php&uf=PB';</script>";
	$_SESSION = array();
	session_destroy();
	header("Location: ./");
}
?>
