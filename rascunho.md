

Para criar o programa:

1) Criar o banco de dados MySQL, com as tabelas e as relações necessárias para armazenar os dados dos membros, das congregações, das finanças, dos grupos, dos eventos, etc.

2) Criar as páginas HTML, com os elementos e os estilos CSS adequados para exibir o conteúdo e o layout do programa.

3) Criar os scripts PHP, com as instruções e as funções para conectar o banco de dados, validar os dados, inserir, buscar, editar e excluir os registros, gerar os relatórios, enviar os e-mails, etc.

4) Criar os scripts JavaScript, com as interações e as validações para tornar o programa mais dinâmico e interativo.
Testar e depurar o programa, verificando se ele funciona corretamente, se não há erros, se atende aos requisitos, etc.
Você concorda com esses passos? Você tem alguma sugestão ou preferência sobre o programa? Se você quiser, eu posso te mostrar alguns exemplos de código que eu já fiz usando essas linguagens, para você ter uma ideia de como o programa vai ficar. Por exemplo, você pode ver esse código que faz um formulário de cadastro simples em HTML, CSS, JavaScript, PHP e MySQL:

**1º Rascunho HTML**

<html>
<head>
    <title>Formulário de Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #333;
            color: #fff;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Formulário de Cadastro</h1>
    <form id="form-cadastro" method="post" action="cadastro.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="">Selecione</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
        <label for="data_nasc">Data de Nascimento:</label>
        <input type="date" id="data_nasc" name="data_nasc" required>
        <button type="submit" id="btn-cadastrar">Cadastrar</button>
    </form>
    <script>
        // Seleciona o formulário pelo id
        var form = document.getElementById("form-cadastro");

        // Adiciona um evento de submit ao formulário
        form.addEventListener("submit", function(event) {
            // Previne o comportamento padrão do formulário (enviar os dados)
            event.preventDefault();

            // Cria um objeto FormData com os dados do formulário
            var formData = new FormData(form);

            // Cria um objeto XMLHttpRequest para fazer a requisição ao servidor
            var xhr = new XMLHttpRequest();

            // Define o método, a url e o tipo de resposta da requisição
            xhr.open("POST", "cadastro.php");
            xhr.responseType = "json";

            // Adiciona um evento de load à requisição
            xhr.addEventListener("load", function() {
                // Verifica se a requisição foi bem sucedida (status 200)
                if (xhr.status == 200) {
                    // Obtém a resposta em formato JSON
                    var response = xhr.response;

                    // Verifica se a resposta tem uma propriedade chamada error
                    if (response.hasOwnProperty("error")) {
                        // Exibe a mensagem de erro na tela
                        alert(response.error);
                    } else {
                        // Exibe a mensagem de sucesso na tela
                        alert(response.success);

                        // Limpa os campos do formulário
                        form.reset();
                    }
                } else {
                    // Exibe uma mensagem de erro genérica na tela
                    alert("Ocorreu um erro ao enviar os dados. Tente novamente.");
                }
            });

            // Envia a requisição com os dados do formulário
            xhr.send(formData);
        });
    </script>
</html>

**1º Rascunho PHP**

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

**2º Rascunho**
Cria um formulário de cadastro simples em HTML, CSS, JavaScript, PHP e MySQL. O formulário tem os campos nome, e-mail, senha, sexo e data de nascimento. 

