<?php
class formularioalterar {

	public $campo;
	public $valor;
	public $acao;
	public $link_form;

	function __construct ($vlr_get="",$valor="",$acao="",$link_form="") {

		$this->campo 		= (!empty($_GET["campo"])) ? $_GET["campo"]:'';       //Nome do campo para get
		$this->vlr_get		= $vlr_get;             //Valor relacionado ao get
		$this->valor 		= $valor;               //O valor do campo no banco de dados
		$this->acao 		= $acao;                //Link para onde o form ira direcionar os dadosa. Ex.:adm/atualizar_dados.php
		$this->link_form 	= $link_form.$vlr_get;  //Link de chamada do form para edi��o do form. Ex.: adm/dados_pessoais.php&campo=datanasc&tabela=membro

	}

	public function formcab () {
		//*Cabe�alho do formul�rio

			/* Formul�rio para edi��o por item. Neste form os campos s�o recebidos de qualquer
			campo para edi��o da tabela. Bastando para isso o envio do campo por GET-campo, esse campo que �
			passado, tamb�m � respons�vel pelo da tabela que ser� alterada e o GET-tabela traz o nome da tabela
			que sofrer� altera��o. Em agumas ocasi�es tamb�m � passado o campo UF.*/

			if ($this->campo==$this->vlr_get)
			{

			$ident = (empty($_GET["rol"])) ? (INT)$_GET['id']:(int)$_GET['rol'];
			?>
			<form id="form1" name="form1" method="post" action="">
			<input type="hidden" name="escolha" value="<?PHP echo "{$this->acao}";?>" /> <!-- indica o script que receber� os dados -->
			<input type="hidden" name="tabela" value="<?PHP echo $_GET["tabela"];?>" />
			<input type="hidden" name="id" value="<?PHP echo $ident;?>" />
			<input type="hidden" name="campo" value="<?PHP echo "{$this->campo}";?>" />
			<?php
			}
	}

	public function getditar(){
	$ind = 1;
	if ($this->campo==$this->vlr_get)
	{

		if ($this->valor=="")
		{
			$this->valor="N&atilde;o informado";
			}
	   		?>
				<input type="text" name="<?PHP echo $this->campo;?>" value="<?PHP echo $this->valor;?>" size="30" tabindex="<?PHP echo $ind++;?>"/>
				<input type="submit" name="Submit" value="Alterar..."  tabindex="<?PHP echo $ind++;?>" />
				</form>
			<?PHP
		}

	}

	public function getMostrar(){

	if ($this->campo==$this->vlr_get)
	{

		if ($this->valor=="")
		{
			$this->valor="N&atilde;o informado";
			}
	   		?>
				<input type="text" name="<?PHP echo $this->campo;?>" value="<?PHP echo $this->valor;?>" size="30" tabindex="<?PHP echo $ind++;?>"/>
				<input type="submit" name="Submit" value="Alterar..."  tabindex="<?PHP echo $ind++;?>" />
				</form>
			<?PHP
		}

		if (empty($this->valor)){
			$this->valor = "N�o Informado";
		}
				echo "<p><a title='Click aqui para alaterar este campo!' href='./?escolha={$this->link_form}'  tabindex='$ind++' >{$this->valor}</a></p>";

	}

}
?>
