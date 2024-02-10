<?php
    $tituloPagina = "Dashboard";
    include_once("inc/topo.php");

    include_once(__DIR__ . "/dao/categorias.dao.php");


    $id = "";
    $titulo = "";
    $subTitulo = "Inclusão";
    //Se receber o ID via GET, busca o registro para Alteração
    //Caso contrário, será Inclusão
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $id = $_GET["id"];
        $subTitulo = "Alteração";
        $categoriasDAO = new CategoriasDAO();
        $categoria = $categoriasDAO->BuscarPorId($id);
        $titulo = $categoria->Titulo;
        
    }
?>

<!-- Categoria do Portifolio - Inicio do código personalizado -->
<h1 class="h2">Categoria do Portfolio <small><?=$subTitulo?></small></h1>

<form action="categoria_acao.php" method="post">
    <input type="hidden" name="id" value="<?=$id?>"/>
    
    <h2>Título:</h2>
    <input type="text" id="Titulo" name="txtTitulo" size="135" value="<?=$titulo?>"/>
        
    <div>
        <button type="submit">Salvar</button>
    </div>
    
</form>


<!-- Portifolio - Final do código personalizado -->

<?php
    include_once("inc/rodape.php");
?>