<html>
<head>
    <title>Formulário de Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #333;
            color: #fff;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Formulário de Cadastro</h1>
    <form id="form-cadastro" method="post" action="cadastro.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="">Selecione</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
        <label for="data_nasc">Data de Nascimento:</label>
        <input type="date" id="data_nasc" name="data_nasc" required>
        <button type="submit" id="btn-cadastrar">Cadastrar</button>
    </form>
    <script>
        // Seleciona o formulário pelo id
        var form = document.getElementById("form-cadastro");

        // Adiciona um evento de submit ao formulário
        form.addEventListener("submit", function(event) {
            // Previne o comportamento padrão do formulário (enviar os dados)
            event.preventDefault();

            // Cria um objeto FormData com os dados do formulário
            var formData = new FormData(form);

            // Cria um objeto XMLHttpRequest para fazer a requisição ao servidor
            var xhr = new XMLHttpRequest();

            // Define o método, a url e o tipo de resposta da requisição
            xhr.open("POST", "cadastro.php");
            xhr.responseType = "json";

            // Adiciona um evento de load à requisição
            xhr.addEventListener("load", function() {
                // Verifica se a requisição foi bem sucedida (status 200)
                if (xhr.status == 200) {
                    // Obtém a resposta em formato JSON
                    var response = xhr.response;

                    // Verifica se a resposta tem uma propriedade chamada error
                    if (response.hasOwnProperty("error")) {
                        // Exibe a mensagem de erro na tela
                        alert(response.error);
                    } else {
                        // Exibe a mensagem de sucesso na tela
                        alert(response.success);

                        // Limpa os campos do formulário
                        form.reset();
                    }
                } else {
                    // Exibe uma mensagem de erro genérica na tela
                    alert("Ocorreu um erro ao enviar os dados. Tente novamente.");
                }
            });

            // Envia a requisição com os dados do formulário
            xhr.send(formData);
        });
    </script>
</html>

**2º Rascunho PHP**

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

**3º Rascunho**

Os arquivos HTML, CSS, JavaScript, PHP estam separados

HTML

<html>
<head>
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="estilo.css"> <!-- Referencia o arquivo CSS -->
</head>
<body>
    <h1>Formulário de Cadastro</h1>
    <form id="form-cadastro" method="post" action="cadastro.php">
        <!-- Conteúdo do formulário -->
    </form>
    <script src="script.js"></script> <!-- Referencia o arquivo JavaScript -->
    <?php include("cadastro.php"); ?> <!-- Referencia o arquivo PHP -->
</body>
</html>


<html>
<head>
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="estilo.css"> <!-- Referencia o arquivo CSS -->
</head>
<body>
    <h1>Formulário de Cadastro</h1>
    <form id="form-cadastro" method="post" action="cadastro.php">
        <!-- Conteúdo do formulário -->
    </form>
    <script src="script.js"></script> <!-- Referencia o arquivo JavaScript -->
    <?php include("cadastro.php"); ?> <!-- Referencia o arquivo PHP -->
</body>
</html>

**3º Rascunho**
Interfaces com menus e janelas que eu encontrei na internet, usando HTML, CSS e JavaScript:

index.html:

HTML

<html>
<head>
    <title>Interface com Menu</title>
    <link rel="stylesheet" href="estilo.css"> <!-- Referencia o arquivo CSS -->
</head>
<body>
    <div id="menu"> <!-- Cria uma div para o menu -->
        <button id="btn-cadastrar" onclick="abrirJanela('cadastrar')">Cadastrar Membros</button> <!-- Cria um botão para cadastrar membros -->
        <button id="btn-financeiro" onclick="abrirJanela('financeiro')">Financeiro</button> <!-- Cria um botão para o financeiro -->
        <button id="btn-relatorios" onclick="abrirJanela('relatorios')">Relatórios</button> <!-- Cria um botão para os relatórios -->
        <button id="btn-aniversarios" onclick="abrirJanela('aniversarios')">Aniversários</button> <!-- Cria um botão para os aniversários -->
        <button id="btn-sair" onclick="sair()">Sair</button> <!-- Cria um botão para sair -->
    </div>
    <div id="janela"> <!-- Cria uma div para a janela -->
        <!-- Aqui vai o conteúdo da janela -->
    </div>
    <script src="script.js"></script> <!-- Referencia o arquivo JavaScript -->
</body>
</html>
Código gerado por IA. Examine e use com cuidado. Mais informações em perguntas frequentes.
estilo.css:

**CSS**

/* Define o estilo do menu */
#menu {
    width: 100%;
    height: 50px;
    background-color: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

/* Define o estilo dos botões do menu */
#menu button {
    width: 150px;
    height: 30px;
    border: 1px solid #ccc;
    background-color: #fff;
    color: #333;
    font-weight: bold;
    cursor: pointer;
}

