<h1><img src="img/loading2.gif" width="30" height="30"></h1>
<?PHP
/**
 * Joseilton Costa Bruce
 *
 * LICEN�A
 *
 * Please send an email
 * to hiltonbruce@gmail.com so we can send you a copy immediately.
 *
 * @category   Pessoal
 * @package
 * @subpackage
 * @copyright  Copyright (c) 2008-2009 Joseilton Costa Bruce (http://)
 * @license    http://
 * Insere dados no banco do form cad_usuario.php na tabela:usuario
 */
controle ("tes");
if (((!empty($_POST['rol']) || (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['rg'])))
	|| ($_POST['id']!='')) && $_GET['remover']=='' ) {
	if ($_POST['id']!='') {
		$atualCargo = new DBRecord ('cargoigreja',$_POST['id'],'id');
		$atualCargo->igreja = $_POST['rolIgreja'];
		$atualCargo->rol = $_POST['rol'];
		$atualCargo->descricao = $_POST['idfunc'];
		$atualCargo->naomembro = $_POST['nome'].',CPF: '.$_POST['cpf'].',RG: '.$_POST['rg'];
		$atualCargo->hierarquia = $_POST['hierarquia'];
		$atualCargo->pgto = $_POST['valor'];
		$atualCargo->diapgto = $_POST['diapgto'];
		$atualCargo->tipo = $_POST['fonte'];
		$atualCargo->coddespesa = $_POST['acesso'];
		$atualCargo->tipo = $_POST['caixa'];
		$atualCargo->Update();
	} else {
		$cadMembro = new tes_ativaCargo ($_POST['rolIgreja'],$_POST['idfunc'],$_POST['hierarquia']);
		$ativarCad = $cadMembro->cadMembroCargo($_POST['rol'],$_POST['nome'].',CPF: '.$_POST['cpf'].',RG: '.$_POST['rg'],$_POST['valor'],$_POST['diapgto'],$_POST['caixa'],$_POST['acesso']);
	//print_r ($ativarCad);
	if ($ativarCad['Desativado']=='1') {
		$atualCad = 'uma atualiza��o!';
	}elseif ($ativarCad['Desativado']>'1'){
		$atualCad = $ativarCad['Desativado'].' atualiza��es!';
	}else {
		$atualCad = '';
	}
	if ($ativarCad['Cadastro']>'0') {
		$insertCad = ' Um cadastro!';
	}else {
		$insertCad = ' Erro! Nenhumm cadastro realizado!';
	}
	}
	}elseif (!empty($_GET['remover'])) {
		$desativa = new DBRecord ('cargoigreja',$_GET['id'],'id');
		if ($_GET['remover']=='2') {
			$desativa->status = '0'; //Aqui � atribuido a esta vari�vel um valor para UpDate
			$atualCad = 'Desativado!';
		} else {
			$desativa->status = '1'; //Aqui � atribuido a esta vari�vel um valor para UpDate
			$atualCad = 'Ativado!';
		}
		$desativa->Update();
	}else {
		$insertCad = 'Erro! Nenhumm cadastro realizado! Voc� n�o informou o benefiaciado! Rol ou Nome com CPF e RG';
	}
	echo '<script> alert("Houve: '.$atualCad.$insertCad.'");</script>';//recupera o id do �ltimo insert no mysql

		echo "<script>window.history.go(-1);</script>";
		echo "<a href='./?escolha=controller/despesa.php&menu=top_tesouraria&age=7'>Continuar...<a>";

?>
