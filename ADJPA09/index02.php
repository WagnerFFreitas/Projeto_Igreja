<?php
// Conecta ao banco de dados MySQL usando PDO
$pdo = new PDO("mysql:host=localhost;dbname=cadastro", "root", "");

// Verifica se o método da requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $sexo = $_POST["sexo"];
    $data_nasc = $_POST["data_nasc"];

    // Valida os dados do formulário
    if (empty($nome) || empty($email) || empty($senha) || empty($sexo) || empty($data_nasc)) {
        // Retorna uma mensagem de erro em formato JSON
        echo json_encode(array("error" => "Todos os campos são obrigatórios."));
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Retorna uma mensagem de erro em formato JSON
        echo json_encode(array("error" => "E-mail inválido."));
        exit;
    }

    if (strlen($senha) < 6) {
        // Retorna uma mensagem de erro em formato JSON
        echo json_encode(array("error" => "Senha deve ter no mínimo 6 caracteres."));
        exit;
    }

    if ($sexo != "M" && $sexo != "F") {
        // Retorna uma mensagem de erro em formato JSON
        echo json_encode(array("error" => "Sexo inválido."));
        exit;
    }

    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $data_nasc)) {
        // Retorna uma mensagem de erro em formato JSON
        echo json_encode(array("error" => "Data de nascimento inválida."));
        exit;
    }

    // Prepara uma consulta SQL para inserir os dados na tabela usuarios
    $sql = "INSERT INTO usuarios (nome, email, senha, sexo, data_nasc) VALUES (:nome, :email, :senha, :sexo, :data_nasc)";

    // Prepara a consulta para execução
    $stmt = $pdo->prepare($sql);

    // Vincula os valores aos parâmetros da consulta
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":senha", password_hash($senha, PASSWORD_DEFAULT)); // Criptografa a senha
    $stmt->bindValue(":sexo", $sexo);
    $stmt->bindValue(":data_nasc", $data_nasc);

    // Executa a consulta
    $result = $stmt->execute();

    // Verifica se a consulta foi bem sucedida
    if ($result) {
        // Retorna uma mensagem de sucesso em formato JSON
        echo json_encode(array("success" => "Cadastro realizado com sucesso."));
    } else {
        // Retorna uma mensagem de erro em formato JSON
        echo json_encode(array("error" => "Ocorreu um erro ao realizar o cadastro. Tente novamente."));
    }
}
?>