/* Define o estilo dos botões do menu ao passar o mouse */
#menu button:hover {
    background-color: #eee;
}

/* Define o estilo dos botões do menu ao clicar */
#menu button:active {
    background-color: #00f;
    color: #fff;
}

/* Define o estilo da janela */
#janela {
    width: 80%;
    height: 80%;
    margin: 0 auto;
    border: 1px solid #ccc;
    background-color: #fff;
    display: none;
}

/* Define o estilo do menu superior da janela */
#janela ul {
    width: 100%;
    height: 30px;
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

/* Define o estilo dos itens do menu superior da janela */
#janela ul li {
    width: 100px;
    height: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    color: #333;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
}

/* Define o estilo dos itens do menu superior da janela ao passar o mouse */
#janela ul li:hover {
    background-color: #eee;
}

/* Define o estilo dos itens do menu superior da janela ao clicar */
#janela ul li:active {
    background-color: #00f;
    color: #fff;
}

/* Define o estilo do conteúdo da janela */
#janela p {
    width: 90%;
    height: 90%;
    margin: 0 auto;
    padding: 10px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: #333;
}
Código gerado por IA. Examine e use com cuidado. Mais informações em perguntas frequentes.
script.js:

**JavaScript**

// Cria uma função para abrir a janela de acordo com o botão clicado
function abrirJanela(opcao) {
    // Seleciona a div da janela pelo id
    var janela = document.getElementById("janela");

    // Define o conteúdo da janela de acordo com a opção
    switch (opcao) {
        case "cadastrar":
            janela.innerHTML = `
                <ul>
                    <li onclick="abrirFormulario('novo')">Novo Membro</li>
                    <li onclick="abrirFormulario('editar')">Editar Membro</li>
                    <li onclick="abrirFormulario('excluir')">Excluir Membro</li>
                </ul>
                <p>Aqui você pode cadastrar, editar ou excluir os membros da igreja.</p>
            `;
            break;
        case "financeiro":
            janela.innerHTML = `
                <ul>
                    <li onclick="abrirRelatorio('dizimos')">Dízimos</li>
                    <li onclick="abrirRelatorio('ofertas')">Ofertas</li>
                    <li onclick="abrirRelatorio('despesas')">Despesas</li>
                </ul>
                <p>Aqui você pode ver os relatórios financeiros da igreja.</p>
            `;
            break;
        case "relatorios":
            janela.innerHTML = `
                <ul>
                    <li onclick="abrirRelatorio('membros')">Membros</li>
                    <li onclick="abrirRelatorio('grupos')">Grupos</li>
                    <li onclick="abrirRelatorio('eventos')">Eventos</li>
                </ul>
                <p>Aqui você pode ver os relatórios administrativos da igreja.</p>
            `;
            break;
        case "aniversarios":
            janela.innerHTML = `
                <ul>
                    <li onclick="abrirRelatorio('mes')">Mês</li>
                    <li onclick="abrirRelatorio('semana')">Semana</li>
                    <li onclick="abrirRelatorio('dia')">Dia</li>
                </ul>
                <p>Aqui você pode ver os aniversários dos membros da igreja.</p>
            `;
            break;
        default:
            janela.innerHTML = "";
    }

    // Exibe a janela na tela
    janela.style.display = "block";
}

// Cria uma função para sair da janela
function sair() {
    // Seleciona a div da janela pelo id
    var janela = document.getElementById("janela");

    // Limpa o conteúdo da janela
    janela.innerHTML = "";

    // Esconde a janela da tela
    janela.style.display = "none";
}

// Cria uma função para abrir o formulário de acordo com a opção
function abrirFormulario(opcao) {
    // Seleciona o parágrafo da janela pelo id
    var paragrafo = document.getElementById("janela").getElementsByTagName("p")[0];

    // Define o conteúdo do parágrafo de acordo com a opção
    switch (opcao) {
        case "novo":
            paragrafo.innerHTML = "Aqui você pode inserir os dados de um novo membro da igreja.";
            break;
        case "editar":
            paragrafo.innerHTML = "Aqui você pode alterar os dados de um membro da igreja.";
            break;
        case "excluir":
            paragrafo.innerHTML = "Aqui você pode excluir os dados de um membro da igreja.";
            break;
        default:
            paragrafo.innerHTML = "";
    }
}

