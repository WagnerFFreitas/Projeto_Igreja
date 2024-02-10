<?php

    $Titulo = $_POST["Titulo"]; // Pega o valor do campo Titulo
    $Descricao = $_POST["Descricao"]; // Pega o valor do campo Descrição
    $Imagem = $_POST["Imagem"];   // Pega o valor do campo Imagem
    $Id_categoria = $_POST["Id_categoria"]; // Pega o valor do campo Id_categoria

        require_once(__DIR__ . "/admin/dao/portifolio.dao.php");
        //Instancio a DAO
        $portifolioDAO = new PortifoliosDAO():
        //Instancio Portifolio para receber os dados para enviar para DAO
        $portifolio = new Portifolio();
        //Populo os Campos no Objeto $portifolio
        $portifolio->Titulo = $Titulo;
        $portifolio->Descricao = $Descricao;
        $portifolio->Imagem = $Imagem;
        $portifolio->Id_categoria = $Id_categoria;
        //Invoco o Método Inserir da DAO para que o registro seja enviado para o MySQL
        $portifolioDAO->Inserir($portifolio);


    
    require_once("inc/enviarEmail.php");

    if (enviarEmail('lagermano.rp@gmail.com', // Email de quem vai receber
                   $Email, // Email do formulário para ir no ReplyTo
                   $Nome, // Nome do formulário para ir no ReplyTo
                   'Contato através do Site', // Assunto do Email
                   $TextoEmail)) {
        
        Header("location: obrigado.php"); // Redireciona para uma página de obrigado.
    }

    if (!empty($error)) echo $error;

?>