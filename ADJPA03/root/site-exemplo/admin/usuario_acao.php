<?php 
    include_once(__DIR__ . "/dao/usuarios.dao.php");
    
    //Crio uma instancia da Model
    $usuario = new Usuario();

    $usuario->Nome = $_POST["txtNome"];
    $usuario->Email = $_POST["txtEmail"];
    $usuario->Senha = $_POST["txtSenha"];
    //Crio a instancia da DAO
    $usuariosDAO = new UsuariosDAO();

    //Verifico se o valor do ID veio do FORM = Alteração
    if (isset($_POST["id"]) && $_POST["id"] != "") {
        //Atribuo o ID recebido do Form no objeto $usuario
        $usuario->Id = $_POST["id"];
        //Invoco o Método de Alteração da DAO
        $sucesso = $usuariosDAO->Alterar($usuario);
    } else {//Senão Inclusão
    //Invoco o método de inserção da DAO
    $sucesso = $usuariosDAO->Inserir($usuario);

    }
        
    if ($sucesso) {
        
        header("location: usuario_lista.php");
        exit();
    }

    echo "Ocorreu um erro na Operação: " . $usuariosDAO->Mensagem;


?>