// Cria uma função para abrir o relatório de acordo com a opção
function abrirRelatorio(opcao) {
    // Seleciona o parágrafo da janela pelo id
    var paragrafo = document.getElementById("janela").getElementsByTagName("p")[0];

    // Define o conteúdo do parágrafo de acordo com a opção
    switch (opcao) {
        case "dizimos":
            paragrafo.innerHTML = "Aqui você pode ver o relatório dos dízimos recebidos pela igreja.";
            break;
        case "ofertas":
            paragrafo.innerHTML = "Aqui você pode ver o relatório das ofertas recebidas pela igreja.";
            break;
        case "despesas":
            paragrafo.innerHTML = "Aqui você pode ver o relatório das despesas realizadas pela igreja.";
            break;
        case "membros":
            paragrafo.innerHTML = "Aqui você pode ver o relatório dos membros cadastrados na igreja.";
            break;
        case "grupos":
            paragrafo.innerHTML = "Aqui você pode ver o


**4º Rascunho**
Interface

<html>
<head>
    <title>Interface com Menu</title>
    <link rel="stylesheet" href="estilo.css"> <!-- Referencia o arquivo CSS -->
</head>
<body>
    <div id="menu"> <!-- Cria uma div para o menu -->
        <button id="btn-cadastrar" onclick="abrirJanela('cadastrar')">Cadastrar Membros</button> <!-- Cria um botão para cadastrar membros -->
        <button id="btn-financeiro" onclick="abrirJanela('financeiro')">Financeiro</button> <!-- Cria um botão para o financeiro -->
        <button id="btn-relatorios" onclick="abrirJanela('relatorios')">Relatórios</button> <!-- Cria um botão para os relatórios -->
        <button id="btn-aniversarios" onclick="abrirJanela('aniversarios')">Aniversários</button> <!-- Cria um botão para os aniversários -->
        <button id="btn-sair" onclick="sair()">Sair</button> <!-- Cria um botão para sair -->
    </div>
    <div id="janela"> <!-- Cria uma div para a janela -->
        <!-- Aqui vai o conteúdo da janela -->
    </div>
    <script src="script.js"></script> <!-- Referencia o arquivo JavaScript -->
</body>
</html>

**CSS**

/* Define o estilo do menu */
#menu {
    width: 100%;
    height: 50px;
    background-color: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

/* Define o estilo dos botões do menu */
#menu button {
    width: 150px;
    height: 30px;
    border: 1px solid #ccc;
    background-color: #fff;
    color: #333;
    font-weight: bold;
    cursor: pointer;
}

/* Define o estilo dos botões do menu ao passar o mouse */
#menu button:hover {
    background-color: #eee;
}

/* Define o estilo dos botões do menu ao clicar */
#menu button:active {
    background-color: #00f;
    color: #fff;
}

/* Define o estilo da janela */
#janela {
    width: 80%;
    height: 80%;
    margin: 0 auto;
    border: 1px solid #ccc;
    background-color: #fff;
    display: none;
}

/* Define o estilo do menu superior da janela */
#janela ul {
    width: 100%;
    height: 30px;
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

/* Define o estilo dos itens do menu superior da janela */
#janela ul li {
    width: 100px;
    height: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    color: #333;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
}

/* Define o estilo dos itens do menu superior da janela ao passar o mouse */
#janela ul li:hover {
    background-color: #eee;
}

/* Define o estilo dos itens do menu superior da janela ao clicar */
#janela ul li:active {
    background-color: #00f;
    color: #fff;
}

/* Define o estilo do conteúdo da janela */
#janela p {
    width: 90%;
    height: 90%;
    margin: 0 auto;
    padding: 10px;
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: #333;
}


