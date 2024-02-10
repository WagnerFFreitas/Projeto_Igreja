<?php 
	session_start();
	include('../model/Membro.class.php');
	include('../controller/MembroDAO.class.php');

	//Tratar a questao se a variavel $_GET vir vazia
	//Tratar a questao de variavel $_POST vir vazia

	if($_GET['action'] == "cadastrar"){

		// recupera todos os dados inseridos no formulario de cadastro de membro
		foreach ($_POST as $chave => $valor) {
			if($valor == ''){
				$valor = null;
			}
			$$chave = $valor;
		}

		$membro = new Membro();
		$membroDAO = new MembroDAO();

		$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');

		//renomeia o nome da imagem enviada
		$extensao = pathinfo($_FILES['imagem_upload']['name']);
		$extensao = ".".$extensao['extension'];
		$imagem = md5(mt_rand(1,10000)).$extensao;

		$extensao = strtolower(end(explode('.', $_FILES['imagem_upload']['name'])));

		if(array_search($extensao, $extensoes_aceitas) == false){
			$_SESSION['msg']['error'] = "Formato de Arquivo Invalido!!!";
			header("Location:../pages/index.php");
		}else{
			//$data = implode("-",array_reverse(explode("/",$data)));

			$dataNascimento = implode("-",array_reverse(explode("/",$dataNascimento)));

			if($dataConversao != null){
				$dataConversao = implode("-",array_reverse(explode("/",$dataConversao)));
			}

			if($dataBatismo != null){
				$dataBatismo = implode("-",array_reverse(explode("/",$dataBatismo)));
			}
			
			
			
			$membro->setNome($nome);
			$membro->setRg($rg);
			$membro->setCpf($cpf);
			$membro->setNomePai($nomePai);
			$membro->setNomeMae($nomeMae);
			$membro->setNaturalidade($naturalidade);
			$membro->setEndereco($endereco);
			$membro->setNumero($numero);
			$membro->setBairro($bairro);
			$membro->setEstado($estado);
			$membro->setCidade($cidade);
			$membro->setTelefone($telefone);
			$membro->setCelular($celular);
			$membro->setDataNascimento($dataNascimento);
			$membro->setEstadoCivil($estadoCivil);
			$membro->setProfissao($profissao);
			$membro->setDataConversao($dataConversao);
			$membro->setDataBatismo($dataBatismo);
			$membro->setNomeIgrejaAnterior($nomeIgrejaAnterior);
			$membro->setTelefoneIgrejaAnterior($telefoneIgrejaAnterior);
			$membro->setObservacoes($observacoes);
			$membro->setUrlFoto($imagem);

			

			
			if($membroDAO->cadastrarMembro($membro)){
				$_SESSION['msg']['success'] = "Membro Cadastrado com Sucesso!!!";
				header("Location:../pages/index.php");
			}else{
				$_SESSION['msg']['error'] = "Erro ao Cadastrar Membro!!!";
				header("Location:../pages/index.php");
			}
					
		}
	}	

	else if($_GET['action'] == "excluir" && !empty($_GET['id'])){

		$membro = new Membro();
		$membroDAO = new MembroDAO();

		$membro->setId($_GET['id']);

		$membroDAO->excluirFotoMembro($membro);

		if($membroDAO->excluirMembro($membro)){
			$_SESSION['msg']['success'] = "Membro Excluido com Sucesso!!!";
		}else{
			$_SESSION['msg']['error'] = "Erro ao Excluir Membro!!!";

		}
	}


	else if($_GET['action'] == "alterar"){
		// recupera todos os dados inseridos no formulario de alteração de membro
		foreach ($_POST as $chave => $valor) {
			if($valor == ''){
				$valor = null;
			}
			$$chave = $valor;
		}

		$membro = new Membro();
		$membroDAO = new MembroDAO();		

		// Verifica se fez upload de uma nova imagem 3x4
		if($_FILES['imagem_upload']['size'] != 0){
			// renomeia o nome da nova imagem enviada
			$extensao = pathinfo($_FILES['imagem_upload']['name']);
			$extensao = ".".$extensao['extension'];
			$imagem = md5(mt_rand(1,10000)).$extensao;

			$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');

			$extensao = strtolower(end(explode('.', $_FILES['imagem_upload']['name'])));

			// verifica se extensao da imagem é valida
			if(array_search($extensao, $extensoes_aceitas) == false){
				$_SESSION['msg']['error'] = "Formato de Arquivo Invalido!!!";
				header("Location:../pages/index.php");
				exit();
			}else{
				// efetua o upload da nova imagem enviada para o servidor
				move_uploaded_file($_FILES["imagem_upload"]["tmp_name"],"../uploaders/".$imagem);

				// deleta do servidor a imagem antiga
				unlink("../uploaders/".$foto_membro_atual);
			}
		}else{// se o usuario nao alterar a foto 3x4 continua a mesma
			$imagem = $foto_membro_atual;
		}

		$dataNascimento = implode("-",array_reverse(explode("/",$dataNascimento)));

			if($dataConversao != null){
				$dataConversao = implode("-",array_reverse(explode("/",$dataConversao)));
			}

			if($dataBatismo != null){
				$dataBatismo = implode("-",array_reverse(explode("/",$dataBatismo)));
			}

		$membro->setId($id);
		$membro->setNome($nome);
		$membro->setRg($rg);
		$membro->setNomePai($nomePai);
		$membro->setNomeMae($nomeMae);
		$membro->setNaturalidade($naturalidade);
		$membro->setEndereco($endereco);
		$membro->setNumero($numero);
		$membro->setBairro($bairro);
		$membro->setEstado($estado);
		$membro->setCidade($cidade);
		$membro->setTelefone($telefone);
		$membro->setCelular($celular);
		$membro->setDataNascimento($dataNascimento);
		$membro->setEstadoCivil($estadoCivil);
		$membro->setProfissao($profissao);
		$membro->setDataConversao($dataConversao);
		$membro->setDataBatismo($dataBatismo);
		$membro->setNomeIgrejaAnterior($nomeIgrejaAnterior);
		$membro->setTelefoneIgrejaAnterior($telefoneIgrejaAnterior);
		$membro->setObservacoes($observacoes);
		$membro->setUrlFoto($imagem);

		
		if($membroDAO->alterarMembro($membro)){
			$_SESSION['msg']['success'] = "Dados do Membro Alterados com Sucesso!!!";
			header("Location:../pages/index.php");
		}else{
			$_SESSION['msg']['error'] = "Erro ao Alterar Dados do Membro!!!";
			header("Location:../pages/index.php");
		}
	}

	else if($_GET['action'] == "imprimir" && !empty($_GET['id'])){
		$membro = new Membro();
		$membroDAO = new MembroDAO();

		$membro->setId($_GET['id']);

		$membroDAO->imprimirPDF($membro);
	}

?>


