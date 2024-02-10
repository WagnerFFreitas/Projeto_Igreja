<?php

    $Nome = $_POST["Nome"]; // Pega o valor do campo Nome
    $Telefone = $_POST["Telefone"]; // Pega o valor do campo Telefone
    $Email = $_POST["Email"];   // Pega o valor do campo E-mail
    $Mensagem = $_POST["Mensagem"]; // Pega o valor do campo Mensagem

        require_once(__DIR__ . "/admin/dao/contatos.dao.php");
        //Instancio a DAO
        $contatosDAO = new ContatosDAO():
        //Instancio Contato para receber os dados para enviar para DAO
        $contato = new Contato();
        //Populo os Campos no Objeto $contato
        $contato->Nome = $Nome;
        $contato->Telefone = $Telefone;
        $contato->Email = $Email;
        $contato->Mensagem = $Mensagem;
        //Invoco o Método Inserir da DAO para que o registro seja enviado para o MySQL
        $contatosDAO->Inserir($contato);


    // Mensagem que será enviada no Corpo do Email

    $TextoEmail = "<h1>Contato através do Site</h1>"
            . "<p>Nome: <b>$Nome</b></p>"
            . "<p>E-mail: <b>$Email</b></p>"
            . "<p>Telefone: <b>$Telefone</b></p>"
            . "<p>Mensagem: <b>$Mensagem</b></p>";

    // Vamos criar este arquivo com a função preparada para envio de email
    // que será utilizada abaixo

    require_once("inc/enviarEmail.php");

    if (enviarEmail('lagermano.rp@gmail.com', // Email de quem vai receber
                   $Email, // Email formulário para ir no ReplyTo
                   $Nome, // Nome do formulário para ir no ReplyTo
                   'Contato através do Site', // Assunto do Email
                   $TextoEmail)) {
        
        Header("location: obrigado.php"); // Redireciona para uma página de obrigado.
    }

    if (!empty($error)) echo $error;

?>
