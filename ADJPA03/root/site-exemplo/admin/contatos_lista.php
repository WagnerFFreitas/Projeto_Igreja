<?php
    $tituloPagina = "Dashboard";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/contatos.dao.php");

?>

<!-- Contato - Inicio do código personalizado -->
    <h1 class="h2">Contatos</h1>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Mensagem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Instancia a DAO
        $contatosDAO = new ContatosDAO();
        //Chama o Método de Listagem e armazena o resultado em $contatos
        $contatos = $contatosDAO->ListarTudo();
        //Varre os elementos do Vetor, e exibe-os na listagem
        foreach($contatos as $cont) { //Fecha mais abaixo
        ?>
        <tr>
            <td><?=$cont->Nome?></td>
            <td><a href="mailto:<?=$cont->Email?>"><?=$cont->Email?></a></td>
            <td><?=$cont->Telefone?></td>
            <td><?=$cont->Mensagem?></td>
            
            <td><a href="contatos_form.php?id=<?=$cat->Id?>">Alterar</a></td>
        </tr>
        
        
        
        <?php
        } //Fim do foreach
        ?>
    </tbody>

</table>
<?php

    include_once("inc/rodape.php");

?>