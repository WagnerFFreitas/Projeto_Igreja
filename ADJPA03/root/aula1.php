<?php
    //Define um cabeçalho HTTP para o arquivo PHP
    //para que o browser entenda que ele será um
    //arquivo de texto com html e com codificação
    //UTF-8 (conjunto de caracteres multilingual)
    header("Content-type: text/html; charset=utf-8");
  
    //echo = Comando em PHP para escrever informações
    //       para o usuário
    echo ("Olá, este é meu primeiro arquivo PHP<br/>");

    echo("Seja bem vindo!!!<br/>");

    echo($_GET["nome"]);

?>