// Cria uma função para abrir a janela de acordo com o botão clicado
function abrirJanela(opcao) {
    // Seleciona a div da janela pelo id
    var janela = document.getElementById("janela");

    // Define o conteúdo da janela de acordo com a opção
    switch (opcao) {
        case "cadastrar":
            janela.innerHTML = `
                <ul>
                    <li onclick="abrirFormulario('novo')">Novo Membro</li>
                    <li onclick="abrirFormulario('editar')">Editar Membro</li>
                    <li onclick="abrirFormulario('excluir')">Excluir Membro</li>
                </ul>
                <p>Aqui você pode cadastrar, editar ou excluir os membros da igreja.</p>
            `;
            break;
        case "financeiro":
            janela.innerHTML = `
                <ul>
                    <li onclick="abrirRelatorio('dizimos')">Dízimos</li>
                    <li onclick="abrirRelatorio('ofertas')">Ofertas</li>
                    <li onclick="abrirRelatorio('despesas')">Despesas</li>
                </ul>
                <p>Aqui você pode ver os relatórios financeiros da igreja.</p>
            `;
            break;
        case "relatorios":
            janela.innerHTML = `
                <ul>
                    <li onclick="abrirRelatorio('membros')">Membros</li>
                    <li onclick="abrirRelatorio('grupos')">Grupos</li>
                    <li onclick="abrirRelatorio('eventos')">Eventos</li>
                </ul>
                <p>Aqui você pode ver os relatórios administrativos da igreja.</p>
            `;
            break;
        case "aniversarios":
            janela.innerHTML = `
                <ul>
                    <li onclick="abrirRelatorio('mes')">Mês</li>
                    <li onclick="abrirRelatorio('semana')">Semana</li>
                    <li onclick="abrirRelatorio('dia')">Dia</li>
                </ul>
                <p>Aqui você pode ver os aniversários dos membros da igreja.</p>
            `;
            break;
        default:
            janela.innerHTML = "";
    }

    // Exibe a janela na tela
    janela.style.display = "block";
}

// Cria uma função para sair da janela
function sair() {
    // Seleciona a div da janela pelo id
    var janela = document.getElementById("janela");

    // Limpa o conteúdo da janela
    janela.innerHTML = "";

    // Esconde a janela da tela
    janela.style.display = "none";
}

// Cria uma função para abrir o formulário de acordo com a opção
function abrirFormulario(opcao) {
    // Seleciona o parágrafo da janela pelo id
    var paragrafo = document.getElementById("janela").getElementsByTagName("p")[0];

    // Define o conteúdo do parágrafo de acordo com a opção
    switch (opcao) {
        case "novo":
            paragrafo.innerHTML = "Aqui você pode inserir os dados de um novo membro da igreja.";
            break;
        case "editar":
            paragrafo.innerHTML = "Aqui você pode alterar os dados de um membro da igreja.";
            break;
        case "excluir":
            paragrafo.innerHTML = "Aqui você pode excluir os dados de um membro da igreja.";
            break;
        default:
            paragrafo.innerHTML = "";
    }
}

// Cria uma função para abrir o relatório de acordo com a opção
function abrirRelatorio(opcao) {
    // Seleciona o parágrafo da janela pelo id
    var paragrafo = document.getElementById("janela").getElementsByTagName("p")[0];

    // Define o conteúdo do parágrafo de acordo com a opção
    switch (opcao) {
        case "dizimos":
            paragrafo.innerHTML = "Aqui você pode ver o relatório dos dízimos recebidos pela igreja.";
            break;
        case "ofertas":
            paragrafo.innerHTML = "Aqui você pode ver o relatório das ofertas recebidas pela igreja.";
            break;
        case "despesas":
            paragrafo.innerHTML = "Aqui você pode ver o relatório das despesas realizadas pela igreja.";
            break;
        case "membros":
            paragrafo.innerHTML = "Aqui você pode ver o relatório dos membros cadastrados na igreja.";
            break;
        case "grupos":
            paragrafo.innerHTML = "Aqui você pode ver o