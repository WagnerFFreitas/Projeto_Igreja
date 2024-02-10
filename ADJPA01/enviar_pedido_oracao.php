<?php
	session_start();
	// Verifica se a variável $_POST não é vazia...
	// ou seja: houve um submit no formulário de pedido de oração
	if(!empty($_POST)){

		foreach($_POST as $key => $value){
			$$key = $value;
		}

		// Caminho da biblioteca PHPMailer
		require 'PHPMailer/PHPMailerAutoload.php';

		// Instância do objeto PHPMailer
		$mail = new PHPMailer;

		// Seta a linguagem das mensagens de erro
		$mail->setLanguage = 'pt';

		// Configura para envio de e-mails usando SMTP
		$mail->isSMTP();

		// Servidor SMTP
		$mail->Host = 'smtp.gmail.com';

		// Usar autenticação SMTP
		$mail->SMTPAuth = true;

		// Usuário da conta
		$mail->Username = 'iep.ouroverdemg@gmail.com';

		// Senha da conta
		$mail->Password = 'paulohenrique12345';

		// Tipo de encriptação que será usado na conexão SMTP
		$mail->SMTPSecure = 'ssl';

		// Porta do servidor SMTP
		$mail->Port = 465;

		// Informa se vamos enviar mensagens usando HTML
		$mail->IsHTML(true);

		// Email do Remetente
		$mail->From = $email;

		// Nome do Remetente
		$mail->FromName = $nome;

		// Email e Nome para resposta
		$mail->addReplyTo($email,$nome);

		// Endereço do e-mail do destinatário
		$mail->addAddress('iep.ouroverdemg@gmail.com');

		// Assunto do e-mail
		$mail->Subject = utf8_decode($nome.' lhe enviou um pedido de oração');

		// Mensagem que vai no corpo do e-mail
		$mail->Body = "<p>Nome: $nome</p>
		<p><b>Email</b>: $email</p>
		<p><b>Estado</b>: $estado</p>
		<p><b>Cidade</b>: $cidade</p>
		<p><b>Pedido Oração</b>: $pedido</p>
		<p>“A oração de um justo pode muito em seus efeitos” (Tiago 5.16).</p>
		";

		// Envia o e-mail e captura o sucesso ou erro
		if($mail->Send()):
		    $_SESSION['msg']['success'] = 'Pedido de Oração Enviado com Sucesso';
			header('Location:pedido_oracao.php');
		else:
		    $_SESSION['msg']['error'] = 'Erro ao enviar Pedido de Oração:' . $mail->ErrorInfo;
			header('Location:pedido_oracao.php');
		endif;
	}
?>