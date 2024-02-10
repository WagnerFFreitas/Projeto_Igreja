<?php 
    include_once(__DIR__ . "/dao/categorias.dao.php");
    
    //Crio uma instancia da Model
    $categoria = new Categoria();

    $categoria->Titulo = $_POST["txtTitulo"];
    //Crio a instancia da DAO
    $categoriasDAO = new CategoriasDAO();

    //Verifico se o valor do ID veio do FORM = Alteração
    if (isset($_POST["id"]) && $_POST["id"] != "") {
        //Atribuo o ID recebido do Form no objeto $categoria
        $categoria->Id = $_POST["id"];
        //Invoco o Método de Alteração da DAO
        $sucesso = $categoriasDAO->Alterar($categoria);
    } else {//Senão Inclusão
        
    //Invoco o método de inserção da DAO
    $sucesso = $categoriasDAO->Inserir($categoria);

    }
        
    if ($sucesso) {
        
        header("location: categoria_lista.php");
        exit();
    }

    echo "Ocorreu um erro na Operação: " . $categoriasDAO->Mensagem;


?>