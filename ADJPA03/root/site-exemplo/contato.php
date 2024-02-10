<?php
    $tituloPagina = "Home";

    // Diretivas de Inclusão: include, include_once, require, require_once
    include_once("inc/topo.php");
?>

    <h1>CONTATO</h1>

    <form action="contato_envio.php" method="post">
        <fieldset>
            <fieldset>
                <legend>Dados Cadastrais</legend>
                <h4>Nome:</h4>
                <input type="text" id="Nome" name="Nome" size="135" />
                <h4>E-mail:</h4>
                <input type="email" id="Email" name="email" size="135" />
                <h4>Telefone/Celular:</h4>
                <input type="tel" id="Telefone" name="telefone" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" placeholder="(99)99999-9999" />
                <h4>Mensagem:</h4>
                <textarea id="Mensagem" name="Mensagem" rows="10" cols="135"></textarea>
            </fieldset>
        </fieldset>
        
        <div>
        <button type="submit">Enviar</button>
        </div>
    </form>

<?php

// Diretivas de Inclusão: include, include_once, require, require_once
    include_once("inc/rodape.php");
?>