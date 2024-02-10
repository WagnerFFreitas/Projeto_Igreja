<?php 
	session_start();
	include('../includes/connectionfactory.php');
	$PDO = connection();

	// Validação dos Dados
	if(isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && !empty($_POST['inputEmail']) && !empty($_POST['inputPassword'])){
		// Recupera os dados do form de login
		$user_email = $_POST['inputEmail'];
		$user_password = md5($_POST['inputPassword']);

		/* Cadastrar Usuario Admin 
		$sql = "INSERT INTO user_admin(user_email,user_password) VALUES(:user_email,:user_password)";
		*/

		
		$sql = "SELECT *FROM user_admin WHERE user_email = :user_email AND user_password = :user_password";
		
		// Prepara uma sentença para ser executada
		$statement = $PDO->prepare($sql);

		// Adiciona os dados informados pelo usuario para serem executados na sentença
		$statement->bindValue(":user_email",$user_email);
		$statement->bindValue(":user_password",$user_password);



		$statement->execute();

		if($statement->rowCount() == 0){
			$_SESSION['erro'] = 'Usuario ou Senha Incorretos';
			header('Location:../index.php');
			
		}else{
			//recupera os dados da consulta
			$dados = $statement->fetch(pdo::FETCH_ASSOC);

			$_SESSION['login']['user_email'] = $dados['user_email'];
			$_SESSION['login']['user_password'] = $dados['user_password'];

			header('Location:../pages/index.php');
		}
	}else{
	    $_SESSION['erro'] = 'Faça Login';
	    header('Location:../index.php');
	}
 ?>