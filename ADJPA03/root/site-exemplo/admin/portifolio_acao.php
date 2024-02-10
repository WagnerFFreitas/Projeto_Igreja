<?php
    include_once(__DIR__ . "/dao/portifolios.dao.php");

    //Crio uma instancia da Model
    $portifolio = new Portifolio();

    $portifolio->Titulo = $_POST["Titulo"];
    $portifolio->Imagem = $_POST["Imagem"];
    $portifolio->LinkExterno = $_POST["LinkExterno"];
    $portifolio->Descricao = $_POST["Descricao"];
    $portifolio->Id_categoria = $_POST["Id_Categoria"]; 
    $portifolio->Titulo_categoria = $_POST["TituloCategoria"];    

    //Crio a instancia da DAO
    $portifoliosDAO = new PortifoliosDAO();

    if (isset($_POST["id"]) && $_POST["id"] != "") {
        //Atribuo o ID recebido do Form no objeto $categoria
        $portifolio->Id = $_POST["id"];
        //Invoco o Método de Alteração da DAO
        $sucesso = $portifoliosDAO->Alterar($portifolio);
    } else {//Senão Inclusão
        
    //Invoco o método de inserção da DAO
    $sucesso = $portifoliosDAO->Inserir($portifolio);
        
    }

    if ($sucesso) {
        
        header("location: portifolio_lista.php");
        exit();
    }

    echo "Ocorreu um erro na Operação: " . $portifoliosDAO->Mensagem;
    

?>