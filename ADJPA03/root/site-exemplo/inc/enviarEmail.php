<?php

    require_once("phpmailer/class.phpmailer.php");

    // Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.
    
    define('GUSER', 'envio.email.generico@gmail.com');	// <-- Insira aqui o seu GMail
    define('GPWD', '@Envio2019');		// <-- Insira aqui a senha do seu GMail

    function enviarEmail($para, $de, $de_nome, $assunto, $corpo) { 
	   global $error;
	   $mail = new PHPMailer();
       $mail->IsSMTP();	// Ativar SMTP
	   $mail->SMTPDebug = 0;// Debugar: 1=erros/mensagens, 2=mensagens apenas
	   $mail->SMTPAuth = true;		// Autenticação ativada
	   $mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	   $mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	   $mail->Port = 587; // A porta 587 deverá estar aberta em seu servidor
	   $mail->Username = GUSER; //Usuário do SMTP
	   $mail->Password = GPWD;  //Senha do SMTP
	   $mail->SetFrom(GUSER, GUSER);//Remetente
       $mail->AddReplyTo($de, $de_nome);//Responder Para
	   $mail->Subject = $assunto;//Assunto
	   $mail->Body = $corpo;//Corpo do Email
	   $mail->AddAddress($para);//Destinatário
	
    if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}
?>