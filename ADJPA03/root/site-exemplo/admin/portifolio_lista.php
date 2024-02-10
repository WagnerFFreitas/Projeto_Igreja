<?php
    $tituloPagina = "Dashboard";
    include_once("inc/topo.php");

     include_once(__DIR__ . "/dao/portifolios.dao.php");


?>

<!-- Portifolio - Inicio do código personalizado -->
    <h1 class="h2">Portfolio</h1>

<div>
<a href="portifolio_form.php" class="btn btn-primary">
    <span data-feather="plus-circle"></span>
    Incluir</a>
</div>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Link Externo</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        //Instancia a DAO
        $portifoliosDAO = new PortifoliosDAO();
        //Chama o Método de Listagem e armazena o resultado em $portifolio
        $portifolio = $portifoliosDAO->ListarTudo();
        //Varre os elementos do Vetor, e exibe-os na listagem
        foreach($portifolio as $port) { //Fecha mais abaixo
        ?>
        <tr>
            <td><?=$port->Titulo?></td>
            <td><?=$port->Descricao?></td>
            <td><?=$port->Imagem?></td>
            <td><?=$port->LinkExterno?></td>
            <td><?=$port->Titulo_categoria?></td>
            <td><a href="portifolio_form.php?id=<?=$port->Id?>">Alterar</a></td>
            
        </tr>
        <?php
        } //Fim do foreach
        ?>
        
    </tbody>

</table>

<!-- Portifolio - Final do código personalizado -->

<?php

    include_once("inc/rodape.php");
?>