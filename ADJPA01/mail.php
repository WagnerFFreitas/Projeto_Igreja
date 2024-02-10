<?php
	session_start();
	// Verifica se a variável $_POST não é vazia...
	// ou seja: houve um submit no formulário de pedido de oração
	if(!empty($_POST)){

		foreach($_POST as $key => $value){
			$$key = $value;
		}

        $to = "iep.ouroverdemg@gmail.com";
		// Assunto do e-mail
		$subject = $nome.' lhe enviou um pedido de oração';
		// message
		$message = "
		<html>
		<head>
		 <title>Pedido de Oração</title>
		</head>
		<body>
		<p><b>Nome</b>: $nome</p>
		<p><b>Email</b>: $email</p>
		<p><b>Estado</b>: $estado</p>
		<p><b>Cidade</b>: $cidade</p>
		<p><b>Pedido de Oração</b>: $pedido</p>
		<p>“A oração de um justo pode muito em seus efeitos” (Tiago 5.16).</p>
		</body>
		</html>
		";

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: $email" . "\r\n" .
		"CC: $email";

		//Envia o e-mail e captura o sucesso ou erro
		if(mail($to,$subject,$message,$headers)):
		    $_SESSION['msg']['success'] = 'Pedido de Oração Enviado com Sucesso';
			header('Location:pedido_oracao.php');
		else:
		    $_SESSION['msg']['error'] = 'Erro ao enviar Pedido de Oração:';
			header('Location:pedido_oracao.php');
		endif;
	}
?>