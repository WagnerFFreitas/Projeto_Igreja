<?php
    $tituloPagina = "Dashboard";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/categorias.dao.php");

?>

<!-- Categoria - Inicio do código personalizado -->
    <h1 class="h2">Categorias</h1>

    <div>

        <a href="categoria_form.php" class="btn btn-primary">
        <span data-feather="plus-circle"></span>Salvar</a>
        
    </div>

<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Instancia a DAO
        $categoriasDAO = new CategoriasDAO();
        //Chama o Método de Listagem e armazena o resultado em $categorias
        $categorias = $categoriasDAO->ListarTudo();
        //Varre os elementos do Vetor, e exibe-os na listagem
        foreach($categorias as $cat) { //Fecha mais abaixo
        ?>
        <tr>
            <td><?=$cat->Titulo?></td>
            <td><a href="categoria_form.php?id=<?=$cat->Id?>">Alterar</a></td>
        </tr>
        <?php
        } //Fim do foreach
        ?>
    </tbody>

</table>
<?php

    include_once("inc/rodape.php");

?>